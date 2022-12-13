<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GoalController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Goal.
     */
    /**
     * This function is used to display all goal.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $goal = Goal::orderBy('created_at', 'desc')->get();
        return view('admin.goal.index', compact('goal'));
    }

    /**
     * Show the form for creating a new goal.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goal.create');
    }

    /**
     * Store a newly created resogoalurce in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'goal' => 'required',
        ]);

        $input = array_filter($request->all());
        $goal = new Goal;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $goal = Goal::create($input);
        toastr()->success(__('Goal has been saved successfully!'));
        return redirect(route('goal.index'));
    }

    /**
     * Show the form for editing the specified goal.
     *
     * @param  \App\goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::findOrFail(strip_tags($id));
        return view('admin.goal.edit', compact('goal'));
    }

    /**
     * Update the specified goal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $goal = Goal::findOrFail(strip_tags($id));

        $request->validate([
            'goal' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $goal->update($input);
        toastr()->success(__('Goal has been updated successfully!'));
        return redirect(route('goal.index'));
    }

    /**
     * Remove the specified goal from storage.
     *
     * @param  \App\goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::findOrFail(strip_tags($id));
        $goal->delete();
        return redirect()->route('goal.index')
            ->with('success', __('Goal deleted successfully'));
    }
    /**
     * Update the status of specified goal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $goal = Goal::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $goal->update($input);
        toastr()->info(__('Goal status has been changed.'));
        return back();
    }
/**
 * Bulk remove the specified goal from storage.
 *
 * @param  \App\goal  $goal
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
            $goal = Goal::find($checked);
            $goal->delete();
        }
        toastr()->error(__('Selected Goal has been deleted.'));
        return back();
    }
}
