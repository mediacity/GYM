<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TypeController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Type.
     */

    public function index()
    {
        $typelist = Type::orderBy('created_at', 'desc')->get();
        return view('admin.type.index', compact('typelist'));
    }

    /**
     * Show the form for creating a new type.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|',
        ]);
        $input = array_filter($request->all());
         if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $type = Type::create($input);
        $type->save();
        toastr()->success(__('Type has been saved successfully!'));
        return redirect(route('type.index'));
    }

    /**
     * Show the form for editing the specified type.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $type = Type::findOrFail($id);
            return view('admin.type.edit', compact('type'));
        }
    }

    /**
     * Update the specified type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = array_filter($request->all());
        $request->validate([

            'name' => 'required|string|',
        ]);
        $input = $request->all();
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $type->update($input);
        toastr()->success(__('Type has been updated!'));
        return redirect(route('type.index'));
    }
    /**
     * Remove the specified type from storage.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        toastr()->error(__('Type has been deleted'));
        return back();
    }
    /**
     * Change status the specified type from storage.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */

    public function status_update(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $type->update($input);
        toastr()->info(__('Type status has been updated!'));
        return back();
    }

    /**
     * Bulk Delete the specified type from storage.
     *
     * @param  \App\type  $type
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
            $type = Type::find($checked);
            $type->delete();
        }
        toastr()->error(__('Selected Exercisename has been deleted.'));
        return back();
    }
}
