<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Measurement;
use App\User;
use Auth;
use App\Trainer;
use App\Reminder;
use Crypt;
use App\Weekreminder;
use App\Halfmonth;
use Illuminate\Support\Facades\Validator;
use App\Notifications\MeasurementNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Carbon;
class MeasurementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MeasurementController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todoboard.
     */
    public function __construct()

    {
        $this->middleware(['permission:measurements.view']);
    }
     /**
     * This function is used to display all measurement.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $measurement = Measurement::orderBy('created_at' , 'desc')->where('user_id','=',Auth::user()->id)->get();
        return view('admin.measurement.index' , compact('measurement'));
    }
    /**
     * Show the form for creating a new measurement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!Auth::user()->can('measurements.add')){
            return abort(403,__('User does not have the right permissions.'));
        }
        $users =User::all();
        $input = array_filter($request->all());
        $trainers =Trainer::all();
        $measurement = Measurement::orderBy('created_at' , 'desc')->where('user_id','=',Auth::user()->id)->get();      
        return view('admin.measurement.create',compact('measurement','users','trainers'));
    }
    /**
     * Store a newly created measurement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('measurements.add')){
            return abort(403,__('User does not have the right permissions.'));
        }
        $this->validate($request ,[
        'height' => 'required|numeric|digits_between:1,10',
        'weight' => 'required|numeric|digits_between:1,10',
        'chest' => 'required|numeric|digits_between:1,10',
        'tricep' => 'required|numeric|digits_between:1,10',
        'thigh_l' => 'required|numeric|digits_between:1,10',
        'neck' => 'required|numeric|digits_between:1,10',
        'waist' => 'required|numeric|digits_between:1,10' ,
        'shoulder' => 'required|numeric|digits_between:1,10',
        'hips' => 'required|numeric|digits_between:1,10',
        'calves' => 'required|numeric|digits_between:1,10',
        'muscle' => 'required|numeric|digits_between:1,10',
        'r_arm' => 'required|numeric|digits_between:1,10',
        'l_arm' => 'required|numeric|digits_between:1,10',
        'thigh_r' => 'required|numeric|digits_between:1,10',
        'arm_circumference' => 'required|numeric|digits_between:1,10',
        'bicep' => 'required|numeric|digits_between:1,10',
        'bmi' => 'required|numeric|digits_between:1,10',
        'trainer_name' => 'required',
        'abdomen' => 'required|numeric|digits_between:1,10',
        'fat' => 'required|numeric|digits_between:1,10',
        'optimal_fat' => 'required|numeric|digits_between:1,10',
        'date' => 'required'

        ]);
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }else{
            $input['is_active'] = 1;
        }

        $measurement = new Measurement;
        $measurement->user_id = Auth::user()->id;     
        $measurement->height= strip_tags($request->height);
        $measurement->weight = strip_tags($request->weight);
        $measurement->chest = strip_tags($request->chest);   
        $measurement->tricep = strip_tags( $request->tricep);
        $measurement->thigh_l = strip_tags($request->thigh_l);
        $measurement->neck = strip_tags($request->neck);
        $measurement->waist = strip_tags($request->waist);
        $measurement->shoulder = strip_tags($request->shoulder);
        $measurement->hips = strip_tags($request->hips);
        $measurement->calves = strip_tags($request->calves);
        $measurement->muscle = strip_tags($request->muscle);
        $measurement->r_arm = strip_tags($request->r_arm);
        $measurement->l_arm = strip_tags($request->l_arm);
        $measurement->thigh_r = strip_tags($request->thigh_r);
        $measurement->arm_circumference = strip_tags($request->arm_circumference);
        $measurement->bicep =strip_tags( $request->bicep);
        $measurement->bmi = strip_tags($request->bmi);
        $measurement->trainer_name =strip_tags( $request->trainer_name);
        $measurement->abdomen = strip_tags($request->abdomen);
        $measurement->fat = strip_tags($request->fat);
        $measurement->optimal_fat = strip_tags($request->optimal_fat);
        $measurement->date = strip_tags($request->date);
        $measurement->description = strip_tags($request->description); 
        $measurement->is_active = $input['is_active'];
        $measurement->save();
        $reminder = new Reminder;
        $reminder->user_id = strip_tags($request->user_id);
        $reminder->status = 'pending';
        $reminder->note = 'Add Measurement';
        $old_date = Carbon::now()->format('d-m-Y');
       $reminder->reminder_date = date('d-m-Y', strtotime($old_date. ' +30 days'));
        $reminder->save();
        $weekreminder = new Weekreminder;
        $weekreminder->user_id = strip_tags($request->user_id);
        $weekreminder->status = 'pending';
        $weekreminder->note = 'Add Exercise after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $weekreminder->reminder_date = date('d-m-Y', strtotime($old_date. ' +7 days'));
        $weekreminder->save();
        $halfmonth = new Halfmonth;
        $halfmonth->user_id = strip_tags($request->user_id);
        $halfmonth->status = 'pending';
        $halfmonth->note = 'Add Exercise after 23 days';
        $old_date = Carbon::now()->format('d-m-Y');
        $halfmonth->reminder_date = date('d-m-Y', strtotime($old_date. ' +15 days'));
        $halfmonth->save();
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'User');
            }
        )->where('id', $request->user_id)->get();
     
        $name = [
			'name' => Auth::user()->name,
		  ];
          Notification::send($users, new MeasurementNotification($name));
        toastr()->success(__('Your Fitness Measurement has been added.'));
        return redirect(route('measurement.index'));
    }
   
    /**
     * Show the form for editing the specified measurement.
     *
     * @param  \App\measurement  $measurment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->can('measurements.edit')){
            return abort(403,__('User does not have the right permissions.'));
        }
        $users =User::all();
        $trainers =Trainer::all();
        $measurement = Measurement::find(strip_tags($id));
        return view('admin.measurement.edit' , compact('measurement' ,'users' ,'id','trainers'));
    }
    /**
     * Update the specified measurement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measurment  $measurment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user()->can('measurements.edit')){
            return abort(403,__('User does not have the right permissions.'));
        }
        $this->validate($request ,[
            'user_id' => 'required' ,
            'height' => 'required|numeric|digits_between:1,10',
            'weight' => 'required|numeric|digits_between:1,10',
            'chest' => 'required|numeric|digits_between:1,10',
            'tricep' => 'required|numeric|digits_between:1,10',
            'thigh_l' => 'required|numeric|digits_between:1,10',
            'neck' => 'required|numeric|digits_between:1,10',
            'waist' => 'required|numeric|digits_between:1,10' ,
            'shoulder' => 'required|numeric|digits_between:1,10',
            'hips' => 'required|numeric|digits_between:1,10',
            'calves' => 'required|numeric|digits_between:1,10',
            'muscle' => 'required|numeric|digits_between:1,10',
            'r_arm' => 'required|numeric|digits_between:1,10',
            'l_arm' => 'required|numeric|digits_between:1,10',
            'thigh_r' => 'required|numeric|digits_between:1,10',
            'arm_circumference' => 'required|numeric|digits_between:1,10',
            'bicep' => 'required|numeric|digits_between:1,10',
            'bmi' => 'required|numeric|digits_between:1,10',
            'trainer_name' => 'required',
            'abdomen' => 'required|numeric|digits_between:1,10',
            'fat' => 'required|numeric|digits_between:1,10',
            'optimal_fat' => 'required|numeric|digits_between:1,10',
            'date' => 'required'
            ]);
            
        $measurement = Measurement::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $measurement->update($input);
        toastr()->success(__('Your Fitness Measurement has been updatd.'));
        return redirect(route('measurement.index'));
    }
    /**
     * Remove the specified measurement from storage.
     *
     * @param  \App\measurement  $measurment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->can('measurements.delete')){
            return abort(403,__('User does not have the right permissions.'));
        }

        $measurement = measurement::findOrFail(strip_tags($id));
        $measurement->delete();
        toastr()->error(__('Measurement data has been deleted.'));
        return back();
    }
     /**
     * Update the status of specified measurement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measurment  $measurment
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $measurement = Measurement::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $measurement->update($input);
        toastr()->info(__('Measurement status has been changed'));
        return back()->with('updated',__( 'Measurement status has been changed'));
    }
     /**
     * Bulk remove the specified measurement from storage.
     *
     * @param  \App\measurement  $measurment
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
                $measurement = Measurement::find(strip_tags($checked));
                $measurement->delete();
          }
          toastr()->error(__('Selected Measurement has been deleted.'));
          return back();
   }
}
