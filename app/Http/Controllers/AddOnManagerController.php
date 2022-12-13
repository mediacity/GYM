<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Nwidart\Modules\Facades\Module;
use Yajra\DataTables\Facades\DataTables;
use ZipArchive;

class AddOnManagerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AddOnManagerController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform  operations  of Addonmanager.
     */
    /**
     * This function is used to display all Addonmanager.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $modules = Module::toCollection();
        $modules = $modules->map(function ($module) {
            $json = @file_get_contents(base_path() . '/Modules/' . $module . '/module.json');
            $module = json_decode($json, true);
            $module['status'] = Module::find($module['name'])->isEnabled() ? 1 : 0;
            return $module;
        });
        if (request()->ajax()) {
            return DataTables::of($modules)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return '<img width="100px" class="img-responsive pull-left" src="' . Module::asset($row['alias'] . ':logo/' . $row['alias'] . '.png') . '"/>';
                })
                ->addColumn('name', function ($row) {
                    $html = '<b>' . $row['name'] . '</b>';
                    $html .= '<p>' . $row['description'] . '</p>';
                    return $html;
                })
                ->addColumn('status', 'admin.addonmanager.status')
                ->addColumn('version', function ($row) {
                    return $row['version'];
                })
                ->addColumn('action', 'admin.addonmanager.action')
                ->rawColumns(['image', 'name', 'status', 'version', 'action'])
                ->make(true);
        }

        return view('admin.addonmanager.index', compact('modules'));

    }
/**
 * Update the specified addonmanager in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Addonmanager  $addonmanager
 * @return \Illuminate\Http\Response
 */
    public function toggle(Request $request)
    {
        if ($request->ajax()) {

            $module = Module::find(strip_tags($request->modulename));

            if (!isset($module)) {
                return response()->json(['msg' => __('Module not found'), 'status' => 'fail']);
            }

            if (env('DEMO_LOCK') == 1) {
                return response()->json(['msg' => __('This action is disabled in demo !'), 'status' => 'fail']);
            }

            if ($request->status == 0) {
                $module->disable();
                return response()->json(['msg' => strip_tags($request->modulename) . __(' Module disabled !'), 'status' => 'success']);
            } else {
                $module->enable();
                return response()->json(['msg' => $request->modulename .__( ' Module enabled !'), 'status' => 'success']);
            }

        }

    }
/**
 * This function is used to install all addon.
 *
 * @param $request
 * @return Renderable
 */
    public function install(Request $request)
    {
        $validator = Validator::make(
            [
                'file' => strip_tags($request->addon_file),
                'extension' => strtolower(strip_tags($request->addon_file)->getClientOriginalExtension()),
            ],
            [
                'file' => 'required',
                'extension' => 'required|in:zip,7zip,gzip',
            ]

        );

        if ($validator->fails()) {
            return back()->withErrors(__('File should be a valid add-on zip file !'));
        }

        ini_set('max_execution_time', 300);

        $filename =strip_tags( $request->addon_file);

        $modulename = str_replace('.' . $filename->getClientOriginalExtension(), '', $filename->getClientOriginalName());

        $zip = new ZipArchive;

        $zipped = $zip->open($filename, ZipArchive::CREATE);

        if ($zipped) {

            $extract = $zip->extractTo(base_path() . '/Modules/');

            if ($extract) {

                $module = Module::find($modulename);

                $module->enable();

                Artisan::call('module:publish');

                Artisan::call('migrate'); //If any database tables to migrate

                Artisan::call('module:update ' . $modulename); //If any external pkg. to install.

                toastr()->success($modulename . __(' Module Installed Successfully'), 'Installed');

                return back();

            }
        }

        $zip->close();

    }
    /**
     * Remove the specified addon from storage.
     *
     * @param  \App\Addonmanager  $addonmanager
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if (env('DEMO_LOCK') == 1) {
            toastr()->error(__('This function is disabled in demo !'));
            return back();
        }

        $module = Module::find(strip_tags($request->modulename));

        if (!isset($module)) {
            toastr()->error(__('Module not found !'), '404');
            return back();
        }

        $module->delete();
        toastr()->success(__('Module deleted !'), 'Success');

        return back();
    }
}
