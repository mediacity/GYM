<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class DiethasController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DiethasController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all Diethas.
     */
    /**
     * This function is used to display all Diethas.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('diets')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.bloaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        // return redirect(route('recycle.action'));
        return view('recycle.diet');

    }
    /**
     * This function is used to restore all diethas.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $diets = Diet::onlyTrashed()->findOrFail(strip_tags($id));
        $diets->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified diet from storage.
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $diets = Diet::withTrashed()->findOrFail(strip_tags($id));
        $diets->forceDelete();
        toastr()->success(__('Diet has permanent deleted'));
        return back();

    }
}
