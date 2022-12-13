<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Role;
use DataTables;
use DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RoleController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all role.
     */
    /**
     * This function is used to display all role.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('roles')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.roleaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.role');

    }
    /**
     * This function is used to restore all role.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $roles = Role::onlyTrashed()->findOrFail(strip_tags($id));
        $roles->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Role from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $roles = Role::withTrashed()->findOrFail(strip_tags($id));
        $roles->forceDelete();
        toastr()->success(__('Role has permanent deleted'));
        return back();

    }
}
