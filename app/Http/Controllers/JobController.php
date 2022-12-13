<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeMail;

class JobController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | JobController
    |--------------------------------------------------------------------------
    |
    | This controller is used todispatch mail by job.
     */
    public function processQueue()
    {
        dispatch(new SendWelcomeMail('Sender Code Briefly'));
        echo 'Mail Sent';
    }
}
