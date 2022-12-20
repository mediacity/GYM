<?php

namespace App\Http\Controllers;

use App\Appointmentsetting;
use Illuminate\Http\Request;

class AppointmentsettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AppointmentsettingController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Appointmentsetting.
     */
    public function index()
    {
        $appointmentsettinglist = Appointmentsetting::orderBy('created_at', 'desc')->get();
        return view('admin.appointmentsetting.index', compact('appointmentsettinglist'));
    }

    /**
     * Show the form for creating a new Appointmentsetting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointmentsetting.create');
    }

    /**
     * Store a newly created Appointmentsetting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slot' => 'required',
        ]);
        $input = array_filter($request->all());

        $input['is_active'] = isset($input['is_active']) ? 1 : 0;

        $memberattendance['status'] = isset($request->status) ? 1 : 0;

        $appointmentsetting = Appointmentsetting::create($input);

        $appointmentsetting->save();
        toastr()->success(__('Appointment has been saved successfully!'));

        return redirect(route('appointmentsetting.index'));
    }

    /**
     * Update the specified Appointmentsetting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointmentsetting  $appointmentsetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointmentsetting = Appointmentsettting::findOrFail(strip_tags($id));

        $request->validate([
            'slot' => 'required',

        ]);
        $input = array_filter($request->all());
         if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $appointmentsetting->update($input);
         toastr()->success(__('Appointmentsetting has been updated!'));
        return redirect(route('appointmentsetting.index'));

    }

    /**
     * Remove the specified Appointmentsetting from storage.
     *
     * @param  \App\appointmentsetting  $appointmentsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointmentsetting = Appointmentsetting::findOrFail($id);
        $appointmentsetting->delete();
        toastr()->success('AppointmentSetting is deleted.');
        return back();
    }
    /**
     * Update the status of specified Appointmentsetting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointmentsetting  $appointmentsetting
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {

        $appointmentsetting = Appointmentsetting::findOrFail($id);

        $input = $request->all();

        if (!isset($input['is_active'])) {

            $input['is_active'] = 0;
        }

        $appointmentsetting->update($input);
        toastr()->info('Appointmentsetting Status has been changed!');
        return back()->with('updated', 'Appointmentsetting status has been changed');
    }
}
