<?php

namespace App\Http\Controllers\Recycle;

use App\Exercise;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExerciseController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all Exercise.
     */
    /**
     * This function is used to display all Exercise.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('exercises')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.exaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.exercise');

    }
    /**
     * This function is used to restore all Exercise.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $exercise = Exercise::onlyTrashed()->findOrFail(strip_tags($id));
        $exercise->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Appointment from storage.
     *
     * @param  \App\Exercise  $Exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exercise = Exercise::withTrashed()->findOrFail(strip_tags($id));
        $exercise->forceDelete();
        toastr()->success(__('Exercise has permanent deleted'));
        return back();

    }
}
