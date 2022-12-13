<?php

namespace App\Http\Controllers;

use App\ManualPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class ManualPaymentGatewayController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ManualPaymentGatewayController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Manualpayment.
     */
    /**
     * This function is used to display all Manualpayment.
     *
     * @param $request
     * @return Renderable
     */
    public function getindex()
    {
        $methods = ManualPaymentMethod::orderBy('id', 'DESC')->get();
        return view('admin.manualpayment.index', compact('methods'));
    }
    /**
     * Store a newly created Manualpayment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'payment_name' => 'required',
            'description' => 'required|max:5000',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }

        if ($file = $request->file('thumbnail')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/payment/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['thumbnail'] = $name;
        }
         ManualPaymentMethod::create($input);
        toastr()->success(__('Payment method added !'), $request->payment_name);
        return back();

    }
/**
 * Update the specified Manualpayment in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Manualpayment $manualpayment
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {

        $request->validate([
            'payment_name' => 'required',
            'description' => 'required|max:5000',
        ]);

        $method = ManualPaymentMethod::find(strip_tags($id));

        if (!$method) {
            notify()->error(__('Payment method not found !'), 404);
            return back();
        }
        $input = $request->all();

        if (!isset($input['status'])) {
            $input['status'] = 0;
        }

        if ($file = $request->file('thumbnail')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/payment/';
            $name = time() . $file->getClientOriginalName();
            if ($method->thumbnail != '') {
                $image_file = @file_get_contents(public_path() . '/image/payment/' . $method->thumbnail);
                if ($image_file) {
                    unlink(public_path() . '/image/payment/' . $method->thumbnail);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['thumbnail'] = $name;
        }
        $method->update($input);

        toastr()->success(__('Your Payment Method is updated !'));
        return back();

    }
/**
 * Update the status of specified manual payment in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Manualpauyment  $manualpayment
 * @return \Illuminate\Http\Response
 */
    public function status_update(Request $request, $id)
    {
        $method = ManualPaymentMethod::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $method->update($input);
        toastr()->info(__('Payment status changes successfully!'));
        return back()->with('updated', _('Payment status has been Updated'));
    }
    /**
     * Remove the specified manualpayment from storage.
     *
     * @param  \App\Manualpayment  $manualpayment
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $method = ManualPaymentMethod::find(strip_tags($id));

        if (!$method) {
            notify()->error(__('Payment method not found !'), 404);
            return back();
        }

        if ($method->thumbnail != '' && file_exists(public_path() . '/image/payment/' . $method->thumbnail)) {
            unlink(public_path() . '/image/payment/' . $method->thumbnail);
        }
        toastr()->error(__("Payment method deleted"));
        $method->delete();
        return back();
    }
    /**
     * Bulk remove the specified manualpayment from storage.
     *
     * @param  \App\Modules\Todo\Models\TodoBoard  $manualpayment
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
            $manualPaymentMethod = ManualPaymentMethod::find($checked);
            $manualPaymentMethod->delete();
        }
        toastr()->error(__('Selected ManualPayment has been deleted.'));
        return back();
    }
}
