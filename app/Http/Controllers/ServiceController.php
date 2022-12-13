<?php

namespace App\Http\Controllers;

use App\Service;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ServiceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Service.
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all service.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $service = Service::orderBy('created_at', 'desc')->get();
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('service.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.service.create');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('service.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $input = array_filter($request->all());
        $service = new Service;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $service = Service::create($input);
        toastr()->success(__('Service has been saved successfully!'));
        return redirect(route('service.index'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('service.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $service = Service::findOrFail(strip_tags($id));
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('service.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'name' => 'required',
            'price' => 'required',

        ]);
        $service = Service::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $service->update($input);
        toastr()->success(__('Service data has been updated!'));
        return redirect(route('service.index'));

    }

    /**
     * Remove the specified service from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('service.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $service = Service::findOrFail(strip_tags($id));
        $service->delete();
        toastr()->error(__('Service has been deleted successfully!'));
        return redirect(route('service.index'));
    }
    /**
     * Update the status of specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $service = Service::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $service->update($input);
        toastr()->info(__('Service status has been changed successfully!'));
        return back();
    }
    /**
     * Remove the specified service from storage.
     *
     * @param  \App\service  $service
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
            $service = Service::find(strip_tags($checked));
            $service->delete();
        }
        toastr()->error(__('Selected Service has been deleted.'));
        return back();
    }
}
