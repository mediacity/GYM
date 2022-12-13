<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenerateApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GenerateApiController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations GenerateApi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * This function is used to display all generateapi.
     *
     * @param $request
     * @return Renderable
     */
    public function getkey()
    {
        if (Auth::check()) {
            $key = DB::table('apikeys')->where('user_id', '=', Auth::user()->id)->first();
            return view('admin.apikeys.getkey', compact('key'));

        } else {
            toastr()->error(__('Please login to get your key'));
            return redirect()->route('login');
        }
    }
    /**
     * Show the form for creating a new generateapi.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKey(Request $request)
    {

        $row = DB::table('apikeys')->where('user_id', '=', Auth::user()->id)->first();
        if ($row) {

            $key = DB::table('apikeys')
                ->where('id', Auth::user()->id)
                ->update(['secret_key' => (string) Str::uuid()]);

            toastr()->success(__('Key is re-generated successfully !'));

            return back();

        } else {
            $key = DB::table('apikeys')->insert([
                'secret_key' => (string) Str::uuid(),
                'user_id' => Auth::user()->id,
            ]);

            if ($key) {
                toastr()->success(__('Key is generated successfully !'));
                return back();
            }
        }

    }
}
