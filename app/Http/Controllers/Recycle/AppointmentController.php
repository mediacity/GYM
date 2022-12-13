<?php

namespace App\Http\Controllers\Recycle;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use DB;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AppointmentController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all appointment.
     */
    /**
     * This function is used to display all Appointment.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $list = DB::table('appointments')->WhereNotNull('deleted_at')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addColumn('id', function ($row) {
                    return '<h6><a href="/list/' . $row->id . '">' . $row->id . '</a></h6>';
                })->addColumn('userid', function ($row) {
                $user = User::where('id', $row->userid)->first();
                return $user->name;
            })
                ->rawColumns(['id'])
                ->addIndexColumn()
                ->addColumn('action', 'recycle.appaction')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('recycle.appointment');

    }
    /**
     * This function is used to restore all Appointment.
     *
     * @param $request
     * @return Renderable
     */
    public function restore($id)
    {
        $appointments = Appointment::onlyTrashed()->findOrFail(strip_tags($id));
        $appointments->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified Appointment from storage.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $appointments = Appointment::withTrashed()->findOrFail(strip_tags($id));
        $appointments->forceDelete();
        toastr()->success(__('Appointment has permanent deleted'));
        return back();

    }
}
