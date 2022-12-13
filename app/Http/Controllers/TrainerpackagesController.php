<?php

namespace App\Http\Controllers;

use App\Trainerpackages;
use App\User;
use Spatie\Permission\Models\Role as Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use DB;
class TrainerpackagesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TrainerpackagesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Trainerpackages.
     */

    /**
     * This function is used to display all trainerpackages.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $trainerpackagelist= Trainerpackages::orderBy('id', 'DESC')->get();
        $trainers  = Role::where('name', 'trainer')->first()->users()->get();
        return view('admin.trainerpackages.index', compact('trainerpackagelist','trainers'));
    }

    /**
     * Show the form for creating a new trainerpackages.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers  = Role::where('name', 'trainer')->first()->users()->get();
        $trainerpackages = Trainerpackages::all();
        return view('admin.trainerpackages.create',compact('trainers','trainerpackages'));
    }

    /**
     * Store a newly created trainerpackages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'trainer_name' => 'required|string',
           'name' => 'required|string|',
            'detail' => 'required|string|max:5000',
            'duration' => 'required|string',
            'price' => 'required|string|',
            'stripe_id' => 'required|string|',
             ]);
        $input = array_filter($request->all());
        $input['trainerid'] = (strip_tags($request->trainer_id));
        $input['is_active'] = isset($input['is_active']) ? 1 : 0;
        $trainerpackages = TrainerPackages::create($input);
        $trainerpackages->save();
        toastr()->success(__('Status has been changed successfully!'));
        return redirect(route('trainerpackages.index'));
    }

    /**
     * Display the specified trainerpackages.
     *
     * @param  \App\Trainerpackages  $trainerpackages
     * @return \Illuminate\Http\Response
     */
    public function show(Trainerpackages $trainerpackages)
    {
        //
    }

    /**
     * Show the form for editing the specified trainerpackages.
     *
     * @param  \App\Trainerpackages  $trainerpackages
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    { 
        $trainers  = Role::where('name', 'trainer')->first()->users()->get();
        $trainerpackages = Trainerpackages::findOrFail($id);
        return view('admin.trainerpackages.edit', compact('trainerpackages','trainers'));
    }

    /**
     * Update the specified trainerpackages in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainerpackages  $trainerpackages
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $trainerpackages = Trainerpackages::findOrFail($id);
        $request->validate([

            'trainer_name' => 'required|string',
            'name' => 'required|string',
            'detail' => 'required|string|max:5000',
            'duration' => 'required|string',
            'price' => 'required|string|numeric:trainerpackages',
            'stripe_id' => 'required|string|',
            ]);
            $input = $request->all();
            if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $trainerpackages->update($input);
        toastr()->success(__('Trainerpackage has been updated!'));
        return redirect(route('trainerpackages.index'));
    }

    /**
     * Remove the specified trainerpackages from storage.
     *
     * @param  \App\Trainerpackages  $trainerpackages
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $trainerpackages = Trainerpackages::findOrFail($id);
        $trainerpackages->delete();
        toastr()->success(__('Package has been deleted'));
        return back();
    }
     /**
     * Update Status specified trainerpackages from storage.
     *
     * @param  \App\Trainerpackages  $trainerpackages
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $trainerpackages = Trainerpackages::findOrFail($id);
        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $trainerpackages->update($input);
         return back()->with('updated', __( 'Package status has been changed'));
    }
    /**
     * Bulk Remove the specified trainerpackages from storage.
     *
     * @param  \App\Trainerpackages  $trainerpackages
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
                $trainerpackages = Trainerpackages::find($checked);
                $trainerpackages->delete();
          }
          toastr()->error(__('Selected Package has been deleted.'));
          return back();
   }
}
