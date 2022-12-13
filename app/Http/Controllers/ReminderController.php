<?php

namespace App\Http\Controllers;

use App\Reminder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReminderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ReminderController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Reminder.
     */

    /**
     * This function is used to display all reminder.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $user = User::all()->pluck('name', 'id');
        $reminderlist = Reminder::orderBy('id', 'DESC')->get();
        return view('admin.reminder.index', compact('reminderlist', 'user'));
    }

    /**
     * Show the form for creating a new reminder.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.reminder.create', compact('users'));
    }

    /**
     * Store a newly created reminder in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = array_filter($request->all());
        $reminder = Reminder::create($input);
        $reminder->save();
        toastr()->success(__('Reminder has been saved successfully!'));
        return redirect(route('reminder.index'));
    }

    /**
     * Show the form for editing the specified reminder.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $reminder = Reminder::findOrFail(strip_tags($id));
        return view('admin.reminder.edit', compact('reminder', 'users'));
    }

    /**
     * Update the specified reminder in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reminder = Reminder::findOrFail(strip_tags($id));
        $request->validate([
        ]);

        $input = array_filter($request->all());
        $reminder->update($input);
        toastr()->success(__('Reminder has been updated!'));
        return redirect(route('reminder.index'));
    }

    /**
     * Remove the specified reminder from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reminder = Reminder::findOrFail(strip_tags($id));
        $reminder->delete();
        toastr()->success(__('Reminder has been deleted'));
        return back();
    }
    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $reminder = Reminder::find($checked);
            $reminder->delete();
        }
        toastr()->error(__('Selected Reminder has been deleted.'));
        return back();
    }
}
