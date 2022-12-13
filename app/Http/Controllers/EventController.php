<?php
namespace App\Http\Controllers;

use App\Event;
use App\Notifications\PackageNotification;
use App\Packages;
use App\Payment;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use PaytmWallet;
use Session;

class EventController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | EventController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform payment.
     */
    /** * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */

    public function bookEvent()
    {
        return view('event');
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */

    public function eventOrderGen(Request $request)
    {

        $input = strip_tags($request->except('_token'));
        $input['order_id'] = rand(1111, 9999);
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => str_random(32),
            'user' => Auth::User()->id,
            'mobile_number' => '1234567890',
            'email' => Auth::User()->email,
            'amount' => strip_tags($request->amount),
            'callback_url' => url('payment/status'),
        ]);
        $package = Packages::where('id', $request->id)->first();
        Session::put('package_id', $package->id);
        return $payment->receive();

    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback(Request $request)
    {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        $plan_id = Session::get('package_id');
        $package = Packages::where('id', $plan_id)->first();
        if ($transaction->isSuccessful()) {
            $payment = new Payment;
            $payment->user_id = Auth::user()->id;
            $payment->name = Auth::user()->name;
            $payment->email = Auth::user()->email;
            $payment->mobile = Auth::user()->mobile;
            $payment->payment_id = $response['TXNID'];
            $payment->amount = $response['TXNAMOUNT'];
            $payment->status = 'confirmed';
            $payment->package_id = $package->id;
            $payment->payment_method = 'patym';
            $payment->to = date('d-m-y');
            $package = Packages::where('id', $plan_id)->first();
            if ($package['duration'] == '1 Month') {
                $payment->from = date('d-m-y', strtotime("+30 days"));

            } elseif ($package['duration'] == '2 Month') {
                $payment->from = date('d-m-y', strtotime("+60 days"));

            } elseif ($package['duration'] == '3 Month') {
                $payment->from = date('d-m-y', strtotime("+90 days"));

            } elseif ($package['duration'] == '4 Month') {
                $payment->from = date('d-m-y', strtotime("+120 days"));

            } elseif ($package['duration'] == '5 Month') {
                $payment->from = date('d-m-y', strtotime("+150 days"));

            } elseif ($package['duration'] == '6 Month') {
                $payment->from = date('d-m-y', strtotime("+180 days"));

            } elseif ($package['duration'] == '7 Month') {
                $payment->from = date('d-m-y', strtotime("+210 days"));

            } elseif ($package['duration'] == '8 Month') {
                $payment->from = date('d-m-y', strtotime("+240 days"));

            } elseif ($package['duration'] == '9 Month') {
                $payment->from = date('d-m-y', strtotime("+270 days"));

            } elseif ($package['duration'] == '10 Month') {
                $payment->from = date('d-m-y', strtotime("+300 days"));

            } elseif ($package['duration'] == '11 Month') {
                $payment->from = date('d-m-y', strtotime("+330 days"));

            } elseif ($package['duration'] == '1 Year') {
                $payment->from = date('d-m-y', strtotime("+360 days"));

            } elseif ($package['duration'] == '2 Year') {
                $payment->from = date('d-m-y', strtotime("+720 days"));

            }
			$payment->save();
            $users = User::whereHas(
                'roles', function ($q) {
                    $q->where('name', 'Super Admin');
                }
            )->get();
            $name = [
                'package_id' => $payment['package_id'],
                'name' => Auth::user()->name,
            ];
			Notification::send($users, new PackageNotification($name));
			 toastr()->success(__('Payment has been successfully!'));
            return redirect(route('packages.index'));

        } else if ($transaction->isFailed()) {
            Event::where('order_id', $order_id)->update(['status' => 'failed', 'payment_id' => $response['TXNID']]);
            dd('Payment Failed. Try again lator');
        }
    }
}
