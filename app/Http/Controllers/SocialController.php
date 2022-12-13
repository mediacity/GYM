<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Setting\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SocialController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Social.
     */
    /**
     * This function is used to display all social.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $all_social = Social::all();
        return view('Setting::admin.social', compact('all_social'));
    }

    /**
     * Show the form for creating a new social.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_social = Social::all();
        return view('Setting::admin.social', compact('all_social'));
    }

    /**
     * Store a newly created social in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        if (!isset($input['status'])) {
            $input['status'] = 0;
        }

        $input = $request->all();
        Social::create($input);
        flash(__('Social has been added'))->success();
        return back();
    }
    /**
     * Show the form for editing the specified social.
     *
     * @param  \App\Modules\Setting\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        $all_social = Social::all();
        return view('Setting::admin.social', compact('social', 'all_social'));
    }

    /**
     * Update the specified social in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Setting\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $input = array_filter($request->all());
        $social->update($input);
        flash(__('Social has been updated'))->info();
        return redirect()->route('social.index');
    }

    /**
     * Remove the specified social from storage.
     *
     * @param  \App\Modules\Setting\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        flash(__('Social has been deleted'))->error();
        return back();
    }
    /**
     * Update the status of  specified social in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Setting\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $social = Social::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        $social->update($input);
        flash(__('Social status has been changed'))->info();
        return back()->with('updated', __('Social status has been changed'));
    }
}
