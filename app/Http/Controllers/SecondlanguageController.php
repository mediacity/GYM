<?php

namespace App\Http\Controllers;

use App\Secondlanguage;
use Illuminate\Http\Request;

class SecondlanguageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SecondlanguageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todoboard.
     */

    /**
     * This function is used to display all secondlanguage.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $secondlanguage = Secondlanguage::orderBy('created_at', 'desc')->get();
        return view('admin.secondlanguage.index', compact('secondlanguage'));
    }

    /**
     * Show the form for creating a new secondlanguage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secondlanguage.create');
    }

    /**
     * Store a newly created secondlanguage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = array_filter($request->all());
        $secondlanguage = new Secondlanguage;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $secondlanguage = Secondlanguage::create($input);
        toastr()->success(__('Secondlanguage has been saved successfully!'));
        return redirect(route('secondlanguage.index'));
    }

    /**
     * Show the form for editing the specified secondlanguage.
     *
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secondlanguage = Secondlanguage::findOrFail(strip_tags($id));
        return view('admin.secondlanguage.edit', compact('secondlanguage'));
    }

    /**
     * Update the specified secondlanguage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $secondlanguage = Secondlanguage::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $secondlanguage->update($input);
        toastr()->success(__('Secondlanguage has been updated successfully!'));
        return redirect(route('secondlanguage.index'));
    }

    /**
     * Remove the specified secondlanguage from storage.
     *
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secondlanguage = Secondlanguage::findOrFail(strip_tags($id));
        $secondlanguage->delete();
         return redirect()->route('secondlanguage.index')
            ->with('success', __('Secondlanguage deleted successfully'));
    }
    /**
     * Update the status of specified secondlanguage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $secondlanguage = Secondlanguage::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $secondlanguage->update($input);
        toastr()->info(__('Secondlanguage status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified secondlanguage from storage.
     *
     * @param  \App\religion  $religion
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
            $secondlanguage = Secondlanguage::find(strip_tags('Selected Secondlanguage has been deleted.'));
            $secondlanguage->delete();
        }
        toastr()->error(__('Selected Secondlanguage has been deleted.'));
        return back();
    }
}
