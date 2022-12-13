<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Packages;
use DataTables ;

class PackageController extends Controller
{   
      /*
    |--------------------------------------------------------------------------
    | PackageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to recycle of all package.
     */
    /**
     * This function is used to display all package.
     *
     * @param $request
     * @return Renderable
     */ 
    public function index(Request $request)
    {
        $list = DB::table('packages')->WhereNotNull('deleted_at')->get();
       
    
            if ($request->ajax()) {
                return Datatables::of($list)
                ->addColumn('id', function ($list) {
                    return '<h6><a href="/list/'. $list->id .'">'. $list->id .'</a></h6>';
                })
                    ->rawColumns(['id'])
                    ->addIndexColumn()
                    ->addColumn('action','recycle.paaction')
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('recycle.package');
        
 
}
             /**
     * This function is used to restore all package.
     *
     * @param $request
     * @return Renderable
     */
        public function restore( $id)

    {
        
            $packages = Packages::onlyTrashed()->findOrFail(strip_tags($id));
            $packages->restore();
            toastr()->success(__('Restored Successfully'));
            return back();
          

    }
       /**
     * Permanent remove the specified package from storage.
     *
     * @param  \App\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
   {

    $packages = Packages::withTrashed()->findOrFail(strip_tags($id));
    $packages->forceDelete();
    toastr()->success(__('Package has permanent deleted'));
    return back();

    }
}