<?php

namespace App\Http\Controllers;

use App\Memberattendance;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberattendanceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MemberattendanceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Memberattendance.
     */
    public function __construct()
    {
        $this->middleware(['permission:member_attendance.view']);
    }
    /**
     * This function is used to display all Memberattendance.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $memberattendance = Memberattendance::orderBy('created_at', 'desc')->get();
        return view('admin.memberattendance.index', compact('memberattendance'));
    }

    /**
     * Show the form for creating a new Memberattendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('member_attendance.add')) {

            return abort(403,__( 'User does not have the right permissions.'));
        }
        $users = User::all();
        $memberattendance = Memberattendance::all();
        return view('admin.memberattendance.create', compact('memberattendance', 'users'));
    }

    /**
     * Store a newly created Memberattendance in storage.
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

        if (!Auth::user()->can('member_attendance.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        $memberattendance = new Memberattendance;
        $memberattendance->user_id = strip_tags($request->user_id);
        $memberattendance->location = strip_tags($request->location);
        $memberattendance['attend'] = isset($request->attend) ? 'present' : 'absent';
        $memberattendance->date = strip_tags($request->date);
        $memberattendance->comment = strip_tags($request->comment);
        $memberattendance->save();
        toastr()->success(__('Your Member Attendance has been added.'));
        return redirect(route('memberattendance.index'));
    }

    /**
     * Show the form for editing the specified Memberattendance.
     *
     * @param  \App\memberattendance  $memberattendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('member_attendance.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $users = User::all();
        $memberattendance = Memberattendance::find(strip_tags($id));
        return view('admin.memberattendance.edit', compact('memberattendance', 'users'));
    }

    /**
     * Update the specified Memberattendance in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\memberattendance  $memberattendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('member_attendance.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $this->validate($request, [
            'user_id' => 'required',
            'location' => 'required',
            'date' => 'required',
            'comment' => 'required',
        ]);

        $memberattendance = memberattendance::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        $input['attend'] = isset($request->attend) ? 'present' : 'absent';
        $memberattendance->update($input);
        toastr()->success(__('Your Member Attendance has been updatd.'));
        return redirect(route('memberattendance.index'));
    }

    /**
     * Remove the specified Memberattendance from storage.
     *
     * @param  \App\memberattendance  $memberattendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('member_attendance.delete')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $memberattendance = memberattendance::findOrFail(strip_tags($id));
        $memberattendance->delete();
        toastr()->error(__('Member Attendance data has been deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified Memberattendance from storage.
     *
     * @param  \App\memberattendance  $memberattendance
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $memberattendance = Memberattendance::find($checked);
            $memberattendance->delete();
        }
        toastr()->error(__('Selected Memberattendance has been deleted.'));
        return back();
    }
}
