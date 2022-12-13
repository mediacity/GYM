<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Blogcategory;
use DataTables;
use DB;
use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BlogcategoryController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all Blogcategory.
     */
    /**
     * This function is used to display all Blogcategory.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('blog_categories')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.blogcataction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.blogcategory');

    }
    /**
     * This function is used to restore all Blogcategory.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $blogcategory = Blogcategory::onlyTrashed()->findOrFail(strip_tags($id));
        $blogcategory->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Blogcategory from storage.
     *
     * @param  \App\Blogcategory $Blogcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blogcategory = Blogcategory::withTrashed()->findOrFail(strip_tags($id));
        $blogcategory->forceDelete();
        toastr()->success(__('Blogcategory has permanent deleted'));
        return back();

    }
}
