<?php

namespace App\Http\Controllers\Recycle;

use App\Exercisename;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ExercisenameController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExercisenameController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all exercisenames.
     */
    /**
     * This function is used to display all exercisenames.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('exercisenames')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.exenameaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.exercisename');

    }
    /**
     * This function is used to restore all exercisenames.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $exercisenames = Exercisename::onlyTrashed()->findOrFail(strip_tags($id));
        $exercisenames->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Exercisename from storage.
     *
     * @param  \App\Exercisename  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exercisenames = Exercisename::withTrashed()->findOrFail(strip_tags($id));
        $exercisenames->forceDelete();
        toastr()->success(__('Exercisename has permanent deleted'));
        return back();

    }
}
