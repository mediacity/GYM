<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class AuthForgetPasswordController extends Controller
{

public function reset() {
    $credentials = request()->validate(['email' => 'required|email']);

    Password::sendResetLink($credentials);

    return response()->json(["msg" => 'Reset password link sent successfully on your email .']);
}
}

