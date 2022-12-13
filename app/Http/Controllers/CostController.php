<?php

namespace App\Http\Controllers;

use App\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CostController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations cost.
     */
    public function index()
    {
        $cost = Cost::orderBy('created_at', 'desc')->get();
        return view('admin.cost.index', compact('cost'));
    }

    /**
     * Show the form for creating a new cost.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cost.create');
    }

    /**
     * Store a newly created resource in cost.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cost' => 'required',
        ]);

        $input = array_filter($request->all());
        $cost = new Cost;
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $cost = Cost::create($input);
        toastr()->success(__('Cost has been saved successfully!'));
        return redirect(route('cost.index'));
    }

    /**
     * Show the form for editing the specified cost.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cost = Cost::findOrFail(strip_tags($id));
        return view('admin.cost.edit', compact('cost'));
    }

    /**
     * Update the specified cost in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cost = Cost::findOrFail(strip_tags($id));
        $request->validate([
            'cost' => 'required',
        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $cost->update($input);
        toastr()->success(__('Cost has been updated successfully!'));
        return redirect(route('cost.index'));
    }

    /**
     * Remove the specified cost from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = Cost::findOrFail(strip_tags($id));
        $cost->delete();
        toastr()->success(__('Cost has been deleted'));
        return back();
    }
    /**
     * Update the status of specified cost in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $cost = Cost::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $cost->update($input);
        toastr()->info(__('Cost status has been changed.'));
        return back();
    }
    /**
     * Bulk remove the specified cost from storage.
     *
     * @param  \App\Cost  $cost
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
            $cost = Cost::find($checked);
            $cost->delete();
        }
        toastr()->error(__('Selected Cost has been deleted.'));
        return back();
    }

    /**
     *restore the cost from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function restore(int $id)
    {

        /**
         * Find content only among those deleted.
         */

        $cost = Cost::onlyTrashed()->findOrFail(strip_tags($id));

        $cost->restore();

        return response()->json($cost, 200);

    }

    /**
     * It only fetches deleted blog posts.
     */

    public function onlyTrashed()
    {

        /**
         * Here we call onlyTrashed as an extra.
         */

        $cost = Cost::onlyTrashed()->get();

        return response()->json($cost, 200);

    }

}
