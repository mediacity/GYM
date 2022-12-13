<?php

namespace App\Http\Controllers\razorpay;

use App\Http\Controllers\Controller;
use App\Notifications\PackageNotification;
use App\Packages;
use App\Payment;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Redirect;

class PaymentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PaymentController
    |--------------------------------------------------------------------------
    |
    | This controller is used to payment.
     */
    /**
     * This function is used to display all products.
     *
     * @param $request
     * @return Renderable
     */
    public function show_products()
    {
        return view('razorpay.payment');
    }
    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay_success(Request $request)
    {
        $payment = new Payment;
        $payment->user_id = Auth::user()->id;
        $payment->name = Auth::user()->name;
        $payment->email = Auth::user()->email;
        $payment->mobile = Auth::user()->mobile;
        $payment->payment_id = strip_tags($request->razorpay_payment_id);
        $payment->amount = strip_tags($request->totalAmount);
        $payment->package_id = strip_tags($request->product_id);
        $payment->payment_method = 'razorpay';
        $payment->status = 'confirmed';
        $payment->to = date('d-m-y');
        $package = Packages::where('id', strip_tags($request->product_id))->first();
        if (isset($package['duration'])) {

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
        }
        $payment->save();
        $users = User::role('Super Admin')->first();
        $name = Auth::user()->name;
        Notification::send($users, new PackageNotification($name));
        toastr()->success(__('Payment has been successfully!'));
        return redirect(route('packages.index'));

    }
    /**
     * This function is used to show all products.
     *
     * @param $request
     * @return Renderable
     */
    public function show(Request $request)
    {

        $user = Auth::user();
        if ($user->hasRole('Super Admin')) {
            $data = Payment::get();
        } elseif ($user->hasRole('User')) {
            $data = Payment::where('user_id', Auth::User()->id)->get();
        }
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->make(true);
        }
        $payment = Payment::all();
        return view('razorpay.show', compact('payment'));
    }
}
