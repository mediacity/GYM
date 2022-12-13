<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Occupation;
use DataTables;
use DB;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | OccupationController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all occupation.
     */
    /**
     * This function is used to display all occupation.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('occupations')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.occupationaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.occupation');

    }
    /**
     * This function is used to restore all occupation.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $occupations = Occupation::onlyTrashed()->findOrFail(strip_tags($id));
        $occupations->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified occupation from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $occupations = Occupation::withTrashed()->findOrFail(strip_tags($id));
        $occupations->forceDelete();
        toastr()->success(__('Occupation has permanent deleted'));
        return back();

    }
}
