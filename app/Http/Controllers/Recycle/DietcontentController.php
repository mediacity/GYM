<?php

namespace App\Http\Controllers\Recycle;

use App\Dietcontent;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class DietcontentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DietcontentController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all dietcontent.
     */
    /**
     * This function is used to display all dietcontent.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        $list = DB::table('dietcontents')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.dietcontaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.dietcontent');

    }
    /**
     * This function is used to restore all dietcontent.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $dietcontents = Dietcontent::onlyTrashed()->findOrFail(strip_tags($id));
        $dietcontents->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified dietcontent from storage.
     *
     * @param  \App\Dietcontent  $dietcontent
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $dietcontents = Dietcontent::withTrashed()->findOrFail(strip_tags($id));
        $dietcontents->forceDelete();
        toastr()->success(__('Dietcontent has permanent deleted'));
        return back();

    }
}
