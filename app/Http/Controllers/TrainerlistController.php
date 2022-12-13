<?php

namespace App\Http\Controllers;

use App\Notifications\TrainerNotification;
use App\Trainer;
use App\Trainerlist;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class TrainerlistController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TrainerlistController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Traierlist.
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all trainerlist.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $trainerlist = Trainerlist::all();
        if (!$request->id) {
            return redirect(route('users.index'));
        }

        $trainerlist = Trainerlist::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
        
        return view('admin.trainerlist.index', compact('trainerlist'));
    }

    /**
     * Show the form for creating a new trainerlist.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Auth::user()->can('trainer_list.add')) {

            return abort(403, 'User does not have the right permissions.');
        }
        if (!$request->id) {
            return redirect(route('users.index'));

        }
        $trainerlist = Trainerlist::orderBy('created_at', 'desc')->where('user_id', '=', base64_decode($request->id))->get();
        $trainerlist = Trainerlist::all();
        $users = User::all();
        $trainers = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Trainer');
            })->get();
        return view('admin.trainerlist.create', compact('trainerlist', 'users', 'trainers'));
    }
    /**
     * This function is used to get all trainerlist.
     *
     * @param $request
     * @return Renderable
     */
    public function getData(Request $request)
    {
        $trainers = DB::table("trainers")->where("id", $request->type_id)->pluck("type");
        return response()->json($trainers);

    }
    /**
     * Store a newly created trainerlist in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('trainer_list.add')) {

            return abort(403, 'User does not have the right permissions.');
        }
        $this->validate($request, [
            'user_id' => 'required',
            'trainer_name' => 'required',
            'personaltrainer' => 'required',
            'description' => 'required|max:5000',
            'from' => 'required',
            'to' => 'required',

        ]);

        $input = $request->all();
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }

        $trainerlist = new Trainerlist;
        $trainerlist->user_id = (strip_tags($request->user_id));
        $trainerlist->trainer_name = (strip_tags($request->trainer_name));
        $trainerlist->personaltrainer = (strip_tags($request->personaltrainer));
        $trainerlist->description = (strip_tags($request->description));
        $trainerlist->from = (strip_tags($request->from));
        $trainerlist->to = (strip_tags($request->to));
        $trainerlist->is_active = $input['is_active'];
        $trainerlist->save();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            })->where('id', $request->user_id)->get();
        $name = [
            'trainer_name' => $trainerlist['trainer_name'],
            'name' => Auth::user()->name,
        ];
        Notification::send($users, new TrainerNotification($name));
        return redirect(route('trainerlist.index'))->with('successMsg', 'Trainer Added');
    }

    /**
     * Show the form for editing the specified trainerlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('trainer_list.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }
        $users = User::all();
        $trainers = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Trainer');
            })->get();
        $trainerlist = Trainerlist::find(strip_tags($id));
        return view('admin.trainerlist.edit', compact('trainers', 'users', 'trainerlist', 'id'));
    }

    /**
     * Update the specified trainerlist in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('trainer_list.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $this->validate($request, [
            'user_id' => 'required',
            'trainer_name' => 'required',
            'personaltrainer' => 'required',
            'description' => 'required|max:5000',
            'from' => 'required',
            'to' => 'required',

        ]);
        $trainerlist = Trainerlist::findOrFail($id);
        $input = $request->all();
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $trainerlist->update($input);
        toastr()->success(__('Your Trainer has been updatd.'));
        return redirect(route('trainerlist.index'));
    }
    /**
     * Statu Update the specified trainerlist in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $trainerlist = Trainerlist::findOrFail($id);
        $input = $request->all();
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $trainerlist->update($input);
        toastr()->info(__('Trainer status changes successfully!'));
        return back()->with('updated', 'Trainer status has been Updated');
    }

    /**
     * Remove the specified trainerlist from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('trainer_list.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $trainerlist = Trainerlist::findOrFail($id);
        $trainerlist->delete();
        toastr()->error('Trainer has been deleted.');
        return back();

    }
    /**
     * Bulk remove the specified trainerlist from storage.
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
            $trainerlist = Trainerlist::find($checked);
            $trainerlist->delete();
        }
        toastr()->error((__('Selected Trainerlist has been deleted.')));
        return back();
    }
}
