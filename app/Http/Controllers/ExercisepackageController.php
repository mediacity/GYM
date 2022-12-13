<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Exercisepackage;
use App\Halfmonth;
use App\Notifications\ExerciseNotification;
use App\Reminder;
use App\User;
use App\Weekreminder;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ExercisepackageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExercisepackageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Exercisepackage.
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
        $package = Exercise::all();
        $exercisepackages = Exercisepackage::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
       
        return view('admin.exercisepackage.index', compact('exercisepackages', 'users', 'package'));
    }

    /**
     * Show the form for creating a new Exercisepackage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->id) {
            return redirect(route('users.index'));
        }
        $package = Exercise::all();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->get();
        $exercisepackages = Exercisepackage::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        ;
        $input['userid'] = strip_tags($request->user_id);
        return view('admin.exercisepackage.create ', compact('users', 'exercisepackages', 'input', 'package'));
    }

    /**
     * Store a newly created Exercisepackage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exercise_package' => 'required',
            'user_id' => 'required',

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
       
        $exercisepackage['user_id'] = strip_tags($request->user_id);
        $exercisepackage = Exercisepackage::create($input);
        $exercisepackage->save();
        $reminder = new Reminder;
        $reminder->user_id = strip_tags($request->user_id);
        $reminder->status = 'pending';
        $reminder->note = 'Today add exercise';
        $old_date = Carbon::now()->format('d-m-Y');
        $reminder->reminder_date = date('d-m-Y', strtotime($old_date . ' +30 days'));
        $reminder->save();
        $weekreminder = new Weekreminder;
        $weekreminder->user_id = strip_tags($request->user_id);
        $weekreminder->status = 'pending';
        $weekreminder->note = 'Add Exercise after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $weekreminder->reminder_date = date('d-m-Y', strtotime($old_date . ' +7 days'));
        $weekreminder->save();
        $halfmonth = new Halfmonth;
        $halfmonth->user_id = strip_tags($request->user_id);
        $halfmonth->status = 'pending';
        $halfmonth->note = 'Add Exercise after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $halfmonth->reminder_date = date('d-m-Y', strtotime($old_date . ' +15 days'));
        $halfmonth->save();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->where('id', $request->user_id)->get();
        $name = [
            'name' => Auth::user()->name,
        ];
        Notification::send($users, new ExerciseNotification($name));
        toastr()->success(__('Exercise has been saved successfully!'));
        return redirect(route('exercisepackage.index'));
    }

    /**
     * Show the form for editing the specified Exercisepackage.
     *
     * @param  \App\Exercisepackage  $exercisepackage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->get();
        $package = Exercise::all();
        $exercisepackage = Exercisepackage::findOrFail(strip_tags($id));
        return view('admin.exercisepackage.edit', compact('exercisepackage', 'users', 'package'));
    }
    /**
     * Update the specified Exercisepackage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercisepackage  $exercisepackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $exercisepackage = Exercisepackage::findOrFail(strip_tags($id));
        $request->validate([
            'exercise_package' => 'required',
            'user_id' => 'required',

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $input['user_id'] = strip_tags($request->user_id);
        $input['exercise_package'] = strip_tags($request->exercise_package);
        $exercisepackage->update($input);
        toastr()->success(__('Exercise has been updated!'));
        return redirect(route('exercisepackage.index'));
    }
    /**
     * Remove the specified Exercisepackage from storage.
     *
     * @param  \App\Exercisepackage  $exercisepackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercisepackage = Exercisepackage::findOrFail(strip_tags($id));
        $exercisepackage->delete();
        toastr()->success(__('Exercise deleted successfully.'));
        return back();
    }
    /**
     * Update the status of specified Exercisepackage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercisepackage  $exercisepackage
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $exercisepackage = Exercisepackage::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $exercisepackage->update($input);
        toastr()->info(__('Exercise status has been changed!'));
        return back();
    }
    /**
     * Bulk remove the specified Exercisepackage from storage.
     *
     * @param  \App\Exercisepackage  $exercisepackage
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
            $exercisepackage = Exercisepackage::find($checked);
            $exercisepackage->delete();
        }
        toastr()->error(__('Selected Exercise has been deleted.'));
        return back();
    }
}
