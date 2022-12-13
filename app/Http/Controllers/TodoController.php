<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Todo;
use App\TodoBoard;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as Role;

class TodoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TodoController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todo.
     */
    public function __construct()
    {
        $this->middleware(['permission:todo.view']);
    }

    /**
     * This function is used to display all todo.
     *
     */

    public function index()
    {

        $auth = Auth::user();

        $users = User::where('role_type', '!=', 'Super Admin')->pluck('name', 'id');

        $boards = TodoBoard::where('created_by', $auth->id)->orWhere('assigned_to', $auth->id)->orWhere('is_public', '1')->get();

        return view('admin.todo.todo', compact('boards', 'users', 'auth'));
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('todo.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $roles = Role::all();
        $users = User::where('role_type', '!=', 'Super Admin')->pluck('name', 'id');
        return view('admin.todo.todo', compact('users', 'roles'));
    }

    /**
     * Store a newly created todo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('todo.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $auth = Auth::user();
        $request->validate([
            'board_id' => 'required',
            'task' => 'required',
            'created_by' => 'required',
            'due_on' => 'nullable|date',
        ]);
        $input = array_filter($request->all());
        $input['is_active'] = isset($input['is_active']) ? $input['is_active'] : 0;
        $input['assigned_on'] = now();
        $todo = Todo::create($input);
        $input['remark'] = isset($input['remark']) ? clean($input['remark']) : null;
        if ($request->ajax()) {
            return response()->json(1, 200);
        }
        toastr()->success(__('Task has been added'));
        return redirect('admin/todo')->with('added', __('Task has been added'));
    }

    /**
     * Show the form for editing the specified todo.
     *
     * @param  \App\Modules\Todo\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        if (!Auth::user()->can('todo.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $users = User::where('role_type', '!=', 'User')->pluck('name', 'id');
        $view = view('admin.todo.edit')->with(['todo' => $todo, 'users' => $users])->render();
        if (request()->ajax()) {
            return response()->json($view);
        }
    }

    /**
     * Update the specified todo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Todo\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if (!Auth::user()->can('todo.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $auth = Auth::user();

        $request->validate([
            'task' => 'required',
            'due_on' => 'nullable|date',
        ]);
		$input = array_filter($request->all());
        $input['is_active'] = isset($input['is_active']) ? $input['is_active'] : 0;
        $input['is_checked'] = isset($input['is_checked']) ? $input['is_checked'] : 0;
        $input['is_complete'] = isset($input['is_complete']) ? $input['is_complete'] : 0;
        $input['remark'] = isset($input['remark']) ? $input['remark'] : null;
        $todo->update($input);
        toastr()->info(__('Task has been updated'));
        return back()->with('added', __('Task has been updated'));
    }

    /**
     * Remove the specified todo from storage.
     *
     * @param  \App\Modules\Todo\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if (!Auth::user()->can('todo.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $auth = Auth::user();

        $todo->delete();
        toastr()->error(__('Task has been deleted'));
        return back();
    }

    /**
     * Bulk remove the specified todo from storage.
     *
     * @param  \App\Modules\Todo\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function bulk_delete(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'checked' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('deleted', __('Please select one of them to delete'));
        }

        foreach ($request->checked as $checked) {
            $todo = Todo::findOrFail($checked);
            $this->destroy($todo);
        }

        toastr()->error(__('Task has been deleted'));
        return back()->with('deleted', __('Task has been deleted'));
    }

    /**
     * Update the status from the storage
     *
     * @param  \App\Modules\Todo\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $auth = Auth::user();
        $todo = Todo::findOrFail($id);
        if ($todo->created_by != $auth->id && $todo->board->assigned_to != $auth->id && $auth->role_id != 1) {
            abort(404);
        }
        $input = array_filter($request->all());
        if ($input['type'] == '1') {
            if (isset($input['is_complete'])) {
                $input['is_complete'] = 1;
                $input['completed_on'] = now();
            } else {
                $input['is_complete'] = 0;
                $input['completed_on'] = null;
                if ($todo->is_checked == 1) {
                    $input['is_checked'] = 0;
                    $input['checked_on'] = null;
                }
            }
        }
        if ($input['type'] == '2') {
            if (isset($input['is_checked'])) {
                $input['is_checked'] = 1;
                $input['checked_on'] = now();
                if ($todo->is_complete == 0) {
                    $input['is_complete'] = 1;
                    $input['completed_on'] = now();
                }
            } else {
                $input['is_checked'] = 0;
                $input['checked_on'] = null;
            }
        }
        $todo->update($input);
        if ($request->ajax()) {
            return response()->json(array('complete' => $todo->is_complete, 'checked' => $todo->is_checked), 200);
        }
        return back()->with('updated',__( 'Task status has been changed'));
    }
}
