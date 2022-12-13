<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AppointmentController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Appointment.
     */
    /**
     * This function is used to display all Appointment.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $events = array();

        $data = appointment::all();

        if ($data->count()) {

            foreach ($data as $key => $value) {
                $events[] = \Calendar::event(
                    $value->service['name'],
                    true,
                    new \DateTime($value->to),
                    new \DateTime($value->from . ' +1 day'),
                    null,
                    [
                        'color' => $value->detailcolor,
                        'url' => route('appointment.show', $value->id),
                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events);
        return view('admin.appointment.index', compact('calendar'));

    }

    /**
     * Show the form for creating a new Appointment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            }
        )->get();

        $service = Service::all();
        return view('admin.appointment.create', compact('users', 'service'));
    }

    /**
     * Store a newly created Appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'serviceid' => 'required',
            'appointment_status' => 'required',
            'to' => 'required',
            'from' => 'required',
        ]);
        $input = array_filter($request->all());
        $input['userid'] = strip_tags($request->userid);
        $input['serviceid'] = strip_tags($request->serviceid);
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $appointment = Appointment::create($input);
        $appointment->save();
        toastr()->success(__('Appointment has been saved successfully!'));
        return redirect(route('appointment.index'));
    }

    /**
     * Display the specified reAppointmentsource.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::find(strip_tags($id));
        $appointment = appointment::find(strip_tags($id));
        return view('admin.appointment.show', compact('appointment', 'user'));
    }
    /**
     * Show the form for editing the specified Appointment.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $service = Service::all();
        $appointment = Appointment::findOrFail(strip_tags($id));
        return view('admin.appointment.edit', compact('appointment', 'users', 'service'));
    }

    /**
     * Update the specified Appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail(strip_tags($id));

        $request->validate([

            'userid' => 'required|unique:appointment,userid',
            'serviceid' => 'required',
            'appointment_status' => 'required',
            'detail' => 'required',
            'to' => 'required',
            'from' => 'required',
            'comment' => 'required',

        ]);

        $input = array_filter($request->all());

        $input['serviceid'] = strip_tags($request->service_id);

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $input['userid'] = strip_tags($request->userid);
        $input['serviceid'] = strip_tags($request->serviceid);
        $appointment->update($input);

        toastr()->success(__('Appointment has been updated!'));
        return redirect(route('appointment.index'));
    }

    /**
     * Remove the specified Appointment from storage.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail(strip_tags($id));
        $appointment->delete();
        toastr()->success(__('Appointment is deleted.'));
        return back();
    }
    /**
     * Update the status of specified Appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {

        $appointment = Appointment::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {

            $input['is_active'] = 0;
        }
        $appointment->update($input);
        toastr()->info(__('Appointment Status has been changed!'));
        return back()->with('updated', 'Appointment status has been changed');
    }
    /**
     * Update the status of specified Appointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {

        $appointment = Appointment::findOrFail(strip_tags($id));
        $input = array_filter($request->all());

        if (!isset($input['status'])) {

            $input['status'] = 0;
        }
        $appointment->update($input);
        toastr()->info(__('Appointment Status has been changed!'));
        return back()->with('updated', __('Appointment status has been changed'));
    }
}
