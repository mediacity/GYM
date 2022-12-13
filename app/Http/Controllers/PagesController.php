<?php
namespace App\Http\Controllers;

use App\Models\Pages;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PagesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Pages.
     */

    public function __construct()
    {
        $this->middleware(['permission:pages.view']);
    }
    /**
     * This function is used to display all pages.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $pagelist = Pages::orderBy('created_at', 'desc')->get();
        return view('admin.pages.index', compact('pagelist'));
    }
    /**
     * This function is used to create all pages.
     *
     * @param $request
     * @return Renderable
     */
    public function create()
    {

        if (!Auth::user()->can('pages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.pages.create');
    }

    /**
     * Store a newly created pages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('pages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|string|unique:pages',
            'detail' => 'required|string',
            'aboutus' => 'required|string',

        ]);
        $input = array_filter($request->all());
          $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $pages = Pages::create($input);
        toastr()->success(__('Page has been added.'));
        return redirect(route('pages.index'));

    }

    /**
     * Show the form for editing the specified pages.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('pages.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $pages = Pages::findOrFail(strip_tags($id));
        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * Update the specified pages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('pages.edit')) {
            return abort(403, 'User does not have the right permissions.');
        }
        $pages = Pages::findOrFail(strip_tags($id));
        $request->validate([
             'title' => 'required|string',
            'detail' => 'required|string|max:5000',

        ]);
        $input = array_filter($request->all());
         if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $pages->update($input);
        toastr()->success(__('Page has been updated!'));
        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified pages from storage.
     *
     * @param  \App\Models\Pages $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('pages.delete')) {
            return abort(403, __( 'User does not have the right permissions.'));
        }
        $pages = Pages::findOrFail(strip_tags($id));
        $pages->delete();
        toastr()->success(__('Page has been deleted.'));
        return back();
    }

    /**
     * Update the status of specified pages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $users
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $pages = Pages::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $pages->update($input);
        toastr()->info(__('Page status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified pages from storage.
     *
     * @param  \App\Models\Pages $users
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
            $pages = Pages::find(strip_tags($checked));
            $pages->delete();
        }
        toastr()->error(__('Selected Pages has been deleted.'));
        return back();
    }
}
