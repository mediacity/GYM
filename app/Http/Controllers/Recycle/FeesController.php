<?php

namespace App\Http\Controllers\Recycle;

use App\Fees;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FeesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all fees.
     */
    /**
     * This function is used to display all fees.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('fees')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.feesaction')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('recycle.fees');

    }
    /**
     * This function is used to restore all fees.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $fees = Fees::onlyTrashed()->findOrFail(strip_tags($id));
        $fees->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified fees from storage.
     *
     * @param  \App\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fees = Fees::withTrashed()->findOrFail(strip_tags($id));

        $fees->forceDelete();
        toastr()->success(__('Fees has permanent deleted'));
        return back();

    }
}
