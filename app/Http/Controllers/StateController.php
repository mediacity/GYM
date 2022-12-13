<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | StateController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations State.
     */
    public function __construct()
    {
        $this->middleware(['permission:location.view']);
    }
    /**
     * This function is used to display all state.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!Auth::user()->can('location.view')) {
            return abort(403, __('User does not have the right permissions.'));
        }
         $state = State::join('countries', 'countries.id', '=', 'states.country_id')
            ->select('countries.nicename as countryname', 'states.id as stateid', 'states.name as statename', 'states.country_id as countryid');
            if ($request->ajax()) {
                return DataTables::of($state)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->statename;
                })
                ->addColumn('countryname', function ($row) {
                    return $row->countryname;
                })
                ->editColumn('action', 'manage.location.state.edit')
                ->rawColumns(['name', 'countryname', 'action'])
                ->make(true);

        }
        $countries = Country::all();
        return view('manage.location.state.index', compact('countries'));
    }

    /**
     * Show the form for creating a new state.
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
     * Store a newly created state in storage.
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
            'name' => 'required|unique:states,name',
            'country_id' => 'required|not_in:0',
         ]);
        $input = $request->all();
        if (isset($input)) {
            try {
                 $state = State::create($input);
            } catch (\Exception $e) {
                toastr()->warning($e->getMessage());
                return back();
            }
        }
        toastr()->success(__('State has been created !'));
        return redirect(route('states.index'));
    }

    /**
     * Show the form for editing the specified state.
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
     * Update the specified state in storage.
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
        $state = State::find($id);
        $request->validate([

            'name' => 'required|unique:states,name,' . $id,
            'country_id' => 'required|not_in:0',

        ]);
        $state->name = strip_tags($request->name);
        $state->country_id =strip_tags( $request->country_id);
         try {
            $state->save();
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage());
            return back();
        }
        toastr()->success(__('State has been updated !'));
        return back();
    }

    /**
     * Remove the specified state from storage.
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
