<?php

namespace Modules\Coupans\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Coupans\Models\Coupan;

class CoupansController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $coupans = Coupan::orderBy('id', 'DESC')->get();
        return view('coupans::manage.index',compact('coupans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('coupans::manage.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupans,code',
            'amount' => 'required'
        ]);

        $input = $request->all();
        $newc = new Coupan;
        $input['is_login'] = isset($request->is_login) ? 1 : 0;
        $input['status'] = isset($request->status) ? 1 : 0;
        $newc->create($input);
        return redirect(route("coupans.index"))->with("success", "Coupan Has Been Created !");
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $coupan = Coupan::findorFail($id);
        return view('coupans::manage.edit',compact('coupan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $newc = Coupan::find($id);

        $request->validate([
            'code' => 'required|unique:coupans,code,'.$id,
            'amount' => 'required'
        ]);

        $input = $request->all();

        $input['is_login'] = isset($request->is_login) ? 1 : 0;

        $input['status'] = isset($request->status) ? 1 : 0;

        $newc->update($input);

        return redirect(route("coupans.index"))->with("success", "Coupan has been updated !");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $newc = Coupan::find($id);

        if (isset($newc))
        {
            $newc->delete();
            return back()->with('deleted', 'Coupon has been deleted');
        }
        else
        {
            return back()->with('deleted', '404 | Coupon not found !');
        }
    }
}
