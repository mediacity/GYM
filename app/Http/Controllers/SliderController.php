<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class SliderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SliderController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Slider.
     */

    /**
     * This function is used to display all slider.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!$request->search) {

            $slider = slider::paginate(2);
        } else {

            $slider = Slider::where('heading', 'LIKE', '%' . $request->search . '%')->paginate(1);
         }
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new slider.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created slider in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'image' => 'required',
            'heading' => 'required',

        ]);
  
        $input = array_filter($request->all());
      if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        if ($file = $request->file('image')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/slider/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['image'] = $name;
        }
        Slider::create($input);
        toastr()->success(__('Slider has been added'));
        return redirect(route('slider.index'));

    }

    /**
     * Show the form for editing the specified slider.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail(strip_tags($id));
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail(strip_tags($id));
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        if ($file = $request->file('image')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/slider/';
            $name = time() . $file->getClientOriginalName();
            if ($slider->image != '') {
                $image_file = @file_get_contents(public_path() . '/image/slider/' . $slider->image);
                if ($image_file) {
                    unlink(public_path() . '/image/slider/' . $slider->image);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['image'] = $name;
        }
        $slider->update($input);
        toastr()->info(__('Slider has been updated'));
        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified slider from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail(strip_tags($id));
        if ($slider->image != null) {
            $image_file = @file_get_contents(public_path() . '/image/slider/' . $slider->image);
            if ($image_file) {
                unlink(public_path() . '/image/slider/' . $slider->image);
            }
        }
        $slider->delete();
        toastr()->error(__('Slider has been deleted'));
        return back();
    }
    /**
     * Bulk remove the specified slider from storage.
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
            $slider = Slider::find(strip_tags($checked));
            $slider->delete();
        }
        toastr()->error(__('Selected Slider has been deleted.'));
        return back();
    }
    /**
     * Update the status ofspecified slider in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $slider = Slider::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
         $slider->update($input);
        toastr()->info(__('Slider status has been changed'));
        return back()->with('updated', __('Slider status has been changed'));
    }
}
