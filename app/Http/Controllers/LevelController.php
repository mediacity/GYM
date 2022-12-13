<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LevelController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Level.
     */
    /**
     * Display a listing of the Level.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::orderBy('created_at', 'desc')->get();
        return view('admin.level.index', compact('level'));
    }

    /**
     * Show the form for creating a new Level.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created Level in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
        ]);

        $input = array_filter($request->all());
        $level = new Level;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $level = Level::create($input);
        toastr()->success(__('Level has been saved successfully!'));
        return redirect(route('level.index'));
    }

    /**
     * Show the form for editing the specified Level.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail(strip_tags($id));
        return view('admin.level.edit', compact('level'));
    }

    /**
     * Update the specified Level in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = Level::findOrFail(strip_tags($id));
        $request->validate([
            'level' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $level->update($input);
        toastr()->success(__('Level has been updated successfully!'));
        return redirect(route('level.index'));
    }

    /**
     * Remove the specified Level from storage.
     *
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail(strip_tags($id));
        $level->delete();
        return redirect()->route('level.index')
            ->with('success', __('Level deleted successfully'));
    }

    /**
     * Update the status of specified Level in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\level  $level
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $level = Level::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $level->update($input);
        toastr()->info(__('Level status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified Level from storage.
     *
     * @param  \App\level  $level
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
            $level = Level::find($checked);
            $level->delete();
        }
        toastr()->error(__('Selected Level has been deleted.'));
        return back();
    }
}
