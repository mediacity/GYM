<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Country;
use App\Enquiry;
use App\Enquiryhealth;
use App\Occupation;
use App\Religion;
use App\Secondlanguage;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | EnquiryController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations enquiry.
     */
    public function __construct()
    {
        $this->middleware(['permission:enquiry.view']);
    }
    /**
     * This function is used to display all enquiry.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        $occupations = Occupation::all();
        $enq = Enquiry::query();
        $enquiryhealth = Enquiryhealth::all();
        if ($request->age != null) {
            if ($request->age != "all") {
                if ($request->age == "0-18") {
                    $from = '0';
                    $to = '18';
                    $enquiry = $enq->whereBetween('age', [$from, $to]);
                } elseif ($request->age == "19-25") {
                    $from = '19';
                    $to = '25';
                    $enquiry = $enq->whereBetween('age', [$from, $to]);
                } elseif ($request->age == "25-35") {
                    $from = '25';
                    $to = '35';
                    $enquiry = $enq->whereBetween('age', [$from, $to]);
                } elseif ($request->age == "35-50") {
                    $from = '35';
                    $to = '50';
                    $enquiry = $enq->whereBetween('age', [$from, $to]);
                }
            }

        }
        if ($request->occupation_id != null) {
            $enquiry = $enq->where('occupation_id', strip_tags($request->occupation_id));
        }
        if ($request->status != null) {
            if ($request->status == 'demo') {
                $enquiry = $enq->where('status', 'demo');
            }
        } elseif ($request->status == 'close') {
            $enquiry = $enq->where('status', 'close');
        } elseif ($request->status == 'join') {
            $enquiry = $enq->where('status', 'join');
        } elseif ($request->status == 'pending') {
            $enquiry = $enq->where('status', 'pending');
        }

        if ($request->purpose != null) {
            if ($request->purpose == 'Gym') {
                $enquiry = $enq->where('purpose', 'Gym');
            }
        } elseif ($request->purpose == 'Diet') {
            $enquiry = $enq->where('purpose', 'Diet');
        } elseif ($request->purpose == 'Yoga') {
            $enquiry = $enq->where('purpose', 'Yoga');
        } elseif ($request->purpose == 'Aerobics') {
            $enquiry = $enq->where('purpose', 'Aerobics');
        } elseif ($request->purpose == 'Others') {
            $enquiry = $enq->where('purpose', 'Others');
        }

        $enquiry = $enq->orderBy('id', 'DESC')->get();
        return view('admin.enquiry.index', compact('enquiry', 'enquiryhealth', 'occupations'));
    }

    /**
     * Show the form for creating a new enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('enquiry.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        $costs = Cost::all();
        $religions = Religion::all();
        $occupations = Occupation::all();
        $countries = Country::all();
        $secondlanguages = Secondlanguage::all();
        $enquiryhealth = Enquiryhealth::all();
        $enquiry = Enquiry::all();

        return view('admin.enquiry.create', compact('countries', 'enquiry', 'enquiryhealth', 'costs', 'religions', 'occupations', 'secondlanguages'));
    }

    /**
     * Store a newly created enquiry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('enquiry.add')) {

            return abort(403, 'User does not have the right permissions.');
        }

        $input = array_filter($request->all());
        $enquiry = Enquiry::create($input);
        $enquiry->name = strip_tags($request->name);
        $enquiry->age = strip_tags($request->age);
        $enquiry->cost_id = strip_tags($request->cost_id);
        $enquiry->religion_id = strip_tags($request->religion_id);
        $enquiry->occupation_id = strip_tags($request->occupation_id);
        $enquiry->second_language = strip_tags($request->second_language);
        $enquiry->enid = Enquiry::geneateEnquiryID();
        $enquiry->save();
        session()->flash('created', __('Enquiry has been saved successfully!'));
        return redirect(route('enquiry.index'));
    }

    /**
     * Display the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $enquiry = Enquiry::find(strip_tags($id));
        return view('admin.enquiry.show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified enquiry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('enquiry.edit')) {
            return abort(403, _('User does not have the right permissions.'));
        }

        $costs = Cost::all();
        $religions = Religion::all();
        $occupations = Occupation::all();
        $countries = Country::all();
        $enquiryhealth = Enquiryhealth::all();
        $enquiry = Enquiry::find(strip_tags($id));
        $secondlanguages = Secondlanguage::all();
        return view('admin.enquiry.edit', compact('enquiry', 'countries', 'enquiryhealth', 'costs', 'religions', 'occupations', 'secondlanguages'));
    }

    /**
     * Update the specified enquiry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('enquiry.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $enquiry = Enquiry::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        $enquiry->issue = $request->issue ? $request->issue : ['NO'];
        $params['name'] = $request->name;
        $params['f_name'] = $request->f_name;
        $params['email'] = $request->email;
        $params['mobile'] = $request->mobile;
        $params['phone'] = $request->phone;
        $params['country_id'] = $request->country_id;
        $params['state_id'] = $request->state_id;
        $params['city_id'] = $request->city_id;
        $params['address'] = $request->address;
        $params['pincode'] = $request->pincode;
        $params['age'] = $request->age;
        $params['purpose'] = $request->purpose;
        $params['refrence'] = $request->refrence;
        $params['religion_id'] = $request->religion_id;
        $params['occupation_id'] = $request->occupation_id;
        $params['second_language'] = $request->second_language;
        $params['description'] = $request->description;
        $params['cost_id'] = $request->cost_id;
        $params['status'] = $request->status;
        Enquiry::whereId($id)->update($params);
        session()->flash('updated', __('Your Enquiry has been updatd.'));
        return redirect(route('enquiry.index'));
    }

    /**
     * Remove the specified enquiry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('enquiry.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $enquiry = Enquiry::findOrFail(strip_tags($id));
        $enquiry->delete();
        session()->flash('deleted', __('Enquiry has been deleted.'));
        return back();

    }
    /**
     * Bulk remove the specified enquiry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            session()->flash('warning', __('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $enquiry = Enquiry::find($checked);
            $enquiry->delete();
        }
        session()->flash('deleted', __('Selected Enquiries has been deleted.'));
        return back();
    }
    /**
     * Update the status of specified enquiry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail(strip_tags($id));

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $enquiry->update($input);
        session()->flash('success', __('Enquiry status has been changed!'));
        return back();
    }
    /**
     * This function is used to display all demo.
     *
     * @param $request
     * @return Renderable
     */
    public function demo()
    {
        $enquiry = Enquiry::where('status', 'demo')->get();
        return view('admin.enquiry.demo', compact('enquiry'));

    }
    /**
     * This function is used to display all join.
     *
     * @param $request
     * @return Renderable
     */
    public function join()
    {
        $enquiry = Enquiry::where('status', 'join')->get();
        return view('admin.enquiry.join', compact('enquiry'));

    }
}
