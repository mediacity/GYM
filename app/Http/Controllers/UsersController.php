<?php

namespace App\Http\Controllers;

use App\Country;
use App\Enquiryhealth;
use App\Jobs\SendReminderEmail;
use App\User;
use Auth;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Spatie\Permission\Models\Role as Role;

class UsersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | UsersController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations User.
     */

    public function __construct()
    {
        $this->middleware(['permission:users.view']);
    }

    /**
     * This function is used to display all users.
     *
     * @param $request
     * @return Renderable
     */

    public function index(Request $request)
    {
        $roles = Role::all();
        if (!$request->get('search')) {
            $userquery = User::query();
            $user = auth()->user();
            if ($user->hasRole('Super Admin')) {
                $users = $userquery->paginate(6);
            } elseif ($user->hasRole('Trainer')) {
                $trainer = Auth::user();
                $users = $userquery->paginate(6);
            } else {
                $users = $userquery->where('id', auth()->id())->paginate(6);
            }
        } else {
            $users = User::where('name', 'LIKE', '%' . strip_tags($request->search) . '%')->orWhere('email', 'LIKE', '%' . strip_tags($request->search) . '%')->paginate(6);
        }
        if ($request->roles != null) {
            if ($request->roles == 'all' || $request->roles == 'All') {
                $users = User::paginate(6);
            } else {
                $users = User::whereHas(
                    'roles', function ($q) use ($request) {
                        $q->where('name', strip_tags($request->roles));
                    }
                )->paginate(6);
            }

        }
        $demo = User::where('demo', '=', 'yes')->get();
        $vip = User::where('membership', '=', 'yes')->get();
        return view('manage.users.index', compact('roles', 'users', 'demo', 'vip', 'roles'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('users.add')) {
            return abort(403, (__('User does not have the right permissions.')));
        }
        $roles = Role::all();
        $countries = Country::all();
        $enquiryhealth = Enquiryhealth::all();
        return view('manage.users.create', compact('roles', 'countries', 'enquiryhealth'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if (!Auth::user()->can('users.add')) {
            return abort(403,(__( 'User does not have the right permissions.')));
        }
        $input = array_filter($request->all());
        
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'line1' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
        ],
            [
                'line1.required' => 'Please enter address',
                'country_id.required' => 'Please select a country',
                'state_id.required' => 'Please select a state',
                'pincode.required' => 'Please enter pincode',
            ]);
          
        $user = new User;
        $role = Role::find(strip_tags($request->role));
        $user->assignRole(strip_tags($role->name));
        if ($photo = strip_tags($request->file('photo'))) {
             $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/media/users');
            $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $photo->move($destinationPath, $imagename);
            $input['photo'] = $imagename;
        }
        if ($file = $request->file('file')) {
            $path = 'files/class/material/';
            if (!file_exists(public_path() . '/' . $path)) {
                $path = 'files/class/material/';
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }
            if ($user->file != "") {
                $class_file = @file_get_contents(public_path() . '/files/class/material/' . $input->file);

                if ($class_file) {
                    unlink('files/class/material/' . $input->file);
                }
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('files/class/material', $name);
            $input['file'] = $name;
        }
        $input['refercode'] = User::createReferCode();
        $input['password'] = Hash::make(stripe_tags($request->password));
        $input['uuid'] = (string) Str::orderedUuid();
        $input['membership'] = isset($request->membership) ? 'yes' : 'no';
        $input['demo'] = isset($request->demo) ? 'yes' : 'no';
        $user->create($input);
        if ($user) {
            session()->flash('success', "User has been created !");
            return redirect(route('users.index'));
        }

    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        if (!Auth::user()->can('users.view')) {
            return abort(403, 'User does not have the right permissions.');
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('users.edit')) {
            return abort(403, (__('User does not have the right permissions.')));
        }
        $roles = Role::all();
        $user = User::where('uuid', $id)->first();
        $countries = Country::all();
        return view('manage.users.edit', compact('user', 'roles', 'countries'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (!Auth::user()->can('users.edit')) {
            return abort(403, (__('User does not have the right permissions.')));
        }
        $input = array_filter($request->all());
        $user = User::where('uuid', $id)->firstorFail();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'line1' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
        ],
            [
                'line1.required' => 'Please enter address',
                'country_id.required' => 'Please select a country',
                'state_id.required' => 'Please select a state',
                'pincode.required' => 'Please enter pincode',
            ]);
        if (isset($user->roles[0]) && $user->roles[0]['id'] != $request->role) {
            /* Removing a user role  */
            $user->removeRole($user->roles[0]['name']);
            /* Find new role and assign it to user */

        }
        $role = Role::find($request->role);
        $user->assignRole($role->name);
        if ($photo = $request->file('photo')) {
            if ($user->photo != '') {
                $image = @file_get_contents('../public/media/users/' . $user->photo);
                if ($image) {
                    unlink('../public/media/users/' . $user->photo);
                }
            }
            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            if ($file = $request->file('file')) {
                $path = 'files/class/material/';
                if (!file_exists(public_path() . '/' . $path)) {

                    $path = 'files/class/material/';
                    File::makeDirectory(public_path() . '/' . $path, 0777, true);
                }
                if ($user->file != "") {
                    $class_file = @file_get_contents(public_path() . '/files/class/material/' . strip_tags($input->file));

                    if ($class_file) {
                        unlink('files/class/material/' . $input->file);
                    }
                }
                $name = time() . $file->getClientOriginalName();
                $file->move('files/class/material', $name);
                $input['file'] = $name;
            }
            $destinationPath = public_path('/media/users');
            $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $photo->move($destinationPath, $imagename);
            $input['photo'] = $imagename;
        }
            $input['uuid'] = (string) Str::orderedUuid();
            $input['membership'] = isset($request->membership) ? 'yes' : 'no';
            $input['demo'] = isset($request->demo) ? 'yes' : 'no';
            $user->update($input);
        if ($user) {
            session()->flash('updated', (__("User $user->name has been updated !")));
            return redirect(route('users.index'));
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Auth::user()->can('users.delete')) {
            return abort(403, 'User does not have the right permissions.');
        }
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('updated', (__("User $user->name is deleted.")));
        return back();
    }
    /**
     ** Update the status of sp;ecific user

     *
     * @param $request
     * @return Renderable
     */

    public function status_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $user->update($input);
        toastr()->info('User data has been added');
        return back()->with('updated', (__("User  status has been changed")));
    
    }

    /**
     ** Send Reminder Mail to specific User

     *
     * @param $request
     * @return Renderable
     */
    public function sendReminderEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->dispatch(new SendReminderEmail($user));
    }
    /**
     ** Directly Login as Specific user

     *
     * @param $request
     * @return Renderable
     */
    public function login($id)
    {
        $user = User::findOrFail($id);
        Auth::login($user);
        toastr()->info('Logged in as ' . Auth::user()->name);
        return redirect('/dashboard');
    }
     /**
     ** To filter a specific user by this function

     *
     * @param $request
     * @return Renderable
     */
    public function filter()
    {
        return $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'Super Admin');
            }
        )->get();

    }
}
