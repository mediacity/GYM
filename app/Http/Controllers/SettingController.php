<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
	 /*
    |--------------------------------------------------------------------------
    | SettingController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform basic setting of our project.
     */
    public function __construct()
    {
        $this->middleware(['permission:settings.update']);
    }

    public function get()
    {
		$setting = Settings::first();
        $currency = Currency::where('id', $setting->default_currency)->get();
		return view('admin.settings.settings', compact('setting', 'currency'));
    }
    public function saveSettings(Request $request)
    {
        
        try {

            $setting = Settings::first();
			$input = array_filter($request->all());
			$env_update = $this->changeEnv(['APP_NAME' => $request->site_title]);
			 if ($setting) {
                 
				 if ($file = $request->file('site_logo')) {
                    $site_logo = @file_get_contents('../public/media/logo/' . $setting->site_logo);
					if ($site_logo) {
                        unlink('../public/media/logo/' . $setting->site_logo);
                    }
					$optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/logo/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);
					$input['site_logo'] = $image;
				 }

                if ($file = $request->file('login_side_image')) {
                    $login_side_image = @file_get_contents('../public/media/login/' . $setting->login_side_image);
					if ($login_side_image) {
                        unlink('../public/media/login/' . $setting->login_side_image);
                    }
					$optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/login/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);
					$input['login_side_image'] = $image;
				}


                if ($file = $request->file('site_favicon')) {
                    $site_favicon = @file_get_contents('../public/media/logo/' . $setting->site_favicon);
					if ($site_favicon) {
                        unlink('../public/media/logo/' . $setting->site_favicon);
                    }

                    $optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/logo/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);
					$input['site_favicon'] = $image;

                }
                if (!isset($input['inspect_element'])) {
                       
                    $input['inspect_element'] = 0;
                }
                else{
                    $input['inspect_element'] = 1;
                }
                if (!isset($input['right_click'])) {
                    $input['right_click'] = 0;
                }
                else{
                    $input['right_click'] = 1;
                }
				$setting->update($input);

            } else {

                $setting = new Settings;

                if ($file = $request->file('site_logo')) {
                    $logo = @file_get_contents('../public/media/logo/' . $setting->site_logo);

                    if ($logo) {
                        unlink('../public/media/logo/' . $setting->site_logo);
                    }

                    $optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/logo/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);

                    $input['site_logo'] = $image;

                }

                if ($file = $request->file('site_favicon')) {
                    $site_favicon = @file_get_contents('../public/media/logo/' . $setting->site_favicon);

                    if ($site_favicon) {
                        unlink('../public/media/logo/' . $setting->site_favicon);
                    }
                    $optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/logo/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);
					 $input['site_favicon'] = $image;

                }
                
                if ($file = $request->file('login_side_image')) {
                    $login_side_image = @file_get_contents('../public/media/login/' . $setting->login_side_image);
					if ($login_side_image) {
                        unlink('../public/media/login/' . $setting->login_side_image);
                    }
					$optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/media/login/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);
					$input['login_side_image'] = $image;
				}
				 $setting->create($input);
            }

            return back()->with('success', __('Site Settings Saved !'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function mailsetting()
    {
        return view('admin.settings.mailsetting');
    }

    public function savemailsetting(Request $request)
    {

        $env_update = $this->changeEnv([
            'MAIL_FROM_NAME' => '"' . strip_tags($request->MAIL_FROM_NAME) . '"',
            'MAIL_DRIVER' => strip_tags($request->MAIL_DRIVER),
            'MAIL_FROM_ADDRESS' => strip_tags($request->MAIL_FROM_ADDRESS),
            'MAIL_HOST' => strip_tags($request->MAIL_HOST),
            'MAIL_DRIVER' => strip_tags($request->MAIL_DRIVER),
            'MAIL_USERNAME' =>strip_tags( $request->MAIL_USERNAME),
            'MAIL_PASSWORD' => strip_tags($request->MAIL_PASSWORD),
            'MAIL_ENCRYPTION' => strip_tags($request->MAIL_ENCRYPTION),
        ]);

        return back()->with('success', 'Mail Settings Saved !');

    }
    public function getpaymentsettings()
    {
        return view('admin.settings.razorpay');
    }

    public function savepaymentsettings(Request $request)
    {

        if ($request->type == 'razorpay') {
            $env_update = $this->changeEnv([

                'RAZOR_PAY_KEY' => strip_tags( $request->RAZOR_PAY_KEY),
                'RAZOR_PAY_SECRET' =>strip_tags( $request->RAZOR_PAY_SECRET),
                'ENABLE_RAZOR_PAY' => isset($request->ENABLE_RAZOR_PAY) ? 1 : 0,
            ]);
        }
        if ($request->type == 'paytm') {
            $env_update = $this->changeEnv([
                'PAYTM_MERCHANT_ID' => strip_tags( $request->PAYTM_MERCHANT_ID),
                'PAYTM_MERCHANT_KEY' => strip_tags($request->PAYTM_MERCHANT_KEY),
                'PAYTM_MERCHANT_WEBSITE' => strip_tags($request->PAYTM_MERCHANT_WEBSITE),
                'ENABLE_PAYTM_PAY' => isset($request->ENABLE_PAYTM_PAY) ? 1 : 0,
                'ENVIRONMENT' => strip_tags($request->ENVIRONMENT),
            ]);
        }
		 return back()->with('success', __('Payment Settings Saved !'));
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
