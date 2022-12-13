<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Setting\Models\Setting;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ConfigController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform setting.
     */
    /**
     * This function is used to display api.
     *
     * @param $request
     * @return Renderable
     */
    public function api(Request $request)
    {
        return view('Setting::admin.api');
    }
    /**
     * This function is used to display mail.
     *
     * @param $request
     * @return Renderable
     */
    public function mail(Request $request)
    {
        return view('Setting::admin.mail');
    }
    /**
     * This function is used to display sociallogin.
     *
     * @param $request
     * @return Renderable
     */
    public function sociallogin(Request $request)
    {
        return view('Setting::admin.sociallogin');
    }

    /**
     * Update the specified mail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $mail
     * @return \Illuminate\Http\Response
     */
    public function mail_update(Request $request)
    {
        $input = array_filter($request->all());
        $env_update = $this->changeEnv([
            'MAIL_FROM_NAME' => strip_tags($request->MAIL_FROM_NAME),
            'MAIL_DRIVER' => strip_tags( $request->MAIL_DRIVER),
            'MAIL_HOST' =>strip_tags( $request->MAIL_HOST),
            'MAIL_PORT' =>strip_tags( $request->MAIL_PORT),
            'MAIL_USERNAME' => strip_tags($request->MAIL_USERNAME),
            'MAIL_FROM_ADDRESS' => $string = preg_replace('/\s+/', '', strip_tags($request->MAIL_USERNAME)),
            'MAIL_PASSWORD' => strip_tags($request->MAIL_PASSWORD),
            'MAIL_ENCRYPTION' =>strip_tags( $request->MAIL_ENCRYPTION),
        ]);

        if ($env_update) {
            flash(__('Mail Settings has been updated'))->success();
            return back()->with('updated',__( 'Mail settings has been updated'));
        } else {
            flash(__('Mail settings could not be saved'))->error();
            return back()->with('deleted',__( 'Mail settings could not be saved'));
        }
    }

    /**
     * Update the specified sociallogin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $sociallogin
     * @return \Illuminate\Http\Response
     */
    public function sociallogin_update(Request $request)
    {
      $input = array_filter($request->all());
         if (!isset($input['is_google'])) {
            $input['is_google'] = 0;
        } else {
            $request->validate([
                'GOOGLE_CLIENT_ID' => 'required',
                'GOOGLE_CLIENT_SECRET' => 'required',
                'GOOGLE_REDIRECT' => 'required',
            ]);
        }
        if (!isset($input['is_fb'])) {
            $input['is_fb'] = 0;
        } else {
            $request->validate([
                'FACEBOOK_APP_ID' => 'required',
                'FACEBOOK_APP_SECRET' => 'required',
                'FACEBOOK_REDIRECT' => 'required',
            ]);
        }
        $env_update = $this->changeEnv([
            'GOOGLE_CLIENT_ID' => strip_tags($request->GOOGLE_CLIENT_ID),
            'GOOGLE_CLIENT_SECRET' =>strip_tags( $request->GOOGLE_CLIENT_SECRET),
            'GOOGLE_CALLBACK_URL' => strip_tags($request->GOOGLE_CALLBACK_URL),
            'FACEBOOK_CLIENT_ID' => strip_tags($request->FACEBOOK_CLIENT_ID),
            'FACEBOOK_CLIENT_SECRET' =>strip_tags( $request->FACEBOOK_CLIENT_SECRET),
            'FACEBOOK_REDIRECT' =>strip_tags( $request->FACEBOOK_REDIRECT),
        ]);
        $setting = Setting::all();
        foreach ($input as $key => $val) {
            $data = $setting->where('name', $key)->first();
            if ($data) {
                $data->update(['val' => $val]);
            } else {
                Setting::create(['name' => $key, 'val' => $val]);
            }
        }
        if ($env_update) {
            flash(__('API Settings has been updated'))->success();
            return back()->with('updated', __('API settings has been updated'));
        } else {
            flash(__('API settings could not be saved'))->error();
            return back()->with('deleted', __('API settings could not be saved'));
        }
    }

    /**
     * Update the specified apiupdate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $apiupdate
     * @return \Illuminate\Http\Response
     */
    public function api_update(Request $request)
    {
      $input = array_filter($request->all());
       if (!isset($input['is_stripe'])) {
            $input['is_stripe'] = 0;
        } else {
            $request->validate([
                'STRIPE_KEY' => 'required',
                'STRIPE_SECRET' => 'required',
            ]);
        }
        if (!isset($input['is_paystack'])) {
            $input['is_paystack'] = 0;
        } else {
            $request->validate([
                'PAYSTACK_KEY' => 'required',
                'PAYSTACK_SECRET' => 'required',
            ]);
        }
        if (!isset($input['is_braintree'])) {
            $input['is_braintree'] = 0;
        } else {
            $request->validate([
                'BRAINTREE_ENV' => 'required',
                'BRAINTREE_MERCHANT_ID' => 'required',
                'BRAINTREE_PUBLIC_KEY' => 'required',
                'BRAINTREE_PRIVATE_KEY' => 'required',
            ]);
        }
        if (!isset($input['is_rozorpay'])) {
            $input['is_rozorpay'] = 0;
        } else {
            $request->validate([
                'RAZORPAY_KEY' => 'required',
                'RAZORPAY_SECRET' => 'required',
            ]);
        }

        if (!isset($input['is_paypal'])) {
            $input['is_paypal'] = 0;
        } else {
            $request->validate([
                'PAYPAL_MODE' => 'required',
                'PAYPAL_CLIENT_ID' => 'required',
                'PAYPAL_SECRET' => 'required',
            ]);
        }
        if (!isset($input['is_paytm'])) {
            $input['is_paytm'] = 0;
        } else {
            $request->validate([
                'PAYTM_ENVIRONMENT' => 'required',
                'PAYTM_MERCHANT_ID' => 'required',
                'PAYTM_MERCHANT_KEY' => 'required',
                'PAYTM_MERCHANT_WEBSITE' => 'required',
            ]);
        }
        $env_update = $this->changeEnv([
            'RAZORPAY_KEY' => $input['RAZORPAY_KEY'],
            'RAZORPAY_SECRET' => $input['RAZORPAY_SECRET'],
            'PAYPAL_CLIENT_ID' => $input['PAYPAL_CLIENT_ID'],
            'PAYPAL_SECRET' => $input['PAYPAL_SECRET'],
            'PAYPAL_MODE' => $input['PAYPAL_MODE'],
            'PAYTM_ENVIRONMENT' => $input['PAYTM_ENVIRONMENT'],
            'PAYTM_MERCHANT_ID' => $input['PAYTM_MERCHANT_ID'],
            'PAYTM_MERCHANT_KEY' => $input['PAYTM_MERCHANT_KEY'],
            'PAYTM_MERCHANT_WEBSITE' => $input['PAYTM_MERCHANT_WEBSITE'],
            'STRIPE_KEY' => $input['STRIPE_KEY'],
            'STRIPE_SECRET' => $input['STRIPE_SECRET'],
            'PAYSTACK_KEY' => $input['PAYSTACK_KEY'],
            'PAYSTACK_SECRET' => $input['PAYSTACK_SECRET'],
            'BRAINTREE_ENV' => $input['BRAINTREE_ENV'],
            'BRAINTREE_MERCHANT_ID' => $input['BRAINTREE_MERCHANT_ID'],
            'BRAINTREE_PUBLIC_KEY' => $input['BRAINTREE_PUBLIC_KEY'],
            'BRAINTREE_PRIVATE_KEY' => $input['BRAINTREE_PRIVATE_KEY'],
        ]);
        $setting = Setting::all();
        foreach ($input as $key => $val) {
            $data = $setting->where('name', $key)->first();
            if ($data) {
                $data->update(['val' => $val]);
            } else {
                Setting::create(['name' => $key, 'val' => $val]);
            }
        }
        if ($env_update) {
            flash(__('API Settings has been updated'))->success();
            return back()->with('updated',__( 'API settings has been updated'));
        } else {
            flash(__('API settings could not be saved'))->error();
            return back()->with('deleted', __('API settings could not be saved'));
        }
    }

    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {
            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');
            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);
            // Loop through given data
            foreach ((array) $data as $key => $value) {
                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {
                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);
                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }
}
