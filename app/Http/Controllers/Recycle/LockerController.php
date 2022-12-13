<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Locker;
use DataTables;
use DB;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LockerController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all locker.
     */
    /**
     * This function is used to display all locker.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('lockers')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()

                ->addColumn('action', 'recycle.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.locker');

    }
    /**
     * This function is used to restore all locker.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $lockers = Locker::onlyTrashed()->findOrFail(strip_tags($id));
        $lockers->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified locker from storage.
     *
     * @param  \App\locker  $locker
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $lockers = Locker::withTrashed()->findOrFail(strip_tags($id));

        $lockers->forceDelete();
        toastr()->success(__('Locker has permanent deleted'));
        return back();

    }
}
