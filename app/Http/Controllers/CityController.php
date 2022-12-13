<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CityController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations city.
     */
    /**
     * This function is used to display all city.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!Auth::user()->can('location.view')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $countries = City::join('states', 'cities.state_id', '=', 'states.id')
            ->join('countries', 'states.country_id', '=', 'countries.id')
            ->select('cities.state_id as state_id', 'countries.nicename as countryname', 'states.id as stateid', 'states.name as statename', 'cities.name as cityname', 'cities.id as cid');

        if ($request->ajax()) {

            return DataTables::of($countries)

                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->cityname;
                })
                ->addColumn('statename', function ($row) {
                    return $row->statename;
                })
                ->addColumn('countryname', function ($row) {
                    return $row->countryname;
                })
                ->editColumn('action', 'manage.location.cities.action')
                ->rawColumns(['name', 'statename', 'countryname', 'action'])
                ->make(true);

        }
        $states = State::all();

        return view('manage.location.cities.index', compact('states'));
    }

    /**
     * Show the form for creating a new city.
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
     * Store a newly created city in storage.
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

            'name' => 'required|unique:cities,name',
            'state_id' => 'required|not_in:0',

        ]);

        $input = array_filter($request->all());
        if (isset($input)) {
            try {
                $city = City::create($input);
            } catch (\Exception $e) {
                toastr()->warning($e->getMessage());
                return back();
            }
        }
        toastr()->success(__('City has been created !'));
        return redirect(route('cities.index'));
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('location.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $cities = City::find(strip_tags($id));
        $states = State::all();
        return view('manage.location.cities.edit', compact('cities', 'states', 'id'));

    }

    /**
     * Update the specified city in storage.
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

        $city = City::find(strip_tags($id));
        $request->validate([

            'name' => 'required|unique:cities,name,' . $id,
            'state_id' => 'required|not_in:0',

        ]);
        $city->name = strip_tags($request->name);
        $city->state_id = strip_tags($request->state_id);

        try {
            $city->save();
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage());
            return back();
        }

        toastr()->success(__('City has been updated !'));

        return back();
    }

    /**
     * Remove the specified city from storage.
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

    public function chooseState(Request $request)
    {
        if ($request->ajax()) {
            $states = State::where('country_id', '=', $request->countryid)->select('id', 'name')->get();
            return response()->json($states);
        }
    }

    public function chooseCity(Request $request)
    {
        if ($request->ajax()) {
            $cities = City::where('state_id', '=', $request->stateid)->select('id', 'name')->get();
            return response()->json($cities);
        }
    }
}
