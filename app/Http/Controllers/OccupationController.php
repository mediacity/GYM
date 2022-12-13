<?php

namespace App\Http\Controllers;

use App\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | OccupationController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations occupation.
     */
    /**
     * This function is used to display all occupation.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $occupation = Occupation::orderBy('created_at', 'desc')->get();
        return view('admin.occupation.index', compact('occupation'));
    }

    /**
     * Show the form for creating a new occupation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.occupation.create');
    }

    /**
     * Store a newly created occupation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'occupation' => 'required',
        ]);

        $input = array_filter($request->all());
        $occupation = new Occupation;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $occupation = Occupation::create($input);

        toastr()->success(__('Occupation has been saved successfully!'));

        return redirect(route('occupation.index'));
    }

    /**
     * Show the form for editing the specified occupation.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupation = Occupation::findOrFail(strip_tags($id));
        return view('admin.occupation.edit', compact('occupation'));
    }

    /**
     * Update the specified occupation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $occupation = Occupation::findOrFail(strip_tags($id));

        $request->validate([
            'occupation' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $occupation->update($input);
        toastr()->success(__('Occupation has been updated successfully!'));
        return redirect(route('occupation.index'));
    }

    /**
     * Remove the specified occupation from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occupation = Occupation::findOrFail(strip_tags($id));
        $occupation->delete();
         return redirect()->route('occupation.index')
            ->with('success',strip_tags( 'Occupation deleted successfully'));
    }
    /**
     * Update the status of specified occupation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $occupation = Occupation::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $occupation->update($input);
        toastr()->info(strip_tags('Occupation status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified occupation from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error('Please select field to deleted.');
            return back();
        }
        foreach ($request->checked as $checked) {
            $occupation = Occupation::find($checked);
            $occupation->delete();
        }
        toastr()->error(strip_tags('Selected Occupation has been deleted.'));
        return back();
    }
}
