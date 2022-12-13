<?php

namespace App\Http\Controllers\Recycle;

use App\Faq;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FaqController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all faq.
     */
    /**
     * This function is used to display all faq.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('faq')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.faqaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.faq');

    }
    /**
     * This function is used to restore all faq.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $faqs = Faq::onlyTrashed()->findOrFail(strip_tags($id));
        $faqs->restore();
        toastr()->success(__('Restored Successfully'));
        return back();
    }
    /**
     * Permanent remove the specified Faq from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faq::withTrashed()->findOrFail(strip_tags($id));
        $faqs->forceDelete();
        toastr()->success(__('Faq has permanent deleted'));
        return back();

    }
}
