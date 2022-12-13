<?php

namespace App\Http\Controllers;

use App\Packages;
use App\Payment;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackagesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PackagesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todoboard.
     */

    public function __construct()
    {
        $this->middleware(['permission:packages.view']);
    }
    /**
     * This function is used to display all packages.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $package = Packages::orderBy('id', 'DESC')->get();
        $payment = Payment::where('user_id', Auth::user()->id)->where('status', 'confirmed')->orderBy('id', 'DESC')->first();
        $now = date('d-m-Y');
        $endplan = Payment::where('from', $now)->first();

        return view('admin.packages.index', compact('package', 'payment', 'endplan'));
    }

    /**
     * Show the form for creating a new packages.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('packages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.packages.create');
    }

    /**
     * Store a newly created packages in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('packages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|string|unique:packages',
            'detail' => 'required|string|max:5000',
            'duration' => 'required|string',
            'price' => 'required|string|numeric:packages',

        ]);
        $input = array_filter($request->all());

        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $packages = Packages::create($input);

        $packages->created_at = Carbon::now();
        $packages->updated_at = Carbon::now();

        $packages->save();
        toastr()->success(__('Package has been added!'));
        return redirect(route('packages.index'));

    }

    /**
     * Show the form for editing the specified packages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('packages.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        {
            $packages = Packages::findOrFail(strip_tags($id));
            return view('admin.packages.edit', compact('packages'));
        }

    }

    /**
     * Update the specified packages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('packages.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $packages = Packages::findOrFail(strip_tags($id));
        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $packages->update($input);
        toastr()->success(strip_tags('Package has been updated!'));
        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified packages from storage.
     *
     * @param  \App\Models\Packages $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('packages.delete')) {
            return abort(403, strip_tags('User does not have the right permissions.'));
        }

        $packages = Packages::findOrFail(strip_tags($id));
        $packages->delete();
        toastr()->success(strip_tags('Package is deleted.'));
        return back();
    }
    /**
     * Update the status of specified packages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $packages = Packages::findOrFail(strip_tags($id));

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $packages->update($input);
        toastr()->info(__('Packages status has been changed.'));
        return back()->with('updated', __('Package status has been changed'));
    }
    /**
     * Bulk remove the specified packages from storage.
     *
     * @param  \App\Models\Packages $users
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
            $packages = Packages::find($checked);
            $packages->delete();
        }
        toastr()->error(__('Selected Package has been deleted.'));
        return back();
    }
}
