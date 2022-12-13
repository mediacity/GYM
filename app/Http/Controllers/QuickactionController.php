<?php

namespace App\Http\Controllers;

use App\Quickaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class QuickactionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | QuickactionController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations quickaction.
     */
    /**
     * This function is used to display all quickaction.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $quickactionlist = Quickaction::orderBy('id', 'DESC')->get();
         return view('admin.quickaction.index', compact('quickactionlist'));
    }

    /**
     * Show the form for creating a new quickaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quickaction = quickaction::all();
        return view('admin.quickaction.create', compact('quickaction'));
    }

    /**
     * Store a newly created quickaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|',
            'link' => 'required|string',
            'bgcolor' => 'required|string|',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $quickaction = new Quickaction;
        $quickaction->name = strip_tags($request->name);
        $quickaction->link = strip_tags($request->link);
        $quickaction->bgcolor = strip_tags($request->bgcolor);
        $quickaction->icon = strip_tags($request->icon);
        $quickaction->is_active = $input['is_active'];
        if (!is_dir(public_path() . '/image/icon')) {
            mkdir(public_path() . '/image/icon', 777);
        }
        if ($file = $request->file('icon')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/icon/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 90);
            $quickaction['icon'] = $name;
        }
        $quickaction->save();
        toastr()->success(__('Status has been changed successfully!'));
        return redirect(route('quickaction.index'));
    }
    /**
     * Show the form for editing the specified quickaction.
     *
     * @param  \App\Quickaction  $quickaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quickaction = Quickaction::findOrFail(strip_tags($id));
        return view('admin.quickaction.edit', compact('quickaction'));
    }

    /**
     * Update the specified rquickactionesource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quickaction  $quickaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quickaction = Quickaction::findOrFail(strip_tags($id));
        $request->validate([
        ]);
        if ($file = $request->file('icon')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/icon/';
            $name = time() . $file->getClientOriginalName();
            if ($quickaction->icon != '') {
                $image_file = @file_get_contents(public_path() . '/image/icon/' . $quickaction->icon);
                if ($image_file) {
                    unlink(public_path() . '/image/icon/' . $quickaction->icon);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['image'] = $name;
        }

        $input = $request->all();

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $quickaction->update($input);
        toastr()->success(__('Quickaction has been updated!'));
        return redirect(route('quickaction.index'));
    }

    /**
     * Remove the specified quickaction from storage.
     *
     * @param  \App\Quickaction  $quickaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quickaction = Quickaction::findOrFail(strip_tags($id));
        $quickaction->delete();
        toastr()->success(__('Quickaction has been deleted'));
        return back();
    }
    /**
     * Update the status  of specified quickactionesource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quickaction  $quickaction
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $quickaction = Quickaction::findOrFail($id);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $quickaction->update($input);
        toastr()->info(__('Quickaction status has been changed.'));
        return back()->with('updated', __('Quickaction status has been changed'));
    }

    /**
     * Bulk remove the specified quickaction from storage.
     *
     * @param  \App\Quickaction  $quickaction
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
            $quickaction = Quickaction::find($checked);
            $quickaction->delete();
        }
        toastr()->error(__('Selected Quickaction has been deleted.'));
        return back();
    }
}
