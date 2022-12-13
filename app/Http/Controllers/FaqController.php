<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | FaqController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations faq.
     */
    public function __construct()
    {
        $this->middleware(['permission:faq.view']);
    }
    /**
     * This function is used to display all faq.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $faqlist = faq::orderBy('created_at', 'desc')->get();
        return view('admin.faq.index', compact('faqlist'));

    }

    /**
     * Show the form for creating a new faq.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('faq.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.faq.create');
    }

    /**
     * Store a newly created faq in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('faq.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required',
             'details' => 'required|max:5000',

        ]);
        $input = array_filter($request->all());
         $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $faq = Faq::create($input);
         toastr()->success(__('Faq has been saved successfully!'));
        return redirect(route('faq.index'));
    }

    /**
     * Show the form for editing the specified faq.
     *
     * @param  \App\modules\Faq\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        if (!Auth::user()->can('faq.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }
        {
            $faq = Faq::findOrFail(strip_tags($id));
            return view('admin.faq.edit', compact('faq'));
        }
    }

    /**
     * Update the specified faq in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('faq.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $faq = Faq::findOrFail(strip_tags($id));
        $request->validate([
            'title' => 'required',
            'details' => 'required|max:5000',

        ]);
        $input = array_filter($request->all());
         if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $faq->update($input);
        toastr()->success(__('Faq has been updated successfully!'));
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified faq from storage.
     *
     * @@param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('faq.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $faq = Faq::findOrFail(strip_tags($id));
        $faq->delete();
        return redirect()->route('faq.index')->with('success', __('Faq deleted successfully'));
    }
/**
 * Update the status of  specified faq in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Faq  $faq
 * @return \Illuminate\Http\Response
 */
    public function status_update(Request $request, $id)
    {
        $faq = Faq::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
         if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $faq->update($input);
        toastr()->info(__('Faq status has been changed successfully!'));
        return back()->with('updated', __('Faq status has been changed'));
    }
    /**
     * Bulk remove the specified faq from storage.
     *
     * @@param  \App\Models\Faq  $faq
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
            $faq = Faq::find($checked);
            $faq->delete();
        }
        toastr()->error(__('Selected Faq has been deleted.'));
        return back();
    }
}
