<?php

namespace App\Http\Controllers;

use App\AffilateHistory;
use App\Appointment;
use App\Charts\AdminUserPieChart;
use App\Dietpackage;
use App\Enquiry;
use App\Exercisepackage;
use App\Measurement;
use App\Models\Blog;
use App\Models\Faq;
use App\Payment;
use App\Quotation;
use App\Trainerlist;
use App\User;
use App\Models\Slider;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DashboardController
    |--------------------------------------------------------------------------
    |
    |  This function is used to display dashboard.
     */

    public function index()
    {
        Artisan::call('inspire');
        $quote = Artisan::output();
        $time = date("H");
        date_default_timezone_set("Asia/Bangkok");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $day = "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $day = "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $day = "Good evening";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $day = "Good night";
        }
        $faqs = Faq::count();
        $enquirys = Enquiry::count();
        $payments = Payment::count();
        $blogs = Blog::count();
        $userss = User::count();
        $quotations = Quotation::count();
        $referalusers = AffilateHistory::count();
        $appointments = Appointment::count();
        $userscount = array(
            User::whereMonth('created_at', '01')
                ->whereYear('created_at', date('Y'))
                ->count(), //January

            User::whereMonth('created_at', '02')
                ->whereYear('created_at', date('Y'))
                ->count(), //Feb

            User::whereMonth('created_at', '03')
                ->whereYear('created_at', date('Y'))
                ->count(), //March

            User::whereMonth('created_at', '04')
                ->whereYear('created_at', date('Y'))
                ->count(), //April

            User::whereMonth('created_at', '05')
                ->whereYear('created_at', date('Y'))
                ->count(), //May

            User::whereMonth('created_at', '06')
                ->whereYear('created_at', date('Y'))
                ->count(), //June

            User::whereMonth('created_at', '07')
                ->whereYear('created_at', date('Y'))
                ->count(), //July

            User::whereMonth('created_at', '08')
                ->whereYear('created_at', date('Y'))
                ->count(), //August

            User::whereMonth('created_at', '09')
                ->whereYear('created_at', date('Y'))
                ->count(), //September

            User::whereMonth('created_at', '10')
                ->whereYear('created_at', date('Y'))
                ->count(), //October

            User::whereMonth('created_at', '11')
                ->whereYear('created_at', date('Y'))
                ->count(), //November

            User::whereMonth('created_at', '12')
                ->whereYear('created_at', date('Y'))
                ->count(), //December

        );
        $superadmins = DB::table('model_has_roles')->where('role_id', '=', '1')->count();
        $admins = DB::table('model_has_roles')->where('role_id', '=', '2')->count();
        $users = DB::table('model_has_roles')->where('role_id', '=', '3')->count();
        $trainers = DB::table('model_has_roles')->where('role_id', '=', '7')->count();

        $admincharts = ([$superadmins, $admins, $users, $trainers]);

        $piechart = new AdminUserPieChart;

        $piechart->labels(['Superadmin', 'Admin', 'User', 'Trainer']);

        $piechart->minimalist(true);

        $data = [$superadmins, $admins, $users, $trainers];
        $purchased = array(

            Payment::where('status', 'confirmed')->whereMonth('created_at', '01')
                ->whereYear('created_at', date('Y'))
                ->count(), //January

            Payment::where('status', 'confirmed')->whereMonth('created_at', '02')
                ->whereYear('created_at', date('Y'))
                ->count(), //Feb

            Payment::where('status', 'confirmed')->whereMonth('created_at', '03')
                ->whereYear('created_at', date('Y'))
                ->count(), //March

            Payment::where('status', 'confirmed')->whereMonth('created_at', '04')
                ->whereYear('created_at', date('Y'))
                ->count(), //April

            Payment::where('status', 'confirmed')->whereMonth('created_at', '05')
                ->whereYear('created_at', date('Y'))
                ->count(), //May

            Payment::where('status', 'confirmed')->whereMonth('created_at', '06')
                ->whereYear('created_at', date('Y'))
                ->count(), //June

            Payment::where('status', 'confirmed')->whereMonth('created_at', '07')
                ->whereYear('created_at', date('Y'))
                ->count(), //July

            Payment::where('status', 'confirmed')->whereMonth('created_at', '08')
                ->whereYear('created_at', date('Y'))
                ->count(), //August

            Payment::where('status', 'confirmed')->whereMonth('created_at', '09')
                ->whereYear('created_at', date('Y'))
                ->count(), //September

            Payment::where('status', 'confirmed')->whereMonth('created_at', '10')
                ->whereYear('created_at', date('Y'))
                ->count(), //October

            Payment::where('status', 'confirmed')->whereMonth('created_at', '11')
                ->whereYear('created_at', date('Y'))
                ->count(), //November

            Payment::where('status', 'confirmed')->whereMonth('created_at', '12')
                ->whereYear('created_at', date('Y'))
                ->count(), //December

        );
        $latestorders = Payment::join('users', 'users.id', '=', 'payments.user_id')->select('users.name as name', 'payments.payment_id as payment_id', 'payments.payment_method as payment_method', 'payments.to as to', 'payments.from as from', 'payments.amount as amount', 'payments.created_at as created_at')->orderBy('payment_id', 'DESC')->get();
        $trainer = Auth::user();
        $trainers = Trainerlist::join('users', 'trainerlists.user_id', '=', 'users.id')->select('users.*')->where('trainerlists.trainer_name', '=', $trainer->id)->count();
        $refer = AffilateHistory::select('users.*')->where('affilate_histories.user_id', '=', $trainer->id)->count();
        $packageplan = Payment::select('users.*')->where('payments.user_id', '=', $trainer->id)->count();
        $usercard = array(
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            User::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $blogcard = array(
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Blog::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $purchasecard = array(
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Payment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $faqcard = array(
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Faq::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $quotationcard = array(
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Quotation::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $referalusercard = array(
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            AffilateHistory::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $appointmentcard = array(
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Appointment::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $enquirycard = array(
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(1))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(2))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(3))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(4))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(5))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(6))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(7))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(8))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(9))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(10))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(11))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(12))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(13))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(14))))->count(),
            Enquiry::where('created_at', date('Y-m-d', strtotime(Carbon::now()->subdays(15))))->count(),
        );
        $todayuser = User::orderBy('id', 'DESC')->take(5)->get();
        $todaymeasurements = Measurement::orderBy('id', 'DESC')->take(5)->get();
        $todayexercise = Exercisepackage::orderBy('id', 'DESC')->take(5)->get();
        $paymentlist = Payment::orderBy('id', 'DESC')->take(5)->get();
        $todaydiet = Dietpackage::orderBy('id', 'DESC')->take(5)->get();
        $todayenquiry = Enquiry::orderBy('id', 'DESC')->take(5)->get();
        $todayreferal = AffilateHistory::orderBy('id', 'DESC')->take(5)->get();
        \Session::put('changed_language', 'en');
        $todayappointment = Appointment::orderBy('id', 'DESC')->take(5)->get();
        $userbirthday = User::whereDate('dob', Carbon::today())->take(5)->get();
        $referallist = array(
            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '01')
                ->whereYear('created_at', date('Y'))
                ->count(), //January

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '02')
                ->whereYear('created_at', date('Y'))
                ->count(), //Feb

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '03')
                ->whereYear('created_at', date('Y'))
                ->count(), //March

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '04')
                ->whereYear('created_at', date('Y'))
                ->count(), //April

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '05')
                ->whereYear('created_at', date('Y'))
                ->count(), //May

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '06')
                ->whereYear('created_at', date('Y'))
                ->count(), //June

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '07')
                ->whereYear('created_at', date('Y'))
                ->count(), //July

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '08')
                ->whereYear('created_at', date('Y'))
                ->count(), //August

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '09')
                ->whereYear('created_at', date('Y'))
                ->count(), //September

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '10')
                ->whereYear('created_at', date('Y'))
                ->count(), //October

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '11')
                ->whereYear('created_at', date('Y'))
                ->count(), //November

            AffilateHistory::where('user_id', Auth::User()->id)->whereMonth('created_at', '12')
                ->whereYear('created_at', date('Y'))
                ->count(), //December

        );

        return view('admin.dashboard.index', compact('quote', 'userscount', 'day', 'piechart', 'latestorders', 'faqs', 'payments', 'blogs', 'userss', 'quotations', 'referalusers', 'appointments', 'enquirys', 'trainers', 'refer',
            'packageplan', 'usercard', 'blogcard', 'purchasecard', 'faqcard', 'quotationcard', 'referalusercard', 'appointmentcard', 'enquirycard'
            , 'todayuser', 'todaymeasurements', 'todayexercise', 'todaydiet', 'todayenquiry', 'todayreferal', 'todayappointment', 'userbirthday', 'admincharts', 'purchased', 'paymentlist', 'referallist'));

    }


    public function welcome()
    {
        $data['sliders'] = Slider::where('status',1)->get();
        $data['faq'] = Faq::where('status',1)->latest()->take(4)->get();
        $data['blogs'] = Blog::where('is_active',1)->get();
        return view('welcome',$data);
    }
}
