<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Memberattendance;
use DataTables;
use DB;
use Illuminate\Http\Request;

class MemberattendanceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MemberattendanceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all memberattendance.
     */
    /**
     * This function is used to display all memberattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('memberattendances')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.memberaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.member');

    }
    /**
     * This function is used to restore all memberattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $memberattendances = Memberattendance::onlyTrashed()->findOrFail(strip_tags($id));
        $memberattendances->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified memberattendance from storage.
     *
     * @param  \App\memberattendance  $memberattendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $memberattendances = Memberattendance::withTrashed()->findOrFail(strip_tags($id));

        $memberattendances->forceDelete();
        toastr()->success(__('Memberattendance has permanent deleted'));
        return back();

    }
}
