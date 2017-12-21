<?php

namespace App\Http\Controllers;

use App\Criteria\StockCriteria;
use App\Http\Requests\CreateUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Upload;
use App\Repositories\UploadRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UploadController extends AppBaseController
{
    /** @var  UploadRepository */
    private $uploadRepository;

    public function __construct(UploadRepository $uploadRepo)
    {
        $this->uploadRepository = $uploadRepo;
    }

    /**
     * Display a listing of the Upload.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->uploadRepository->pushCriteria(new RequestCriteria($request));
        $uploads = $this->uploadRepository
            ->orderBy('id', 'desc')
            ->get();

        return view('uploads.index')
            ->with('uploads', $uploads);
    }

    /**
     * Show the form for creating a new Upload.
     *
     * @return Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created Upload in storage.
     *
     * @param CreateUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadRequest $request)
    {
        if (!$request->hasFile('file')) {
            Flash::error('File not found.');
            return redirect(route('uploads.create'));
        }

        $request['user_id'] = Auth::id();
        $request['filename'] = $this->uploadFile($request->file('file'), $request->category);

        $input = $request->all();

        $upload = $this->uploadRepository->create($input);

        Flash::success('Upload saved successfully.');

        return redirect(route('uploads.show', $upload->id));
    }

    /**
     * Display the specified Upload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $upload = Upload::whereId($id)->whereImported(0)->first();
        if (!$upload) {
            return response()->view('errors.404', [], 404);
        }

        $file = "data/$upload->category/$upload->filename";
        $excel = Excel::load($file)->ignoreEmpty()->get();
        return view('uploads.show', compact('excel', 'upload'));
    }

    /**
     * Show the form for editing the specified Upload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return response()
            ->view('errors.404', [], 404);
    }

    /**
     * Update the specified Upload in storage.
     *
     * @param  int $id
     * @param UpdateUploadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadRequest $request)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        $upload = $this->uploadRepository->update($request->all(), $id);

        Flash::success('Upload updated successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Remove the specified Upload from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        if ($upload->category == 'pembelian') {
            $upload->purchases()->delete();
        } else {
            $upload->sales()->delete();
        }
        $this->uploadRepository->delete($id);


        Flash::success('Upload deleted successfully.');

        return redirect(route('uploads.index'));
    }

    public function import(Request $request)
    {
        $upload = Upload::whereId($request->id)->whereImported(0)->first();
        if (!$upload) {
            return response()->view('errors.404', [], 404);
        }

        $file = "data/$upload->category/$upload->filename";

        $date = $this->getDateFromFile($upload->filename);
        $excel = Excel::load($file)->ignoreEmpty()->get();


        foreach ($excel as $row) {
            if ($upload->category == 'pembelian') {
                $create = new Purchase();
                $create->code = $row->kode_obat;
                $create->ref = $row->ref_number;
                $create->amount = $row->jumlah_obat;
                $create->total = $row->total_biaya;
                $create->upload_id = $upload->id;
                $create->created_at = $date;
                $this->addStock($date, $create->code, $create->amount);
            } else {
                $create = new Sale();
                $create->code = $row->kode_obat;
                $create->transaction_number = $row->no_transaksi;
                $create->nik = $row->nik;
                $create->amount = $row->jumlah_obat;
                $create->total = $row->total_harga;
                $create->upload_id = $upload->id;
                $this->subStock($date, $create->code, $create->amount);
            }

            $create->save();
        }

        $upload->imported = 1;
        $upload->save();
        Flash::success('File imported successfully');
        return redirect(route('uploads.index'));
    }

    private function getDateFromFile($filename)
    {
        preg_match('/(.+?)(\.[^.]*$|$)/', $filename, $out);
        return Carbon::createFromFormat('dmY', explode('_', $out[1])[1]);
    }

    private function uploadFile($file, $category)
    {
        $path = "data/$category/";
        $name = $file->getClientOriginalName();
        $file->move($path, $name);
        return $name;
    }


    private function addStock($date, $code, $amount)
    {
        $stock = Stock::firstOrNew(['code'=>$code]);
        $stock->amount += $amount;
        $stock->save();
    }

    private function subStock($date, $code, $amount)
    {
        $stock = Stock::firstOrNew(['code'=>$code]);
        $stock->amount -= $amount;
        $stock->save();
    }

}
