<?php

namespace App\Http\Controllers;

use App\Enquiryhealth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryHealthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | EnquiryHealthController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations enquiryhealth.
     */
    public function index()
    {
        $enquiryhealth = EnquiryHealth::all();
        return view('admin.enquiry.enquiryhealth.index', compact('enquiryhealth'));
    }

    /**
     * Show the form for creating a new enquiryhealth.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enquiryhealth = EnquiryHealth::all();
        return view('admin.enquiry.enquiryhealth.create', compact('enquiryhealth'));
    }

    /**
     * Store a newly created enquiryhealth in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'issue' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $enquiryhealth = new EnquiryHealth;
        $enquiryhealth->issue = strip_tags($request->issue);
        $enquiryhealth->is_active = $input['is_active'];
        $enquiryhealth->save();
        toastr()->success(__('Your Health Issue has been added'));
        return redirect(route('enquiry.create'));

    }

    /**
     * Show the form for editing the specified enquiryhealth.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquiryhealth = EnquiryHealth::find(strip_tags($id));
        return view('admin.enquiry.enquiryhealth.edit', compact('enquiryhealth'));
    }

    /**
     * Update the specified enquiryhealth in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'issue' => 'required',
        ]);
        $enquiryhealth = EnquiryHealth::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $enquiryhealth->update($input);
        toastr()->success(__('Your Health has been updatd.'));
        return redirect(route('enquiryhealth.index'));
    }
    /**
     * Update the status of specified enquiryhealth in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $enquiryhealth = EnquiryHealth::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $enquiryhealth->update($input);
        toastr()->info(__('Health status has been changed'));
        return back();
    }
    /**
     * Remove the specified enquiryhealth from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquiryhealth = EnquiryHealth::findOrFail(strip_tags($id));
        $enquiryhealth->delete();
        toastr()->error(__('Health Issue has been deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified enquiryhealth from storage.
     *
     * @param  int  $id
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
            $enquiryhealth = Enquiryhealth::find($checked);
            $enquiryhealth->delete();
        }
        toastr()->error(__('Selected Enquiryhealth has been deleted.'));
        return back();
    }
}
