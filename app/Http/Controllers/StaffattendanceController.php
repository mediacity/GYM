<?php

namespace App\Http\Controllers;

use App\Staffattendance;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffattendanceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | StaffattendanceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Staffattendance.
     */

    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all staffattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $staffattendance = Staffattendance::orderBy('created_at', 'desc')->get();
        return view('admin.staffattendance.index', compact('staffattendance'));
    }

    /**
     * Show the form for creating a new staffattendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('staff_attendance.add')) {

            return abort(403,__( 'User does not have the right permissions.'));
        }
        $users = User::all();
        $staffattendance = Staffattendance::all();
        return view('admin.staffattendance.create', compact('staffattendance', 'users'));
    }

    /**
     * Store a newly created staffattendance in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'location' => 'required',
             'date' => 'required',
            'comment' => 'required',

        ]);

        if (!Auth::user()->can('staff_attendance.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        if ($request->attend == "on") {
            $request->attend = "present";
        } else {
            $request->attend = "absent";

        }
        $staffattendance = new Staffattendance;
        $staffattendance->user_id = strip_tags($request->user_id);
        $staffattendance->location = strip_tags($request->location);
        $staffattendance->attend = strip_tags($request->attend);
        $staffattendance->date = strip_tags($request->date);
        $staffattendance->comment = strip_tags($request->comment);
        $staffattendance->save();
        return redirect(route('staffattendance.index'))->with('successMsg', 'Staff Attendance Added');
    }

    /**
     * Show the form for editing the specified staffattendance.
     *
     * @param  \App\staffattendance  $staffattendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('staff_attendance.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $users = User::all();
        $staffattendance = Staffattendance::find($id);
        return view('admin.staffattendance.edit', compact('staffattendance', 'users'));
    }

    /**
     * Update the specified staffattendance in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\staffattendance  $staffattendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('staff_attendance.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }

        $this->validate($request, [
            'user_id' => 'required',
            'location' => 'required',
            'date' => 'required',
            'comment' => 'required',

        ]);
        $staffattendance = Staffattendance::findOrFail($id);
        $input = array_filter($request->all());
         if ($request->attend == "on") {
            $input['attend'] = "present";
        } else {
            $input['attend'] = "absent";

        }
        $staffattendance->update($input);
        toastr()->success(__('Your Staff Attendance has been updatd.'));
        return redirect(route('staffattendance.index'));
    }

    /**
     * Remove the specified staffattendance from storage.
     *
     * @param  \App\staffattendance  $staffattendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('staff_attendance.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $staffattendance = staffattendance::findOrFail(strip_tags($id));
        $staffattendance->delete();
        toastr()->error(__('Staff Attendance data has been deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified staffattendance from storage.
     *
     * @param  \App\staffattendance  $staffattendance
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__("Please select field to deleted."));
            return back();
        }
        foreach ($request->checked as $checked) {
            $staffattendance = Staffattendance::find($checked);
            $staffattendance->delete();
        }
        toastr()->error(__('Selected Staffattendance has been deleted.'));
        return back();
    }
}
