<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | UserController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all user.
     */
    /**
     * This function is used to display all user.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        $list = DB::table('users')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.useraction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.user');

    }
    /**
     * This function is used to restore all user.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $users = User::onlyTrashed()->findOrFail(strip_tags($id));
        $users->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified user from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $users = User::withTrashed()->findOrFail(strip_tags($id));
        $users->forceDelete();
        toastr()->success(__('User has permanent deleted'));
        return back();

    }

}
