<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Measurement;
use DataTables;
use DB;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MeasurementController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all measurement.
     */
    /**
     * This function is used to display all measurement.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('measurements')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.measurementaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.measurement');

    }
    /**
     * This function is used to restore all measurement.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $measurements = Measurement::onlyTrashed()->findOrFail(strip_tags($id));
        $measurements->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified measurement from storage.
     *
     * @param  \App\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $measurements = Measurement::withTrashed()->findOrFail(strip_tags($id));

        $measurements->forceDelete();
        toastr()->success(__('Measurement has permanent deleted'));
        return back();

    }
}
