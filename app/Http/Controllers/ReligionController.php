<?php

namespace App\Http\Controllers;

use App\religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReligionController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | ReligionController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Religion.
     */

    /**
     * Display a listing of the religion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religion = Religion::orderBy('created_at', 'desc')->get();
        return view('admin.religion.index', compact('religion'));
    }

    /**
     * Show the form for creating a new religion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.religion.create');
    }

    /**
     * Store a newly created religion in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'religion' => 'required',
        ]);

        $input = array_filter($request->all());
        $religion = new Religion;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $religion = Religion::create($input);
        toastr()->success(__('Religion has been saved successfully!'));
        return redirect(route('religion.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $religion = Religion::findOrFail(strip_tags($id));
        return view('admin.religion.edit', compact('religion'));
    }

    /**
     * Update the specified religion in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $religion = Religion::findOrFail(strip_tags($id));
        $request->validate([
            'religion' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $religion->update($input);
        toastr()->success(__('Religion has been updated successfully!'));
        return redirect(route('religion.index'));
    }

    /**
     * Remove the specified religion from storage.
     *
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $religion = Religion::findOrFail(strip_tags($id));
        $religion->delete();
        return redirect()->route('religion.index')
            ->with('success', __('Religion deleted successfully'));
    }
    /**
     * Update the status of  specified religion in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $religion = Religion::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $religion->update($input);
        toastr()->info(__('Religion status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified religion from storage.
     *
     * @param  \App\religion  $religion
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
            $religion = Religion::find($checked);
            $religion->delete();
        }
        toastr()->error(__('Selected Religion has been deleted.'));
        return back();
    }
}
