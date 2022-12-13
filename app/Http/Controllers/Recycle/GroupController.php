<?php

namespace App\Http\Controllers\Recycle;

use App\Group;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GroupController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all group.
     */
    /**
     * This function is used to display all group.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('groups')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.groupaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.group');

    }
    /**
     * This function is used to restore all group.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $groups = Group::onlyTrashed()->findOrFail(strip_tags($id));
        $groups->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified group from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $groups = Group::withTrashed()->findOrFail(strip_tags($id));
        $groups->forceDelete();
        toastr()->success(__('Group has permanent deleted'));
        return back();

    }
}
