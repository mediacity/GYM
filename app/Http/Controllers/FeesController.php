<?php

namespace App\Http\Controllers;

use App\Fees;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FeesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations fees.
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all fees.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $feeslist = Fees::orderBy('id', 'DESC')->get();
         return view('admin.fees.index', compact('feeslist'));
    }

    /**
     * Show the form for creating a new fees.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('fees.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.fees.create');
    }

    /**
     * Store a newly created fees in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('fees.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|string|unique:fees',
            'detail' => 'required|string|max:5000',
              'price' => 'required|string|numeric:fees',
        ]);

        if ($request->offerprice) {
            $request->validate([
                'offerprice' => 'required|numeric',
            ]);
        }

        $input = array_filter($request->all());
          if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
         $fees = Fees::create($input);
        if ($request->slug != null) {
            $fees->slug = strip_tags($request->slug);
        } else {
            $fees->slug = str::slug($input['title'], '-');
        }
        $fees->created_at = Carbon::now();
        $fees->updated_at = Carbon::now();
        $fees->save();
        toastr()->success(__('Fees has been saved successfully!'));
        return redirect(route('fees.index'));

    }
    /**
     * Show the form for editing the specified fees.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('fees.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }
        {
            $fees = Fees::findOrFail(strip_tags($id));
            return view('admin.fees.edit', compact('fees'));
        }
    }

    /**
     * Update the specified fees in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('fees.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|string',
            'detail' => 'required|string|max:5000',
            'price' => 'required|string|numeric:fees',
        ]);

        $fees = Fees::findOrFail(strip_tags($id));
        $request->validate([
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $fees->slug = str::slug($input['title'], '-');
        $fees->update($input);
        toastr()->success(__('Fees has been updated!'));
        return redirect(route('fees.index'));
    }

    /**
     * Remove the specified fees from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('fees.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $fees = Fees::findOrFail(strip_tags($id));
        $fees->delete();
        toastr()->success(__('Fees has been deleted'));
        return back();
    }
    /**
     * Update the  status of specified fees in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $fees = Fees::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $fees->update($input);
        toastr()->info(__('Fees status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified fees from storage.
     *
     * @param  int  $id
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
            $fees = Fees::find($checked);
            $fees->delete();
        }
        toastr()->error(__('Selected Fees has been deleted.'));
        return back();
    }
}
