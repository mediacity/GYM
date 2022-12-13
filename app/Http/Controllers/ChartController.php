<?php

namespace App\Http\Controllers;

use App\Charts\UserLineChart;

class ChartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ChartController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform display chart.
     */
    public function index()
    {
        $Chart = new UserLineChart;
        $Chart->labels(['Jan', 'Feb', 'Mar']);
        $Chart->dataset('Users by trimester', 'line', [10, 25, 13])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");
        return view('admin.dashboard.index ', ['Chart' => $Chart]);

    }
}
