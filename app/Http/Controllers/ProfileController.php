<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ILLuminate\Support\str;
use Image;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ProfileController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Profile.
     */
    public function index()
    {
        $user = Auth::user();
        $countries = Country::all();
        return view('admin.profile.index', compact('user', 'countries'));
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('uuid', $id)->first();
        $countries = Country::all();
        return view('manage.users.edit', compact('user', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input = array_filter($request->all());
         $user = User::where('uuid', $id)->first();
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'line1' => ['required'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'pincode' => ['required'],
        ], [
            'line1.required' => 'Please enter address',
            'country_id.required' => 'Please select a country',
            'state_id.required' => 'Please select a state',
            'pincode.required' => 'Please enter pincode',
        ]);
        if ($photo = $request->file('photo')) {

            if ($user->photo != '') {

                $image = @file_get_contents('../public/media/users/' . $user->photo);

                if ($image) {
                    unlink('../public/media/users/' . $user->photo);
                }
            }

            $imagename = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/media/users');
            $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
            $thumb_img->save($destinationPath . '/' . $imagename, 80);
            $photo->move($destinationPath, $imagename);
            $input['photo'] = $imagename;

        }
        $input['uuid'] = (string) Str::orderedUuid();
        if (isset($request->update_pass)) {

            $input['password'] = Hash::make($request->password);
        } else {
            $input['password'] = $user->password;
        }
        $user->update($input);

        if ($user) {
            toastr()->success(strip_tags("User $user->name has been updated !"));
            return redirect(route('profile.index'));
        }
    }

}
