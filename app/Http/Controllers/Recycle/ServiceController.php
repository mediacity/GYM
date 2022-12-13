<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Service;
use DataTables;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ServiceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all service.
     */
    /**
     * This function is used to display all service.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('services')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.serviceaction')
                ->rawColumns(['action'])
                ->make(true);
        }
         return view('recycle.service');

    }
    /**
     * This function is used to restore all service.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $services = Service::onlyTrashed()->findOrFail(strip_tags($id));
        $services->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified service from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $services = Service::withTrashed()->findOrFail(strip_tags($id));
        $services->forceDelete();
        toastr()->success(__('Service has permanent deleted'));
        return back();

    }
}
