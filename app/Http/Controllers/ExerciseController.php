<?php

namespace App\Http\Controllers;

use App\Day;
use App\Dietid;
use App\Exercise;
use App\Exercisename;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExerciseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExerciseController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations exercise.
     */

    public function __construct()
    {
        $this->middleware(['permission:exercise.view']);
    }
    /**
     * This function is used to display all exercise.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $day = Day::all();
        $session_id = Dietid::all();
        $exerciselist = Exercise::get();
        return view('admin.exercise.index', compact('exerciselist', 'day', 'session_id'));

    }

    /**
     * Show the form for creating a new exercise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (!Auth::user()->can('exercise.add')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }

        $users = User::all();
        $days = Day::all();
        $sessions = Dietid::all();

        $dietid = Dietid::all();

        $exercisenames = Exercisename::all();
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        ;
        $input['userid'] = strip_tags($request->user_id);
        return view('admin.exercise.create ', compact('users', 'sessions', 'input', 'exercisenames', 'days', 'dietid'));

    }

    /**
     * Store a newly created exercise in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('exercise.add')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $request->validate([
            'exercise_package' => 'required',
            'session_id' => 'required',
            'day_id' => 'required',
            'exercisename_id' => 'required',

            'detail' => 'required|string|max:5000',
            'time' => 'required|integer',

        ]);
        $input = array_filter($request->all());
        
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($video = $request->file('video')) {
            $filename = time() . $video->getClientOriginalName();
            $path = public_path() . '/image/exercise/';
            $videoname = str_replace(' ', '', $filename);
            $video->move($path, $videoname);
            $input['video'] = $videoname;
        }
        $diet['session_id'] = strip_tags($request->session_id);
        $input['day'] = strip_tags($request->day_id);
        $input['exercisename'] = strip_tags($request->exercisename_id);
        $exercise = Exercise::create($input);
        $exercise->save();
        toastr()->success(__('Exercise has been saved successfully!'));
        return redirect(route('exercise.index'));
    }

    /**
     * Show the form for editing the specified exercise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('exercise.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $users = User::all();
        $sessions = Dietid::all();
        $days = Day::all();
        $exercisename = Exercisename::all();
        $exercise = Exercise::findOrFail(strip_tags($id));
        return view('admin.exercise.edit', compact('exercise', 'users', 'sessions', 'days'));
    }

    /**
     * Update the specified exercise in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('exercise.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }

        $exercise = Exercise::findOrFail(strip_tags($id));
       
        $request->validate([
            'exercise_package' => 'required',
            'session_id' => 'required',
            'day_id' => 'required',
            'exercisename_id' => 'required',
            'detail' => 'required|string|max:5000',
            'time' => 'required|integer',
        ]);
        $input = array_filter($request->all());
         if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($video = $request->file('video')) {
            $filename = time() . $video->getClientOriginalName();
            $path = public_path() . '/image/exercise/';
            $videoname = str_replace(' ', '', $filename);
            $video->move($path, $videoname);
            $input['video'] = $videoname;
        }
     
        $input['session_id'] = $request->session_id;
        $input['exercisename'] = $request->exercisename_id;
        $input['day'] = $request->day_id;
           
        $exercise->update($input);
         toastr()->success(__('Exercise has been updated!'));
        return redirect(route('exercise.index'));
    }

    /**
     * Remove the specified exercise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('exercise.delete')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $exercise = Exercise::findOrFail(strip_tags($id));
        $exercise->delete();
        toastr()->success(__('Exercise deleted successfully.'));
        return back();
    }

    /**
     * Update the status of specified exercise in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $exercise->update($input);
        toastr()->info(__('Exercise status has been changed!'));
        return back();
    }
    /**
     * Bulk remove the specified exercise from storage.
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
            $exercise = Exercise::find($checked);
            $exercise->delete();
        }
        toastr()->error(__('Selected Exercise has been deleted.'));
        return back();
    }
}
