<?php

namespace App\Http\Controllers\Recycle;

use App\Goal;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GoalController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all goal.
     */
    /**
     * This function is used to display all goal.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('goals')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.goalaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.goal');

    }
    /**
     * This function is used to restore all goal.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $goals = Goal::onlyTrashed()->findOrFail(strip_tags($id));
        $goals->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified goal from storage.
     *
     * @param  \App\goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $goals = Goal::withTrashed()->findOrFail(strip_tags($id));

        $goals->forceDelete();
        toastr()->success(__('Goal has permanent deleted'));
        return back();

    }
}
