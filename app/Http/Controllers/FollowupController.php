<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowupController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FollowupController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations followup.
     */
    public function index()
    {
        $enquiry = Enquiry::all();
        $followlist = Followup::orderBy('id', 'DESC')->get();
        return view('admin.followup.index', compact('followlist', 'enquiry'));
    }

    /**
     * Show the form for creating a new followup.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enquirys = Enquiry::all();
        return view('admin.followup.create', compact('enquirys'));
    }

    /**
     * Store a newly created followup in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = array_filter($request->all());
        $followup = Followup::create($input);
        $followup->save();
        session()->flash('success',__( 'Followup has been created successfully!'));
        return redirect(route('followup.index'));
    }

    /**
     * Show the form for editing the specified followup.
     *
     * @param  \App\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquirys = Enquiry::all();
        $followup = Followup::findOrFail(strip_tags($id));
        return view('admin.followup.edit', compact('followup', 'enquirys'));
    }

    /**
     * Update the specified followup in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $followup = Followup::findOrFail(strip_tags($id));
        $request->validate([
        ]);

        $input = array_filter($request->all());
        $followup->update($input);
        session()->flash('updated', __('Followup has been updated!'));
        return redirect(route('followup.index'));
    }

    /**
     * Remove the specified followup from storage.
     *
     * @param  \App\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $followup = Followup::findOrFail(strip_tags($id));
        $followup->delete();
        session()->flashed('success', __('Followup has been deleted'));
        return back();
    }
    /**
     * Bulk remove the specified followup from storage.
     *
     * @param  \App\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            session()->flash('warning', __('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $followup = Followup::find($checked);
            $followup->delete();
        }
        session()->flash('deleted',__( 'Selected Followup has been deleted.'));
        return back();
    }
}
