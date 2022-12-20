<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GroupController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Group.
     */
    public function __construct()
    {
        // $this->middleware(['permission:group.view']);
    }
    /**
     * This function is used to display all group.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {  
       $user_role = Auth::user()->roles[0]->name ?? 'No role set';
        if ($user_role == 'User' || $user_role == 'user') {
            $userGroupID = [];
            $gplists = Group::all();
            foreach ($gplists as $key => $gplist) {                
                if(in_array(Auth::user()->id, $gplist->user_id)){
                    foreach ($gplist->user_id as $key => $userID) {
                        array_push($userGroupID,$gplist->id);
                    }                    
                }
            }
            $grouplist = Group::whereIn('id',$userGroupID)->orderBy('id', 'DESC')->get();
        } else {
            $grouplist = Group::orderBy('id', 'DESC')->get();
        }
        return view('admin.group.index', compact('grouplist'));
    }

    /**
     * Show the form for creating a new group.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('group.add')) {
            return abort(403,__( 'User does not have the right permissions.'));

        }
        $users = User::all();
        return view('admin.group.create', compact('users'));
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('group.add')) {
            return abort(403,__( 'User does not have the right permissions.'));

        }
        $request->validate([
            'name' => 'required|string|',
             'detail' => 'required|string|max:5000',
             'user_id' => 'required',
        ]);

        $input = array_filter($request->all());
         $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $group = Group::create($input);
        $group->created_at = Carbon::now();
        $group->updated_at = Carbon::now();
        $group->save();
        toastr()->success(__('Group has been added sucessfully'));
        return redirect(route('group.index'));

    }

    /**
     * Show the form for editing the specified group.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('group.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $users = User::all();
        $group = Group::findOrFail($id);
        
        return view('admin.group.edit', compact('group', 'users'));

    }
    /**
     * Update the specified group in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('group.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'name' => 'required|string|',
            'detail' => 'required|string|max:5000',
            'user_id' => 'required',
        ]);

        $group = Group::findOrFail(strip_tags($id));
         $request->validate([
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
         $group->update($input);
        toastr()->success(__('Group data has been updated!'));
        return redirect(route('group.index'));
    }

    /**
     * Remove the specified group from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('group.delete')) {
            return abort(403, __("'User does not have the right permissions.'"));
        }
        $group = Group::findOrFail(strip_tags($id));
        $group->delete();
        toastr()->error(__('Group data deleted successfully'));
        return back();
    }
/**
 * Update the status of specified group in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Group  $group
 * @return \Illuminate\Http\Response
 */
    public function status_update(Request $request, $id)
    {
        $group = Group::findOrFail(strip_tags($id));

        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $group->update($input);
        toastr()->info(__('Group status has been changed.'));
        return back()->with('updated', __('Group status has been changed'));
    }
    /**
     * Bulk remove the specified group from storage.
     *
     * @param  \App\group  $group
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
            $group = Group::find($checked);
            $group->delete();
        }
        toastr()->error(__('Selected Group has been deleted.'));
        return back();
    }
}
