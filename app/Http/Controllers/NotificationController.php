<?php

namespace App\Http\Controllers;

use App\Notifications\OfferPushNotifications;
use DotenvEditor;
use Illuminate\Http\Request;

// use Ladumor\OneSignal\OneSignal;

class NotificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | NotificationController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Notification.
     */
    /**
     * This function is used to markasread all notification.
     *
     * @param $request
     * @return Renderable
     */
    public function markAsRead()
    {

        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();
        return redirect()
            ->back();

        return back();
    }
    /**
     * Remove the specified notification from storage.
     *
     * @param  \App\Modules\Todo\Models\TodoBoard  $notification
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {

        $notifications = Auth()->User()->notifications()->get();

        foreach ($notifications as $notification) {

            $notification->delete();

        }
        return back();
    }
    /**
     * This function is used to display all notification.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        return view('admin.notification.index');
    }
    /**
     * Update the specified notification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Todo\Models\TodoBoard  $todoboard
     * @return \Illuminate\Http\Response
     */
    public function updateKeys(Request $request)
    {

        $request->validate([
            'ONESIGNAL_APP_ID' => 'required|string',
            'ONESIGNAL_REST_API_KEY' => 'required|string',
        ], [
            'ONESIGNAL_APP_ID.required' => 'OneSignal app id is required',
            'ONESIGNAL_REST_API_KEY.required' => 'Onesignal rest api key is required',
        ]);

        $env_keys_save = DotenvEditor::setKeys([
            'ONESIGNAL_APP_ID' => strip_tags($request->ONESIGNAL_APP_ID),
            'ONESIGNAL_REST_API_KEY' => strip_tags($request->ONESIGNAL_REST_API_KEY),
        ]);

        $env_keys_save->save();

        toastr()->success(__('Keys updated successfully !'), 'OneSignal');
        return back();
    }
    /**
     * This function is used to push all notification.
     *
     * @param $request
     * @return Renderable
     */
    public function push(Request $request)
    {

        ini_set('max_excecution_time', -1);

        ini_set('memory_limit', -1);

        $request->validate([
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        if (env('ONESIGNAL_APP_ID') == '' && env('ONESIGNAL_REST_API_KEY') == '') {

            \Session::toastr('success', __('Please update onesignal keys in settings !'));
            return back()->withInput();
        }

        try {

            $usergroup = User::query();

            $data = [
                'subject' => strip_tags($request->subject),
                'body' => strip_tags($request->message),
                'target_url' => strip_tags($request->target_url) ?? null,
                'icon' => strip_tags($request->icon) ?? null,
                'image' => strip_tags($request->image) ?? null,
                'buttonChecked' => strip_tags($request->show_button) ? "yes" : "no",
                'button_text' => strip_tags($request->btn_text) ?? null,
                'button_url' => strip_tags($request->btn_url) ?? null,
            ];

            if ($request->user_group == 'all_users') {

                $users = $usergroup->select('id')->where('role', '=', 'User')->get();

            } elseif ($request->user_group == 'all_admins') {

                $users = $usergroup->select('id')->where('role', '=', 'Admin')->get();

            } elseif ($request->user_group == 'all_trainers') {

                $users = $usergroup->select('id')->where('role', '=', 'Trainer')->get();

            } else {

                $users = $usergroup->select('id')->get();
            }

            $users = $usergroup->select('id')->get();

            Notification::send($users, new OfferPushNotifications($data));

            \Session::toastr('success', 'Notification pushed successfully !');
            return back();

        } catch (\Exception $e) {

            \Session::toastr('delete', $e->getMessage());
            return back()->withInput();

        }

    }
}
