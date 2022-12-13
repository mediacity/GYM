<?php

namespace App\Http\Controllers;

use App\Country;
use App\Invoice;
use App\Quotation;
use App\Subquotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use URL;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subquotation = Subquotation::all();
        $quotation = Quotation::orderBy('created_at', 'desc')->get();
        return view('admin.quotation.index', compact('quotation', 'subquotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.quotation.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $detail = [];
        $input = array_filter($request->all());
         $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $input['customerid'] = Quotation::geneateCustomerID();
        $quotation = Quotation::create($input);
        $subquotation = Subquotation::create([
            'productname' => strip_tags($request->productname),
            'quantity' => strip_tags($request->quantity),
            'price' => strip_tags($request->price),
            'total' => strip_tags($request->total),
            'quotation_id' => strip_tags($quotation->id),

        ]);
        $subquotation->save();
        $quotation->save();
        toastr()->success(__('Quotation has been saved successfully!'));
        return redirect(route('quotation.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::find(strip_tags($id));
        $subquotation = Subquotation::where('quotation_id',strip_tags($id))->get();
        $invoice = Invoice::find(strip_tags($id));
        $url = URL::to('/');
        return view('admin.quotation.show', compact('quotation', 'invoice', 'subquotation', 'url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $quotation = Quotation::findOrFail(strip_tags($id));
        return view('admin.quotation.edit', compact('countries', 'quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quotation = Quotation::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
         if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $quotation->update($input);
        toastr()->success(__('Quotation has been updated successfully!'));
        return redirect(route('quotation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation = Quotation::findOrFail(strip_tags($id));
        $quotation->delete();
        return redirect()->route('quotation.index')
            ->with('success', __('Quotation deleted successfully'));
    }
    public function status_update(Request $request, $id)
    {
        $quotation = Quotation::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $quotation->update($input);
        toastr()->info(__('Quotation status has been changed.'));
        return back();
    }

    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), ['checked' => 'required']);
        if ($validator->fails()) {
            toastr()->error(__('Please select field to deleted.'));
            return back();
        }
        foreach ($request->checked as $checked) {
            $quotation = Quotation::find($checked);
            $quotation->delete();
        }
        toastr()->error(__('Selected Quotation has been deleted.'));
        return back();
    }
    public function downloadPDF($id)
    {
        $quotation = Quotation::find(strip_tags($id));
        $invoice = Invoice::find(strip_tags($id));
        $subquotation = Subquotation::where('quotation_id',strip_tags($id))->get();
        $url = URL::to('/');
        $pdf = PDF::loadView('admin.quotation.pdf', [
            'quotation' => $quotation,
            'invoice' => $invoice,
            'subquotation' => $subquotation,
            'url' => $url,
             ])->setPaper('a4', 'landscape');
        return $pdf->setPaper('a4', 'landscape')
            ->download('quotation.pdf');

    }
}
