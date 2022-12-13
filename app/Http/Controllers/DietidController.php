<?php

namespace App\Http\Controllers;

use App\Dietid;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietidController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DietidController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Dietid.
     */
    public function __construct()
    {
        $this->middleware(['permission:diet_session.view']);
    }
    /**
     * This function is used to display all dietid.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $dietid = dietid::orderBy('created_at', 'desc')->get();
        return view('admin.diet.dietid.index', compact('dietid'));
    }

    /**
     * Show the form for creating a new dietid.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('diet_session.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $dietid = Dietid::all();
        return view('admin.diet.dietid.create', compact('dietid'));

    }

    /**
     * Store a newly created dietid in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('diet_session.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        $this->validate($request, [
            'session_id' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $dietid = new Dietid;
        $dietid->session_id = strip_tags($request->session_id);
        $dietid->is_active = $input['is_active'];
        $dietid->save();
        return redirect(route('dietid.index'))->with('successMsg', 'Diet Session Added');
    }

    /**
     * Show the form for editing the specified dietid.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('diet_session.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $dietid = Dietid::find(strip_tags($id));
        return view('admin.diet.dietid.edit', compact('dietid'));
    }

    /**
     * Update the specified dietid in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('diet_session.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $this->validate($request, [
            'session_id' => 'required',
        ]);
        $dietid = dietid::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $dietid->update($input);
        toastr()->success(__('Diet Session has been updatd.'));
        return redirect(route('dietid.index'));
    }
    /**
     * Update the status of specified dietid in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $dietid = Dietid::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $dietid->update($input);
        toastr()->info(__('Diet Session status has been changed  successfully!'));
        return back();
    }
    /**
     * Remove the specified dietid from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('diet_session.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $dietid = dietid::findOrFail(strip_tags($id));
        $dietid->delete();
        toastr()->error(__('Diet Session data has been deleted.'));
        return back();
    }
/**
 * Bulk remove the specified dietid from storage.
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
            $dietid = Dietid::find($checked);
            $dietid->delete();
        }
        toastr()->error(__('Selected Enquiries has been deleted.'));
        return back();
    }

}
