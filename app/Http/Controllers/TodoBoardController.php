<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Reminder;
use App\Todo;
use App\TodoBoard;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TodoBoardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TodoBoardController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todoboard.
     */

    public function __construct()
    {
        $this->middleware(['permission:todoboard.view']);
    }
    /**
     * This function is used to display all todoboard.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $auth = Auth::user();
        $boards = TodoBoard::all();
		return view('admin.todo.board', compact('boards'));
    }
/**
 * This function is used to display all todoboard.
 *
 * @param $request
 * @return Renderable
 */
    public function all_todos($id)
    {
        $auth = Auth::user();
        $board = TodoBoard::find($id);
        $todos = Todo::where('board_id', $board->id)->get();
        return view('admin.todo.index', compact('todos', 'auth'));
    }
	/**
     * Show the form for creating a new todoboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if (!Auth::user()->can('todoboard.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $users = User::where('role_type', '!=', 'User')->pluck('name', 'id');
        return view('admin.todo.todo', compact('users'));

    }

    /**
     * Store a newly created todoboard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('todoboard.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $request->validate([
            'title' => 'required',
            'created_by' => 'required',
        ]);
        $input = array_filter($request->all());
        $input['is_public'] = isset($input['is_public']) ? $input['is_public'] : 0;
        $input['is_active'] = isset($input['todo_active']) ? $input['todo_active'] : 0;
        $input['assigned_to'] = isset($request->assigned_to) && $input['is_public'] == 1 ? null : $input['assigned_to'];
        TodoBoard::create($input);
        $reminder = new Reminder;
        $reminder->user_id = strip_tags($request->assigned_to);
        $reminder->status = 'pending';
        $reminder->note = 'Board has been added';
        $old_date = Carbon::now()->format('d-m-Y');
        $reminder->reminder_date = date('d-m-Y', strtotime($old_date));
        $reminder->save();
        toastr()->success(__('Todo board has been added!'));
        return redirect('admin/todo')->with('added', __( 'Board has been added'));
    }

    /**
     * Show the form for editing the specified todoboard.
     *
     * @param  \App\Modules\Todo\Models\TodoBoard  $todoboard
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoBoard $todoboard)
    {
        if (!Auth::user()->can('todoboard.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $auth = Auth::user();
        $users = User::where('role_type', '!=', 'User')->pluck('name', 'id');
        $boards = TodoBoard::where('created_by', $auth->id)->orWhere('assigned_to', $auth->id)->get();
		return view('admin.todo.todo', compact('users', 'todoboard', 'boards', 'auth'));
    }

    /**
     * Update the specified todoboard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Todo\Models\TodoBoard  $todoboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoBoard $todoboard)
    {
        if (!Auth::user()->can('todoboard.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $auth = Auth::user();
        if ($todoboard->created_by != $auth->id && $auth->role_id != 1) {
            abort(404);
        }
        $request->validate([
            'title' => 'required',
            'created_by' => 'required',
        ]);
        $input = array_filter($request->all());
         $input['is_public'] = isset($input['is_public']) ? $input['is_public'] : 0;
        $input['is_active'] = isset($input['todo_active']) ? $input['todo_active'] : 0;
        $input['assigned_to'] = (isset($request->assigned_to) && $input['is_public'] == 1) ? null : $input['assigned_to'];
        $todoboard->update($input);
        return redirect('admin/todo')->with('added', __('Board has been updated'));
    }

    /**
     * Remove the specified todoboard from storage.
     *
     * @param  \App\Modules\Todo\Models\TodoBoard  $todoboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoBoard $todoboard)
    {
        if (!Auth::user()->can('todoboard.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $auth = Auth::user();
        $todoboard->delete();
        toastr()->success(__('Board has been deleted'));
        return redirect(url('/admin/todo'));
    }
}
