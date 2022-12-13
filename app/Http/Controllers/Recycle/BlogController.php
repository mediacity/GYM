<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use DataTables;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BlogController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all blog.
     */
    /**
     * This function is used to display all Blog.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('blogs')->WhereNotNull('deleted_at')->get();
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
        return view('recycle.blog');

    }
    /**
     * This function is used to restore all Blog.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $blogs = Blog::onlyTrashed()->findOrFail(strip_tags($id));
        $blogs->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified blog from storage.
     *
     * @param  \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::withTrashed()->findOrFail(strip_tags($id));
        $blogs->forceDelete();
        toastr()->success(__('Blog has permanent deleted'));
        return back();

    }
}
