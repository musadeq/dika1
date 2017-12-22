<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Purchase;
use App\Models\Upload;
use App\Repositories\PurchaseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PurchaseController extends AppBaseController
{
    /** @var  PurchaseRepository */
    private $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepo)
    {
        $this->purchaseRepository = $purchaseRepo;
    }

    /**
     * Display a listing of the Purchase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->purchaseRepository->pushCriteria(new RequestCriteria($request));
        $purchases = $this->purchaseRepository->all();

        return view('purchases.index')
            ->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new Purchase.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchases.create');
    }

    /**
     * Store a newly created Purchase in storage.
     *
     * @param CreatePurchaseRequest $request
     *
     * @return Response
     */


    public function store(Request $request)
    {

//        $this->saveExcel("$path/$name");

    }

    public function getIdsByCode() {
        return Purchase::distinct()->pluck('code') ;
    }


    public function saveExcel($file)
    {

        Flash::success('Purchase saved successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Display the specified Purchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        return view('purchases.show')->with('purchase', $purchase);
    }

    /**
     * Show the form for editing the specified Purchase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        return view('purchases.edit')->with('purchase', $purchase);
    }

    /**
     * Update the specified Purchase in storage.
     *
     * @param  int $id
     * @param UpdatePurchaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseRequest $request)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        $purchase = $this->purchaseRepository->update($request->all(), $id);

        Flash::success('Purchase updated successfully.');

        return redirect(route('purchases.index'));
    }

    /**
     * Remove the specified Purchase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchase = $this->purchaseRepository->findWithoutFail($id);

        if (empty($purchase)) {
            Flash::error('Purchase not found');

            return redirect(route('purchases.index'));
        }

        $this->purchaseRepository->delete($id);

        Flash::success('Purchase deleted successfully.');

        return redirect(route('purchases.index'));
    }
}
