<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use DataTables;
use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all page.
     */
    /**
     * This function is used to display all page.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('pages')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.pageaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.page');

    }
    /**
     * This function is used to restore all page.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $pages = Pages::onlyTrashed()->findOrFail(strip_tags($id));
        $pages->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Page remove the specified page from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Pages::withTrashed()->findOrFail(strip_tags($id));
        $pages->forceDelete();
        toastr()->success(__('Page has permanent deleted'));
        return back();

    }
}
