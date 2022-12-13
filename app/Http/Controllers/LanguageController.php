<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JoeDixon\Translation\Language;

class LanguageController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | LanguageController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Language.
     */

    /**
     * This function is used to display all Language.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {
        $languages = Language::orderBy('created_at', 'desc')->get();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input = array_filter($request->all());
        $languages = new Language;
        
        $all_def = Language::where('def','=',1)->get();
        
        if (isset($request->def)) {

            foreach ($all_def as $value) {
                $remove_def =  Language::where('id','=',$value->id)->update(['def' => 0]);
            }

             $input['def'] = 1;

        }else{
            if($all_def->count()<1)
            {
                return back()->with('delete','Atleast one language need to set default !');
            }

            $input['def'] = 0;
        }

        $languages = Language::create($input);
        toastr()->success(__('Language has been saved successfully!'));
        return redirect(route('language.index'));
    }
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $all_def = Language::where('def','=',1)->get();


       


        $input = $request->all();

        if (isset($request->def)) {

            

            foreach ($all_def as $value) {
                $remove_def =  Language::where('id','=',$value->id)->update(['def' => 0]);
            }

             $input['def'] = 1;

        }else{

            if($all_def->count()<1)
            {
                return back()->with('delete','Atleast one language need to set default !');
            }

            $input['def'] = 0;
        }


        $language->update($input);
        
        toastr()->success(__('Language has been update successfully!'));
        return redirect(route('language.index'));
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $languages = Language::findOrFail($id);
        if($languages->def ==1){
            toastr()->error(__('Default language can not be deleted.'));
            
        }else{

             $languages->delete();
         return redirect()->route('language.index')
            ->with('success', __('languages deleted successfully'));
    }
}
}
