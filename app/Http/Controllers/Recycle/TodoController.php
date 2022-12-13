<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Todo;
use DataTables;
use DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TodoController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all todo.
     */
    /**
     * This function is used to display all todo.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('todos')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.todoaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.todo');

    }
    /**
     * This function is used to restore all todo.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $todos = Todo::onlyTrashed()->findOrFail(strip_tags($id));
        $todos->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified todo from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $todos = Todo::withTrashed()->findOrFail(strip_tags($id));
        $todos->forceDelete();
        toastr()->success(__('Todo has permanent deleted'));
        return back();

    }
}
