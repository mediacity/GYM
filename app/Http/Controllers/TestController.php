<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role as Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
 /*
    |--------------------------------------------------------------------------
    | TestController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform test.
     */
{
    public function test(Request $request){
    	Permission::create(['name' => $request->name]);
        return back();

    }
}
