<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Religion;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ReligionController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all religion.
     */
    /**
     * This function is used to display all religion.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('religions')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.religionaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.religion');

    }
    /**
     * This function is used to restore all religion.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $religions = Religion::onlyTrashed()->findOrFail(strip_tags($id));
        $religions->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified religion from storage.
     *
     * @param  \App\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $religions = Religion::withTrashed()->findOrFail(strip_tags($id));
        $religions->forceDelete();
        toastr()->success(__('Religion has permanent deleted'));
        return back();

    }
}
