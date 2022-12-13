<?php

namespace App\Http\Controllers;

use App\Locker;
use App\Notifications\LockerNotification;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class LockerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LockerController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Locker.
     */
    public function __construct()
    {
        $this->middleware(['permission:locker.view']);
    }
    /**
     * This function is used to display all locker.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        if (!$request->id) {

            return redirect(route('users.index'));

        }
        $lockerlist = Locker::orderBy('created_at', 'desc')->where('userid', '=', base64_decode($request->id))->get();

        return view('admin.locker.index', compact('lockerlist'));
    }

    /**
     * Show the form for creating a new locker.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (!Auth::user()->can('locker.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        if (!$request->id) {

            return redirect(route('users.index'));

        }

        $lockerlist = Locker::orderBy('created_at', 'desc')->where('userid', '=', base64_decode($request->id))->get();

        $users = User::all();
        return view('admin.locker.create', compact('users', 'lockerlist'));
    }

    /**
     * Store a newly created locker in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('locker.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $input = array_filter($request->all());
        $input['userid'] = strip_tags($request->user_id);
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;

        $locker = Locker::create($input);

        $locker->save();

        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            }
        )->where('id', $request->user_id)->get();
        $name = [
            'name' => Auth::user()->name,
        ];
        Notification::send($users, new LockerNotification($name));
        toastr()->success(__('Locker has been saved successfully!'));
        return redirect(route('locker.index'));
    }

    /**
     * Show the form for editing the specified resolockerurce.
     *
     * @param  \App\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('locker.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $users = User::all();
        $locker = Locker::findOrFail(strip_tags($id));
        return view('admin.locker.edit', compact('locker', 'users'));
    }

    /**
     * Update the specified locker in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('locker.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }

        $locker = Locker::findOrFail(strip_tags($id));
        $request->validate([
            'user_id' => 'required',
            'lockerno' => 'required|unique:lockers,lockerno,' . $locker->id,
            'to' => 'required',
            'from' => 'required',
        ]);

        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $input['userid'] = strip_tags($request->user_id);
        $locker->update($input);
        toastr()->success(__('Locker has been updated!'));
        return redirect(route('locker.index'));
    }

    /**
     * Remove the specified locker from storage.
     *
     * @param  \App\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('locker.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $locker = Locker::findOrFail(strip_tags($id));
        $locker->delete();
        toastr()->success(__('Locker is deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified locker from storage.
     *
     * @param  \App\locker  $locker
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
            $locker = Locker::find($checked);
            $locker->delete();
        }
        toastr()->error(__('Selected Locker has been deleted.'));
        return back();
    }
/**
 * Update the status of specified locker in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\locker  $locker
 * @return \Illuminate\Http\Response
 */
    public function status_update(Request $request, $id)
    {

        $locker = Locker::findOrFail(strip_tags($id));

        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {

            $input['is_active'] = 0;
        }

        $locker->update($input);
        toastr()->info(__('Locker Status has been changed!'));
        return back()->with('updated', __('Locker Status has been changed!'));
    }
}
