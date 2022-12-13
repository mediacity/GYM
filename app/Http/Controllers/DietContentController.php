<?php

namespace App\Http\Controllers;

use App\Dietcontent;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietContentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DietContentController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Dietcontent.
     */
    public function __construct()
    {
        $this->middleware(['permission:diet_content.view']);
    }
    /**
     * This function is used to display all Dietcontent.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $dietcontent = dietcontent::orderBy('created_at', 'desc')->get();
        return view('admin.diet.dietcontent.index', compact('dietcontent'));
    }

    /**
     * Show the form for creating a new Dietcontent.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('diet_content.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $dietcontent = Dietcontent::all();
        return view('admin.diet.dietcontent.create', compact('dietcontent'));
    }

    /**
     * Store a newly created Dietcontent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('diet_content.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $this->validate($request, [
            'content' => 'required',
            'quantity' => 'required',
            'calories' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $dietcontent = new Dietcontent;
        $dietcontent->content = strip_tags($request->content);
        $dietcontent->quantity = strip_tags($request->quantity);
        $dietcontent->calories = strip_tags($request->calories);
        $dietcontent->is_active = $input['is_active'];
        $dietcontent->save();
        toastr()->success(__('Diet Content has been added.'));
        return redirect(route('dietcontent.index'));
    }

    /**
     * Show the form for editing the specified Dietcontent.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('diet_content.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $dietcontent = Dietcontent::find(strip_tags($id));
        return view('admin.diet.dietcontent.edit', compact('dietcontent'));
    }

    /**
     * Update the specified Dietcontent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('diet_content.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $this->validate($request, [
            'content' => 'required',
            'quantity' => 'required',
            'calories' => 'required',
        ]);

        $dietcontent = dietcontent::findOrFail(strip_tags($id));

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $dietcontent->update($input);
        toastr()->success(__('Diet Content has been updatd.'));
        return redirect(route('dietcontent.index'));
    }
    /**
     * Update the status of  specified Dietcontent in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $dietcontent = Dietcontent::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $dietcontent->update($input);
        toastr()->info(__('Data status has been changed  successfully!'));
        return back()->with('updated', __('Diet status has been changed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('diet_content.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $dietcontent = dietcontent::findOrFail(strip_tags($id));
        $dietcontent->delete();
        toastr()->error(__('Diet Content data has been deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified resource from storage.
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
            $dietcontent = Dietcontent::find($checked);
            $dietcontent->delete();
        }
        toastr()->error(__('Selected Dietcontent has been deleted.'));
        return back();
    }
}
