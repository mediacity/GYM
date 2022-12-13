<?php

namespace App\Http\Controllers;

use App\Country;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CountryController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations country.
     */

    public function __construct()
    {
        $this->middleware(['permission:location.view']);
    }
    /**
     * This function is used to display all country.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!Auth::user()->can('location.view')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $countries = Country::select('nicename as name', 'id', 'iso', 'iso3', 'numcode', 'phonecode');

        if ($request->ajax()) {

            return DataTables::of($countries)

                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('action', 'manage.location.country.edit')
                ->rawColumns(['name', 'action'])
                ->make(true);

        }

        return view('manage.location.country.index');
    }

    /**
     * Show the form for creating a new country.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('location.create')) {
            return abort(403, __('User does not have the right permissions.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('location.create')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $request->validate([
            'iso' => 'required|max:2|unique:countries,iso',
            'name' => 'required|unique:countries,name',
            'iso3' => 'required|max:3|unique:countries,iso3',
            'phonecode' => 'required|unique:countries,phonecode',
        ],
            [
                'iso.required' => 'Country ISO is required !',
                'iso.unique' => 'Country ISO already taken !',
                'name.required' => 'Country name is required !',
                'name.unique' => 'Country name already taken !',
                'iso3.required' => 'Country ISO3 is required !',
                'iso3.unique' => 'Country ISO3 already taken !',

            ]);

        $input = array_filter($request->all());
        if (isset($input)) {
            try {
                $input['name'] = strtolower(strip_tags($request->name));
                $input['nicename'] = strtoupper(strip_tags($request->name));
                $country = Country::create($input);
            } catch (\Exception $e) {
                toastr()->warning($e->getMessage());
                return back();
            }
        }

        toastr()->success(__('Country has been created !'));
        return redirect(route('countries.index'));

    }

    /**
     * Show the form for editing the specified country.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('location.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('location.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $countries = Country::find(strip_tags($id));

        $request->validate([
            'iso' => 'required|max:2|unique:countries,iso,' . $id,
            'name' => 'required|unique:countries,name,' . $id,
            'iso3' => 'required|max:3|unique:countries,iso3,' . $id,
            'phonecode' => 'required|unique:countries,phonecode,' . $id,
        ],
            [
                'iso.required' => 'Country ISO is required !',
                'iso.unique' => 'Country ISO already taken !',
                'name.required' => 'Country name is required !',
                'name.unique' => 'Country name already taken !',
                'iso3.required' => 'Country ISO3 is required !',
                'iso3.unique' => 'Country ISO3 already taken !',

            ]);

        $countries->name = strtolower(strip_tags($request->name));
        $countries->iso = strip_tags($request->iso);
        $countries->iso3 = strip_tags($request->iso3);
        $countries->nicename = strtoupper(strip_tags($request->name));
        $countries->numcode = strip_tags($request->numcode);
        $countries->phonecode = strip_tags($request->phonecode);

        try {
            $countries->save();
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage());
            return back();
        }

        toastr()->success(__('Country has been updated !'));

        return back();

    }

    /**
     * Remove the specified country from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('location.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
    }
}
