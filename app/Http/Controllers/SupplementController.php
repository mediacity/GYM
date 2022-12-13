<?php

namespace App\Http\Controllers;

use App\Supplement;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class SupplementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SupplementController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Supplment.
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all supplement.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $supplement = Supplement::orderBy('id', 'DESC')->get();
        return view('admin.supplement.index', compact('supplement'));
    }

    /**
     * Show the form for creating a new supplement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('supplement.add')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $supplement = Supplement::all();
        return view('admin.supplement.create', compact('supplement'));
    }

    /**
     * Store a newly created resource in supplement.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('supplement.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'name' => 'required',
            'link' => 'required|regex:#^https?://#',
            'detail' => 'required|string|max:5000',
            'price' => 'required|string|numeric:supplement',
        ]);
        $input['is_active'] = strip_tags($request->is_active);
        if (!isset($input['is_active'])) {
            $input = array_filter($request->all());
        }
        
        if ($file = $request->file('image')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/supplements/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }
        $input['name'] = strip_tags($request->name);
        $input['link'] = strip_tags($request->link);
        $input['detail'] = strip_tags($request->detail);
        $input['price'] = strip_tags($request->price);
        $input['offerprice'] = strip_tags($request->offerprice);
        $supplement = Supplement::create($input);
         $supplement->save();
         toastr()->success(__('Supplement has been added'));
        return redirect(route('supplement.index'));
    }

    /**
     * Show the form for editing the specified supplement.
     *
     * @param  \App\supplement  $supplement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('supplement.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $supplement = Supplement::findOrFail($id);
        return view('admin.supplement.edit', compact('supplement'));
    }

    /**
     * Update the specified supplement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supplement  $supplement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('supplement.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }

        $request->validate([
            'name' => 'required',
            'link' => 'required|regex:#^https?://#',
            'detail' => 'required|string|max:5000',
            'price' => 'required|string|numeric:supplement',

        ]);
        $supplement = Supplement::findOrFail($id);
        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        if ($image = $request->file('image')) {
            $optimizeImage = Image::make($image);
            $optimizePath = public_path() . '/image/blog/';
            $name = time() . $image->getClientOriginalName();
            if ($supplement->image != '') {
                $image_file = @file_get_contents(public_path() . '/image/supplements/' . $supplement->image);
                if ($image_file) {
                    unlink(public_path() . '/image/supplements/' . $supplement->image);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['image'] = $name;
        }
        $supplement->update($input);
        toastr()->success(__('Supplement data has been updated!'));
        return redirect(route('supplement.index'));
    }

    /**
     * Remove the specified supplement from storage.
     *
     * @param  \App\supplement  $supplement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('supplement.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $supplement = Supplement::findOrFail($id);
        if ($supplement->image != null) {
            $image_file = @file_get_contents(public_path() . '/image/supplement/' . $supplement->image);
            if ($image_file) {
                unlink(public_path() . '/image/supplement/' . $supplement->image);
            }
        }
        $supplement->delete();
        toastr()->error(__('Supplement has been deleted'));
        return back();
    }
    /**
     * Change the status of the specific supplement
     *
     * @param  \App\supplement  $supplement
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $supplement = Supplement::findOrFail($id);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
         $supplement->update($input);
        toastr()->info(__('Status has been changed'));
        return back();
    }
    /**
     * Bulk remove the specified supplement from storage.
     *
     * @param  \App\supplement  $supplement
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
            $supplement = Supplement::find($checked);
            $supplement->delete();
        }
        toastr()->error(__('Selected Supplement has been deleted.'));
        return back();
    }
}
