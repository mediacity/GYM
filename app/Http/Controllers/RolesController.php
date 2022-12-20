<?php

namespace App\Http\Controllers;

use Auth;
use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as Permission;
use Spatie\Permission\Models\Role as Role;

class RolesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RolesController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Role.
     */

    public function __construct()
    {
        $this->middleware(['permission:roles.view']);
    }
    /**
     * This function is used to display all roles.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $roles = \DB::table('roles')->select('roles.id', 'roles.name')->get();
    
        if ($request->ajax()) {
            return DataTables::of($roles)

                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('action', 'manage.roles.action')
                ->rawColumns(['name', 'action'])
                ->make(true);
        }

        return view('manage.roles.index');
    }

    /**
     * Show the form for creating a new roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('roles.create')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $role_permission = Permission::select('name', 'id')->get();
        return view('manage.roles.create', compact('role_permission'));
    }

    /**
     * Store a newly created roles in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('roles.create')) {
            return abort(403, __("'User does not have the right permissions.'"));
        }
        $request->validate([
            'name' => 'required|unique:roles,name',
        ],
            [
                'name.required' => 'Role name is required !',
                'name.unique' => 'Role name already taken !',
            ]
        );

        $role = Role::create(['name' => $request->name]);
        if ($request->permissions) {
            foreach ($request->permissions as $key => $value) {
                $role->givePermissionTo($value);
            }
        }
        return back()->with('success', __("'Role has been created !'"));
    }

    /**
     * Show the form for editing the specified roles.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find(strip_tags($id));
        $role_permission = Permission::select('name', 'id')->get();
        return view('manage.roles.edit', compact('role_permission', 'role'));
    }

    /**
     * Update the specified roles in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::find(strip_tags($id));

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ],
            [
                'name.required' => 'Role name is required !',
                'name.unique' => 'Role name already taken !',
            ]
        );

        $role->name = strip_tags($request->name);

        $role->save();

        $role->syncPermissions($request->permissions);

        return back()->with('success', 'Role has been updated !');
    }

    /**
     * Remove the specified roles from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('roles.delete')) {
            return abort(403, __("'User does not have the right permissions.'"));
        }
    }
}
