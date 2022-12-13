<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Level;
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
        $list = DB::table('levels')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.levelaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.level');
    }
    /**
     * This function is used to restore all Appolevelintment.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $levels = Level::onlyTrashed()->findOrFail(strip_tags($id));
        $levels->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Level from storage.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $levels = Level::withTrashed()->findOrFail(strip_tags($id));
        $levels->forceDelete();
        toastr()->success(__('Level has permanent deleted'));
        return back();

    }
}
