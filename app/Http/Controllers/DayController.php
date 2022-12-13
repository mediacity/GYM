<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DayController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations day.
     */
    public function index()
    {
        $day = Day::orderBy('created_at', 'desc')->get();
        return view('admin.day.index', compact('day'));
    }

    /**
     * Show the form for creating a new day.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.day.create');
    }

    /**
     * Store a newly created day in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required',
        ]);
        $input = array_filter($request->all());
        $day = new Day;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $day = Day::create($input);
        toastr()->success(__('Day has been saved successfully!'));
        return redirect(route('day.index'));
    }
    /**
     * Show the form for editing the specified day.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $day = Day::findOrFail(strip_tags($id));
        return view('admin.day.edit', compact('day'));
    }

    /**
     * Update the specified day in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $day = Day::findOrFail(strip_tags($id));
         $request->validate([
            'day' => 'required',
        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        toastr()->success(__('Day has been updated successfully!'));
        return redirect(route('day.index'));

    }

    /**
     * Remove the specified day from storage.
     *
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::findOrFail(strip_tags($id));
        $day->delete();
         return redirect()->route('day.index')
            ->with('success', __('Day deleted successfully'));
    }
    /**
     * Update the status ofspecified day in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $day = Day::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $day->update($input);
        toastr()->info(__('Days status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified day from storage.
     *
     * @param  \App\Day  $day
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
            $day = Day::find($checked);
            $day->delete();
        }
        toastr()->error(__('Selected Day has been deleted.'));
        return back();
    }

}
