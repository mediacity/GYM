<?php

namespace App\Http\Controllers\Recycle;

use App\Enquiry;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | EnquiryController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all enquiry.
     */
    /**
     * This function is used to display all Enquiry.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('enquiries')->WhereNotNull('deleted_at')->get();
         if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.enqaction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.enquiry');

    }
    /**
     * This function is used to restore all Enquiry.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {

        $enquiry = Enquiry::onlyTrashed()->findOrFail(strip_tags($id));
        $enquiry->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Enquiry from storage.
     *
     * @param  \App\Enquiry  $Enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $enquiry = Enquiry::withTrashed()->findOrFail(strip_tags($id));
        $enquiry->forceDelete();
        toastr()->success(__('Enquiry has permanent deleted'));
        return back();

    }
}
