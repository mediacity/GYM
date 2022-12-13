<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Level;
use App\Workoutplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkoutplanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | WorkoutplanController
    |--------------------------------------------------------------------------
    */

     /**
     * This function is used to showing workoutplan
     */
     
    public function index()
    {
        $workoutplan = Workoutplan::orderBy('created_at', 'desc')->get();
        $levels = Level::first();
        $goals = Goal::first();
        return view('admin.workoutplan.index', compact('workoutplan', 'goals', 'levels'));

    }

    /**
     * Show the form for creating a new workoutplan.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $levels = Level::all();
        $goals = Goal::all();
        $workoutplan = Workoutplan::all();
        return view('admin.workoutplan.create', compact('workoutplan', 'goals', 'levels'));
    }

    /**
     * Store a newly created workoutplan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
            $this->validate($request, [
            'name' => 'required',
            'goal_name' => 'required',
            'level_name' => 'required',
            'duration' => 'required',
            'days' => 'required',
            'note' => 'required',

        ]);

        $input = array_filter($request->all());
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $workoutplan = Workoutplan::create(strip_tags($input));
        $workoutplan->save();
        toastr()->success (__('Workoutplan has been saved successfully!'));
        return redirect(route('workoutplan.index'));
    }

    /**
     * Show the form for editing the specified workoutplan.
     *
     * @param  \App\workoutplan  $workoutplan
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $levels = Level::all();
        $goals = Goal::all();
        $workoutplan = Workoutplan::find(strip_tags($id));
        return view('admin.workoutplan.edit', compact('workoutplan', 'goals', 'levels'));
    }

    /**
     * Update the specified workoutplan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\workoutplan  $workoutplan
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

            $this->validate($request, [
            'name' => 'required',
            'goal_name' => 'required',
            'level_name' => 'required',
            'duration' => 'required',
            'days' => 'required',
            'note' => 'required',

        ]);
        $workoutplan = Workoutplan::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        $workoutplan->update($input);
        toastr()->success(__('Your workoutplan has been updatd.'));
        return redirect(route('workoutplan.index'));
    }

    /**
     * Remove the specified resworkoutplanource from storage.
     *
     * @param  \App\workoutplan  $workoutplan
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $workoutplan = workoutplan::findOrFail(strip_tags($id));
        $workoutplan->delete();
        toastr()->error(__('Workoutplan data has been deleted.'));
        return back();
    }

    /**
     * This function is used to bulk delete from workoutplan.
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $workoutplan = Workoutplan::find($checked);
            $workoutplan->delete();
        }
        toastr()->error(__('Selected Workoutplan has been deleted.'));
        return back();
    }

    /**
     * This function is used to change the status in workoutplan
     */
    public function status_update(Request $request, $id)
    {

        $workoutplan = Workoutplan::findOrFail(strip_tags($id));
        $input = $request->all();
        if (!isset($input['is_active'])) {

            $input['is_active'] = 0;
        }
        $workoutplan->update(strip_tags($input));
        toastr()->info(__('workoutplan Status has been changed!'));
        return back()->with(__('updated', 'workoutplan status has been changed'));
    }
}
