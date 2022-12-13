<?php

namespace App\Http\Controllers\Recycle;

use App\Cost;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CostController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all cost.
     */
    /**
     * This function is used to display all cost.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        $list = DB::table('costs')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.cosaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.cost');

    }
    /**
     * This function is used to restore all cost.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $costs = Cost::onlyTrashed()->findOrFail(strip_tags($id));
        $costs->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified cost from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $costs = Cost::withTrashed()->findOrFail(strip_tags($id));
        $costs->forceDelete();
        toastr()->success(__('Cost has permanent deleted'));
        return back();

    }
}
