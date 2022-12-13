<?php

namespace App\Http\Controllers;

use App\Locker;
use DB;

class RecycleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RecycleController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform recycle the locker.
     */
    public function index()
    {
        $lockers = DB::table('lockers')->WhereNotNull('deleted_at')->get();
        $appointments = DB::table('appointments')->WhereNotNull('deleted_at')->get();
        return view('admin.recycle.index', compact('delete', 'appointments'));
    }
    /**
     * This function is used to restore all todoboard.
     *
     * @param $request
     * @return Renderable
     */
    public function restore(int $id)
    {
        $lockers = Locker::onlyTrashed()->findOrFail(strip_tags($id));
        $lockers->restore();
        toastr()->success(__('Restored Successfully'));
        return back();

    }
    /**
     * Permanent remove the specified locker from storage.
     *
     * @param  \App\Modules\Todo\Models\TodoBoard  $todoboard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Locker::findOrFail(strip_tags($id));
        $delete->forceDelete();
        toastr()->success(__('Cost has been deleted'));
        return back();
    }
}
