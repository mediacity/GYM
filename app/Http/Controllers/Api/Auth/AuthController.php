<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use App\User;

class AuthController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function login(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AppName')->accessToken;
            return $this->issueToken($request, 'password');
            return response()->json(['msg' => 'Login successfull', 'access_token' => $token], 200);
        } else {
            return response()->json(['error' => 'Email or password is invalid'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $success['token'] = $user->createToken('AppName')->accessToken;
        return $this->issueToken($request, 'password');
        return response()->json(['success' => $success], 200);
    }

    public function user_detail()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }

    public function reset()
    {
        $credentials = request()->validate([
            'email' => 'required|email',

        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => " token provided"], 400);
        }

        return response()->json(["msg" => "Password has been successfully changed"]);
    }

    public function logout()
    {
        if (Auth::check()) {
            $user = Auth::user()->token();
            
            $user->delete();
            return response()->json(["msg" => "Logout successfully"]);
        }


    }

    public function updateprofile(Request $request)
    {
        
        $auth = Auth::user();

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $input = $request->all();
           if (Hash::check($request->password, $auth->password)) {
            if ($file = $request->file('photo')) {
                if ($auth->photo != null) {
                    $image_file = @file_get_contents(public_path() . '/images/photo/' . $auth->img);
                    if ($image_file) {
                        unlink(public_path() . '/images/photo/' . $auth->img);
                    }
                }
                $name = time() . $file->getClientOriginalName();
                $file->move('images/photo', $name);
                $input['photo'] = $name;
            }
    
            $auth->update([
                'name' => isset($input['name']) ? $input['name'] : $auth->name,
                'email' => $input['email'],
                'password' => isset($input['password']) ? bcrypt($input['password']) : $auth->password,
                'mobile' => isset($input['mobile']) ? $input['mobile'] : $auth->mobile,
                'dob' => isset($input['dob']) ? $input['dob'] : $auth->dob,
                'image' => isset($input['image']) ? $input['image'] : $auth->photo,
                'address' => isset($input['address']) ? $input['address'] : $auth->address,

            ]);

            $auth->save();
            return response()->json(array('auth' => $auth), 200);
        }
         else {
             return 'done';
            return response()->json('error: password doesnt match', 400);
        }

    }
    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['phone_number'], "sms");
        User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('verify')->with(['phone_number' => $data['phone_number']]);
    }
    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
        if ($verification->valid) {
            $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            return redirect()->route('home')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

}
