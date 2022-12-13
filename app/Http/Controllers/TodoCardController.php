<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Todo;
use App\TodoBoard;
use App\TodoCard;
use Illuminate\Http\Request;
use Auth;

class TodoCardController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | TodoCardController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Todocard.
     */

    public function __construct()
    {
        $this->middleware(['permission:todocard.view']);
    }
    
    /**
     * Store a newly created todocard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (!Auth::user()->can('todocard.add')) {
            return abort(403, __('User does not have the right permissions.'));

        }
        $request->validate([
            'name' => 'required|string'
        ]);
        $input = array_filter($request->all());
        $board = TodoBoard::find(strip_tags($request->board_id));
        TodoCard::create($input);
        toastr()->success(__('A new card has been added in ').$board->title);
        return back();
    }
    /**
     * Update the specified todocard in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::user()->can('todocard.edit')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $request->validate([
            'name' => 'required|string'
        ]);
        $input = $request->all();
        $card = TodoCard::find(strip_tags($request->card_id));
        $card->update($input);
        toastr()->success(__('Card has been Updated successfully'));
        return back();
    }
     /**
     * Remove the specified todocard from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request)
    {
        if (!Auth::user()->can('todocard.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'card_id' => 'required'
        ]);
        $card = TodoCard::find(strip_tags($request->card_id));
        $card->tasks()->delete();
        $card->delete();
        toastr()->error(__(' Deleted successfully'));
        return back();
    }
}
