<?php

namespace App\Http\Controllers;

use App\Day;
use App\Diet;
use App\Dietcontent;
use App\DietHasContent;
use App\Dietid;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class DietController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DietController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Diet.
     */
    public function __construct()
    {
        $this->middleware(['permission:diet.view']);
    }
    /**
     * This function is used to display all Diet.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $day = Day::all();
        $session_id = Dietid::all();
        $dietcontant = Dietcontent::all();
        $diethascontent = DietHascontent::all();
        $diet = Diet::get();
        return view('admin.diet.index', compact('diet', 'dietcontant', 'day', 'session_id', 'diethascontent'));

    }

    /**
     * Show the form for creating a new Diet.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (!Auth::user()->can('diet.add')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $input = array_filter($request->all());
        $diet = Diet::get();
        $days = Day::all();
        $dietid = Dietid::all();
        return view('admin.diet.create', compact('dietid', 'days', 'diet'));
    }

    /**
     * Store a newly created resoDieturce in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('diet.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $this->validate($request, [

            'dietname' => 'required',
            'description' => 'required',

            'day_id' => 'required|not_in:0',
            'session_id' => 'required',

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        if ($file = $request->file('image')) {

            $validator = Validator::make(
                [
                    'file' => $request->image,
                    'extension' => strtolower($request->image->getClientOriginalExtension()),
                ],
                [
                    'file' => 'required',
                    'extension' => 'required|in:jpg,jpeg,png',
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors(__('Invalid file !'));
            }
            if ($file = $request->file('image')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('image/diet', $name);
                $input['image'] = $name;
            }
        }
        $diet = new Diet;
        $diet->dietname = strip_tags($request->dietname);
        $diet->description = strip_tags($request->description);
        $diet->followup_date = strip_tags($request->followup_date);
        $diet['day'] = strip_tags($request->day_id);
        $diet['session_id'] = strip_tags($request->session_id);
        $diet->is_active = $input['is_active'];
        $diet->save();
        $array = array();
        if ($request->content != [null] && $request->dcalories != [null] && $request->quantity != [null]) {

            foreach ($request->content as $key => $content) {

                if ($request->dietcontentid[$key] == '') {
                    $dietcontent = Dietcontent::updateOrCreate([
                        'content' => $request->content[$key],
                        'quantity' => 1,
                        'calories' => $request->single_kal[$key],
                    ]);

                }

            }

        }

        if ($request->content != [null] && $request->dcalories != [null] && $request->quantity != [null]) {

            foreach ($request->content as $key => $content) {

                if ($request->dietcontentid[$key] == '') {

                    $diethascontent = DietHascontent::updateOrCreate([
                        'content' => $request->content[$key],
                        'quantity' => $request->quantity[$key],
                        'calories' => $request->dcalories[$key],
                        'diet_id' => $diet->id,
                    ]);

                }
            }

        }

        toastr()->success(__('Diet has been added.'));
        return redirect(route('diet.index'));

    }

    public function fetch(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('term');
            $data = DB::table('dietcontents')->where('content', 'LIKE', '%' . $query . '%')->where('is_active', '=', 1)->get();
            $result = [];

            foreach ($data as $key => $value) {
                $result[] = ['id' => $value->id, 'value' => $value->content, 'quantity' => $value->quantity, 'calories' => $value->calories];
            }

            return response()->json($result);
        }
    }
    /**
     * Show the form for editing the specified Diet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('diet.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $users = User::all();
        $days = Day::all();
        $dietcontent = Dietcontent::all();
        $diethascontent = DietHasContent::all();
        $diet = Diet::find(strip_tags($id));
        $sessions = Dietid::all();
        return view('admin.diet.edit', compact('diet', 'sessions', 'users', 'days', 'dietcontent', 'diethascontent'));

    }

    /**
     * Update the specified Diet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('diet.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $this->validate($request, [

            'dietname' => 'required',
            'description' => 'required|max:6000',
            'day_id' => 'required|not_in:0',
            'session_id' => 'required',

        ]);
        $diet = Diet::find(strip_tags($id));
        $array = array();
        if ($request->content != [null] && $request->dcalories != [null] && $request->quantity != [null]) {
            foreach ($request->content as $key => $content) {
                if ($request->dietcontentid[$key] == '') {

                    $dietcontent = Dietcontent::updateOrCreate([
                        'content' => $request->content[$key],
                        'quantity' => 1,
                        'calories' => $request->single_kal[$key],
                    ]);

                }

            }

        }
        if ($request->content != [null] && $request->dcalories != [null] && $request->quantity != [null]) {

            foreach ($request->content as $key => $content) {

                if ($request->dietcontentid[$key] == '') {

                    $diethascontent = DietHascontent::updateOrCreate([
                        'content' => $request->content[$key],
                        'quantity' => $request->quantity[$key],
                        'calories' => $request->dcalories[$key],
                        'diet_id' => $diet->id,
                    ]);
                }
            }
        }
        $input = array_filter($request->all());
        $input['day'] = $request->day_id;
        $input['session_id'] = $request->session_id;

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }

        if ($file = $request->file('image')) {
            $validator = Validator::make(
                [
                    'file' => strip_tags($request->image),
                    'extension' => strtolower($request->image->getClientOriginalExtension()),
                ],
                [
                    'file' => 'required',
                    'extension' => 'required|in:jpg,jpeg,png',
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors(__('Invalid file !'));
            }
            if ($file = $request->file('image')) {

                $name = time() . $file->getClientOriginalName();
                $file->move('image/diet', $name);
                $input['image'] = $name;
            }
        }

        $diet->update($input);
        toastr()->success(__('Your diet has been updatd.'));
        return redirect(route('diet.index'));
    }
    /**
     * Update the status of  specified Diet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $diet = Diet::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $diet->update($input);
        toastr()->info(__('Data status has been changed  successfully!'));
        return back()->with('updated', __('Diet status has been changed'));
    }
    /**
     * Remove the specified Diet from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('diet.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $diet = Diet::findOrFail(strip_tags($id));
        $diet->delete();
        toastr()->error(__('Diet has been deleted.'));
        return back();
    }
    /**
     * Bulk remove the specified Diet from storage.
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
            $diet = Diet::find($checked);
            $diet->delete();
        }
        toastr()->error(__('Selected Enquiries has been deleted.'));
        return back();
    }
}
