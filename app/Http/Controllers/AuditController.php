<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuditRequest;
use App\Http\Requests\UpdateAuditRequest;
use App\Models\Audit;
use App\Models\Stock;
use App\Repositories\AuditRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AuditController extends AppBaseController
{
    /** @var  AuditRepository */
    private $auditRepository;

    public function __construct(AuditRepository $auditRepo)
    {
        $this->auditRepository = $auditRepo;
    }

    /**
     * Display a listing of the Audit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->auditRepository->pushCriteria(new RequestCriteria($request));
        $audits = $this->auditRepository->all();

        return view('audits.index')
            ->with('audits', $audits);
    }

    /**
     * Show the form for creating a new Audit.
     *
     * @return Response
     */
    public function create()
    {
        return view('audits.create');
    }

    /**
     * Store a newly created Audit in storage.
     *
     * @param CreateAuditRequest $request
     *
     * @return Response
     */
    public function store(CreateAuditRequest $request)
    {
        $input = $request->all();

        $codes = $input['code'];

        $date = Carbon::createFromFormat('d-m-Y', $input['date']);


        foreach ($codes as $index => $code) {
            $real_stock = $input['real_stock'][$index];
            $last_stock = $this->getDataStock($date, $code);
            $audit = new Audit();
            $audit->code = $code;
            $audit->created_at = $date;
            $audit->real_stock = $real_stock;
            $audit->data_stock = 0;
            if ($last_stock) {
                $audit->data_stock = $last_stock->amount;
            }
            $audit->save();
        }

        Flash::success('Audit saved successfully.');

        return redirect(route('audits.index'));
    }

    /**
     * Display the specified Audit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $audit = $this->auditRepository->findWithoutFail($id);

        if (empty($audit)) {
            Flash::error('Audit not found');

            return redirect(route('audits.index'));
        }

        return view('audits.show')->with('audit', $audit);
    }

    /**
     * Show the form for editing the specified Audit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $audit = $this->auditRepository->findWithoutFail($id);

        if (empty($audit)) {
            Flash::error('Audit not found');

            return redirect(route('audits.index'));
        }

        return view('audits.edit')->with('audit', $audit);
    }

    /**
     * Update the specified Audit in storage.
     *
     * @param  int $id
     * @param UpdateAuditRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuditRequest $request)
    {
        $audit = $this->auditRepository->findWithoutFail($id);

        if (empty($audit)) {
            Flash::error('Audit not found');

            return redirect(route('audits.index'));
        }

        $audit = $this->auditRepository->update($request->all(), $id);

        Flash::success('Audit updated successfully.');

        return redirect(route('audits.index'));
    }

    /**
     * Remove the specified Audit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $audit = $this->auditRepository->findWithoutFail($id);

        if (empty($audit)) {
            Flash::error('Audit not found');

            return redirect(route('audits.index'));
        }

        $this->auditRepository->delete($id);

        Flash::success('Audit deleted successfully.');

        return redirect(route('audits.index'));
    }


    private function getDataStock($date, $code)
    {
        $last_stock = Stock::whereCode($code)
            ->whereDate('created_at', '<=', $date->format('Y-m-d'))
            ->orderBy('id', 'desc')
            ->first();

        return $last_stock;

    }
}
