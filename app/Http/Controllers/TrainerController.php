<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\Trainer;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class TrainerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TrainerController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Trainer.
     */

    public function __construct()
    {
        $this->middleware(['permission:trainer.view']);
    }

    /**
     * This function is used to display all trainer.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!$request->search) {
            $trainers = Trainer::paginate(2);
        } else {
            $trainers = Trainer::where('trainer_name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->paginate(2);
        }
       
        return view('admin.trainerlist.trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new trainer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('trainer.add')) {
            return abort(403, __( 'User does not have the right permissions.'));
        }
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Trainer');
            })->get();
        $countries = Country::all();
        $trainer = Trainer::all();
        return view('admin.trainerlist.trainer.create', compact('trainer', 'countries', 'users'));
    }

    /**
     * Store a newly created trainer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('trainer.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $this->validate($request, [
            'trainer_name' => 'required',
            'email' => 'required|string|email|unique:trainers,email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'trainer_limit' => 'required',
            'type' => 'required',
        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $trainer = new Trainer;
        if ($photo = $request->file('photo')) {
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/image/slider');
            $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $photo->move($destinationPath, $imagename);
            $input['photo'] = $imagename;
        }
        $trainer->photo = strip_tags($request->photo);
        $trainer->trainer_name = strip_tags($request->trainer_name);
        $trainer->email = strip_tags($request->email);
        $trainer->phone = strip_tags($request->phone);
        $trainer->dob = strip_tags($request->dob);
        $trainer->address = strip_tags($request->address);
        $trainer->pincode = strip_tags($request->pincode);
        $trainer->country_id = strip_tags($request->country_id);
        $trainer->state_id = strip_tags($request->state_id);
        $trainer->city_id = strip_tags($request->city_id);
        $trainer->qualification = strip_tags($request->qualification);
        $trainer->specialization = strip_tags($request->specialization);
        $trainer->rating = strip_tags($request->rating);
        $trainer->experience = strip_tags($request->experience);
        $trainer->trainer_limit = strip_tags($request->trainer_limit);
        $trainer->type = strip_tags($request->type);
        $trainer->is_active = $input['is_active'];
        $trainer->save();
        toastr()->success(__('Trainer has been added.'));
        return redirect(route('trainer.index'));
    }

    /**
     * Show the form for editing the specified trainer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('trainer.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $countries = Country::all();
        $state = State::all();
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Trainer');
            })->get();

        $trainer = Trainer::find(strip_tags($id));
        $user_info = User::find(4);
       
        return view('admin.trainerlist.trainer.edit', compact('trainer', 'countries', 'state', 'users'));
    }

    /**
     * Update the specified trainer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('trainer.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
    
        $this->validate($request, [
            'trainer_name' => 'required',
            'phone' => 'required|max:5000',
            'dob' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'trainer_limit' => 'required',
            'type' => 'required',
        ]);
        $trainer = Trainer::findOrFail($id);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($photo = $request->file('photo')) {
            if ($trainer->photo != '') {
                $image = @file_get_contents('../public/image/slider/' . $trainer->photo);
                if ($image) {
                    unlink('../public/image/slider/' . $trainer->photo);
                }
            }
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/image/slider');
            $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $photo->move($destinationPath, $imagename);
            $input['photo'] = $imagename;
        }
       
        $trainer->update($input);
        toastr()->success(__('Your Trainer has been updatd.'));
        return redirect(route('trainer.index'));
    }
    /**
     * This function is used to update status of specific trainer
     *
     * @param $request
     * @return Renderable
     */
    public function status_update(Request $request, $id)
    {
        $trainer = Trainer::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $trainer->update($input);
        toastr()->info(__('Trainer status changes successfully!'));
        return redirect(route('trainer.index'));
    }

    /**
     * Remove the specified trainer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('trainer.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $trainer = Trainer::findOrFail(strip_tags($id));
        $trainer->delete();
        toastr()->error( __('Trainer has been deleted.'));
        return back();

    }
    /**
     * Bulk remove the specified trainer from storage.
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
            $trainer = Trainer::find($checked);
            $trainer->delete();
        }
        toastr()->error(__('Selected Trainer has been deleted.'));
        return back();
    }
}
