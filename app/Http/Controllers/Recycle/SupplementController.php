<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Supplement;
use DataTables;
use DB;
use Illuminate\Http\Request;

class SupplementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SupplementController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all supplement.
     */
    /**
     * This function is used to display all supplement.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('supplements')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.supplementaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.supplement');

    }
    /**
     * This function is used to restore all supplement.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $supplements = Supplement::onlyTrashed()->findOrFail(strip_tags($id));
        $supplements->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified supplement from storage.
     *
     * @param  \App\supplement  $supplement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $supplements = Supplement::withTrashed()->findOrFail(strip_tags($id));
        $supplements->forceDelete();
        toastr()->success(__('Supplement has permanent deleted'));
        return back();

    }
}
