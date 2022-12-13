<?php

namespace App\Http\Controllers;

use App\Exercisename;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExercisenameController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExercisenameController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations exercisename.
     */
    /**
     * This function is used to display all exercisename.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $exercisename = Exercisename::orderBy('created_at', 'desc')->get();
        return view('admin.exercisename.index', compact('exercisename'));
    }

    /**
     * Show the form for creating a new exercisename.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.exercisename.create', compact('types'));
    }

    /**
     * Store a newly created exercisename in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exercisename' => 'required',
            'body_part' => 'required',
            'type' => 'required',
            'detail' => 'required|max:5000',

        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $exercisename = new Exercisename;
        $exercisename->exercisename = strip_tags($request->exercisename);
        $exercisename->body_part =strip_tags( $request->body_part);
        $exercisename['type'] = $request->type;
        $exercisename['is_active'] = strip_tags($request->is_active);
        $exercisename->detail = strip_tags($request->detail);
        $exercisename->save();
        toastr()->success(__('Exercisename has been saved successfully!'));
        return redirect(route('exercisename.index'));
    }

    /**
     * Show the form for editing the specified exercisename.
     *
     * @param  \App\exercisename  $exercisename
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $exercisename = Exercisename::findOrFail(strip_tags($id));
        return view('admin.exercisename.edit', compact('exercisename', 'types'));
    }

    /**
     * Update the specified exercisename in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exercisename  $exercisename
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exercisename = Exercisename::findOrFail(strip_tags($id));
         $request->validate([
            'exercisename' => 'required',
            'body_part' => 'required',
            'type' => 'required',
            'detail' => 'required|max:5000',
        ]);

        $input = array_filter($request->all());
        $input['type'] = $request->type;
        $input['is_active'] = strip_tags($request->is_active);
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        } else {
            $input['is_active'] = 1;
        }
        $exercisename->update($input);
        toastr()->success(__('Exercisename has been updated successfully!'));
        return redirect(route('exercisename.index'));

    }
    /**
     * Remove the specified exercisename from storage.
     *
     * @param  \App\exercisename  $exercisename
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercisename = Exercisename::findOrFail(__($id));
        $exercisename->delete();
        toastr()->error(__('Exercisename has been deleted successfully!'));
        return redirect(route('exercisename.index'));
    }
    /**
     * Update the status of specified exercisename in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exercisename  $exercisename
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $exercisename = Exercisename::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
          if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
         $exercisename->update($input);
        toastr()->info(__('Status has been updated successfully!'));
        return back();
    }
    /**
     * Bulk remove the specified exercisename from storage.
     *
     * @param  \App\exercisename  $exercisename
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
            $exercisename = Exercisename::find($checked);
            $exercisename->delete();
        }
        toastr()->error(__('Selected Exercisename has been deleted.'));
        return back();
    }
}
