<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Quotation;
use DataTables;
use DB;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | QuotationController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all quotaion.
     */
    /**
     * This function is used to display all Quotation.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('quotations')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.quotationaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.quotation');

    }
    /**
     * This function is used to restore all quotaion.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $quotations = Quotation::onlyTrashed()->findOrFail(strip_tags($id));
        $quotations->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified quotaion from storage.
     *
     * @param  \App\Quotation  $quotaion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $quotations = Quotation::withTrashed()->findOrFail(strip_tags($id));
        $quotations->forceDelete();
        toastr()->success(__('Quotation has permanent deleted'));
        return back();

    }
}
