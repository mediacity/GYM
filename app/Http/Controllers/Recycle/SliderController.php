<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use DataTables;
use DB;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SliderController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all slider.
     */
    /**
     * This function is used to display all slider.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('sliders')->WhereNotNull('deleted_at')->get();

        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/' . $list->id . '">' . $list->id . '</a></h6>';
                })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.slideraction')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('recycle.slider');

    }
    /**
     * This function is used to restore all slider.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $sliders = Slider::onlyTrashed()->findOrFail(strip_tags($id));
        $sliders->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified slider from storage.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::withTrashed()->findOrFail(strip_tags($id));
        $sliders->forceDelete();
        toastr()->success(__('Slider has permanent deleted'));
        return back();

    }
}
