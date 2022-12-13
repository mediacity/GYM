<?php

namespace App\Http\Controllers;

class ConstructionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ConstructionController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations construction.
     */
    /**
     * This function is used to display all construction.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        return view('admin.construction.index');
    }
}
