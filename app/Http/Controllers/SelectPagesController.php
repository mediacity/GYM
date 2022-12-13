<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Selectpages;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SelectPagesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SelectPagesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Selectpages.
     */
    public function __construct()
    {
        $this->middleware(['permission:selectpages.view']);
    }
    /**
     * This function is used to display all selectpages.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $selectpagelist = Selectpages::orderBy('created_at', 'desc')->get();
        return view('Pages::selectpage.index', compact('selectpagelist'));
    }
    /**
     * Show the form for creating a new selectpages.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('selectpages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $page = Pages::where('is_active', '1')->pluck('title', 'id')->all();
        return view('Pages::selectpage.create', compact('page'));
    }

    /**
     * Store a newly created resselectpagesource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('selectpages.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|unique:selectpages',
            'page_id' => 'required',

        ]);

        $input = Selectpages::create([
            'title' =>strip_tags( $request->title),
            'page_id' => implode(',', $request->page_id),
            'is_active' =>strip_tags( $request->is_active),
        ]
        );
        flash(__('Page has been added'))->success();
        return back()->with('added', __('Page has been added'));

    }

    /**
     * Show the form for editing the specified selectpages.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('selectpages.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $page = Pages::where('is_active', '1')->pluck('title', 'id')->all();
        $selectpages = Selectpages::findOrFail(strip_tags($id));
        return view('Pages::selectpage.edit', compact('selectpages', 'page'));
    }

    /**
     * Update the specified selectpages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('selectpages.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $selectpages = Selectpages::findOrFail(strip_tags($id));
        $request->validate([

            'title' => 'required|unique:selectpages,id,' . $id,
            'page_id' => 'required',

        ]);
        $input = $selectpages->update([
            'title' => strip_tags($request->title),
            'page_id' => implode(',', $request->page_id),
            'is_active' => strip_tags($request->is_active),
        ]
        );

        flash(__('Page has been added'))->success();
        return redirect('admin/selectpages')->with('added', __('Page has been added'));
    }

    /**
     * Remove the specified selectpages from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('selectpages.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $selectpages = Selectpages::findOrFail(strip_tags($id));
        $selectpages->delete();
        flash(__('Page has been deleted'))->error();
        return back();
    }

    /**
     * Bulk remove the specified selectpages from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('deleted', __('Please select one of them to delete'));
        }

        foreach ($request->checked as $checked) {
            $selectpages = Selectpage::findOrFail(strip_tags($checked));
            $selectpageid = $selectpages->id;
            $this->destroy($selectpageid);
        }

        flash(__('Pages has been deleted'))->error();
        return back()->with('deleted', __('Pages has been deleted'));
    }
    /**
     * Update the status of specified selectpages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {

        $selectpages = Selectpages::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $selectpages->update($input);
        flash(__('Page status has been changed'))->info();
        return back()->with('updated',__( 'Page status has been changed'));
    }
}
