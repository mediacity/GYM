<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Image;

class InvoiceController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | InvoiceController
    |--------------------------------------------------------------------------
    |
    | This controller is used to download the invoice.
     */
    /**
     * This function is used to display all invoice.
     *
     * @param $request
     * @return Renderable
     */
    public function get()
    {
        $invoice = Invoice::first();
        return view('admin.invoice.invoice', compact('invoice'));
    }
    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveSettings(Request $request)
    {
        try {

            $invoice = Invoice::first();
            $input = array_filter($request->all());

            if ($invoice) {

                if ($file = $request->file('signature')) {

                    $optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path() . '/image/signature/';
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);

                    $input['signature'] = $image;

                }
                $invoice->update($input);

            } else {

                $invoice = new Invoice;

                if ($file = $request->file('signature')) {

                    $optimizeImage = Image::make($file)->encode('jpg', 90);
                    $optimizePath = public_path('/image/signature/');
                    $image = time() . $file->getClientOriginalName();
                    $optimizeImage->save($optimizePath . $image, 72);

                    $input['signature'] = $image;

                }

                $input['signature'];

                $invoice->create($input);
            }

            return back()->with('success', __('Invoice Settings Saved !'));

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
