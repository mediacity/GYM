<?php

namespace App\Http\Controllers;

use App\Diet;
use App\Dietpackage;
use App\Halfmonth;
use App\Notifications\DietNotification;
use App\Reminder;
use App\User;
use App\Weekreminder;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class DietpackageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DietpackageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Dietpackage.
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->id) {
            return redirect(route('users.index'));
        }
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->get();
        $package = Diet::get();
        $dietpackages = Dietpackage::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
        return view('admin.dietpackage.index', compact('dietpackages', 'users', 'package'));
    }

    /**
     * Show the form for creating a new Dietpackage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->id) {

            return redirect(route('users.index'));

        }
        $package = Diet::all();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->get();
        $dietpackages = Dietpackage::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        ;
        $input['userid'] = strip_tags($request->user_id);
        return view('admin.dietpackage.create ', compact('users', 'dietpackages', 'input', 'package'));
    }

    /**
     * Store a newly created Dietpackage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'diet_package' => 'required',
            'user_id' => 'required',

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $dietpackage['user_id'] = strip_tags($request->user_id);
        $dietpackage = Dietpackage::create($input);
        $dietpackage->save();
        $reminder = new Reminder;
        $reminder->user_id = strip_tags($request->user_id);
        $reminder->status = 'pending';
        $reminder->note = 'Add Diet';
        $old_date = Carbon::now()->format('d-m-Y');
        $reminder->reminder_date = date('d-m-Y', strtotime($old_date . ' +30 days'));
        $reminder->save();
        $weekreminder = new Weekreminder;
        $weekreminder->user_id = strip_tags($request->user_id);
        $weekreminder->status = 'pending';
        $weekreminder->note = 'Add Diet after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $weekreminder->reminder_date = date('d-m-Y', strtotime($old_date . ' +7 days'));
        $weekreminder->save();
        $halfmonth = new Halfmonth;
        $halfmonth->user_id = strip_tags($request->user_id);
        $halfmonth->status = 'pending';
        $halfmonth->note = 'Add Diet after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $halfmonth->reminder_date = date('d-m-Y', strtotime($old_date . ' +15 days'));
        $halfmonth->save();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            }
        )->where('id', $request->user_id)->get();

        $name = [
            'name' => Auth::user()->name,
        ];
        Notification::send($users, new DietNotification($name));
        toastr()->success(__('Diet has been saved successfully!'));
        return redirect(route('dietpackage.index'));
    }

    /**
     * Show the form for editing the specified Dietpackage.
     *
     * @param  \App\Dietpackage  $dietpackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->get();
        $package = Diet::all();
        $dietpackage = Dietpackage::findOrFail(strip_tags($id));
        return view('admin.dietpackage.edit', compact('dietpackage', 'users', 'package'));
    }

    /**
     * Update the specified Dietpackage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dietpackage  $dietpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dietpackage = Dietpackage::findOrFail(strip_tags($id));
        $request->validate([
            'diet_package' => 'required',
            'user_id' => 'required',

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $input['user_id'] = strip_tags($request->user_id);
        $input['diet_package'] = strip_tags($request->diet_package);
        $dietpackage->update($input);
        toastr()->success(__('Diet has been updated!'));
        return redirect(route('dietpackage.index'));
    }

    /**
     * Remove the specified Dietpackage from storage.
     *
     * @param  \App\Dietpackage  $dietpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dietpackage = Dietpackage::findOrFail(strip_tags($id));
        $dietpackage->delete();
        toastr()->success(__('Diet deleted successfully.'));
        return back();
    }
    public function status_update(Request $request, $id)
    {
        $dietpackage = Dietpackage::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $dietpackage->update($input);
        toastr()->info(__('Diet status has been changed!'));
        return back();
    }
    /**
     * Bulk remove the specified Dietpackage from storage.
     *
     * @param  \App\Dietpackage  $dietpackage
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
            $dietpackage = Dietpackage::find($checked);
            $dietpackage->delete();
        }
        toastr()->error(__('Selected Diet has been deleted.'));
        return back();
    }
}
