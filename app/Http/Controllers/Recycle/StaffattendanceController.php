<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Staffattendance;
use DataTables;
use DB;
use Illuminate\Http\Request;

class StaffattendanceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | StaffattendanceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all staffattendance.
     */
    /**
     * This function is used to display all staffattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('staffattendances')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.staffaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.staff');

    }/**
     * This function is used to restore all staffattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $staffattendances = Staffattendance::onlyTrashed()->findOrFail(strip_tags($id));
        $staffattendances->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified staffattendance from storage.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staffattendances = Staffattendance::withTrashed()->findOrFail(strip_tags($id));
        $staffattendances->forceDelete();
        toastr()->success(__('Quotation has permanent deleted'));
        return back();

    }
}
