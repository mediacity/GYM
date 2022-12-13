<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Enquiryhealth;
use App\Occupation;
use App\Ptsubscription;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PtsubscriptionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PtsubscriptionController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Ptsubscription.
     */
    public function __construct()
    {
        $this->middleware(['permission:pt.view']);
    }
    /**
     * This function is used to display all Ptsubscription.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $ptsubscription = Ptsubscription::orderBy('created_at', 'desc')->get();
        return view('admin.ptsubscription.index', compact('ptsubscription'));
    }

    /**
     * Show the form for creating a new Ptsubscription.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('pt.add')) {
            return abort(403,__( 'User does not have the right permissions.'));

        }
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            }
        )->get();
        $occupations = Occupation::all();
        $enquiryhealth = Enquiryhealth::all();
        $enquiry = Enquiry::all();
        return view('admin.ptsubscription.create', compact('users', 'occupations', 'enquiryhealth', 'enquiry'));
    }

    /**
     * Store a newly created Ptsubscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('pt.add')) {
            return abort(403, 'User does not have the right permissions.');

        }
        $input = array_filter($request->all());
        $ptsubscription = Ptsubscription::create($input);
        $ptsubscription->occupation_id = strip_tags($request->occupation_id);
        $ptsubscription->save();
        toastr()->success(__('Ptsubscription has been saved successfully!'));
        return redirect(route('ptsubscription.index'));
    }

    /**
     * Show the form for editing the specified Ptsubscription.
     *
     * @param  \App\Ptsubscription  $ptsubscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('pt.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }
        $users = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'User');
            }
        )->get();
        $occupations = Occupation::all();
        $enquiryhealth = Enquiryhealth::all();
        $enquiry = Enquiry::all();
        $ptsubscription = Ptsubscription::findOrFail(strip_tags($id));
        return view('admin.ptsubscription.edit', compact('users', 'occupations', 'enquiryhealth', 'enquiry', 'ptsubscription'));
    }

    /**
     * Update the specified Ptsubscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ptsubscription  $ptsubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('pt.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $ptsubscription = Ptsubscription::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        $input['userid'] = strip_tags($request->user_id);
        $ptsubscription->update($input);
        toastr()->success(__('PT Subscription has been updated!'));
        return redirect(route('ptsubscription.index'));
    }

    /**
     * Remove the specified Ptsubscription from storage.
     *
     * @param  \App\Ptsubscription  $ptsubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('pt.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $ptsubscription = Ptsubscription::findOrFail(strip_tags($id));
        $ptsubscription->delete();
        toastr()->success(__('PT Subscription is deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified Ptsubscription from storage.
     *
     * @param  \App\Ptsubscription  $ptsubscription
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $ptsubscription = Ptsubscription::find(strip_tags($checked));
            $ptsubscription->delete();
        }
        toastr()->error(__('Selected Ptsubscription has been deleted.'));
        return back();
    }

}
