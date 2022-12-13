<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BlogCategoryController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations blogcategory.
     */
    public function __construct()
    {
        $this->middleware(['permission:blogs.view']);
    }
    /**
     * This function is used to display all blogcategory.
     *
     * @param $request
     * @return Renderable
     */
    public function index()
    {

        $blogcategory = BlogCategory::orderBy('created_at', 'desc')->get();
         return view('admin.blog.blogcategory.index', compact('blogcategory'));
    }

    /**
     * Show the form for creating a new blogcategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::user()->can('blogs.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.blog.blogcategory.create');
    }

    /**
     * Store a newly created blogcategory in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!Auth::user()->can('blogs.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|unique:blogs,title',
        ]);

        $input = array_filter($request->all());

        BlogCategory::create([
            'title' => $input['title'],
            'slug' => Str::slug($input['title'], '-'),
            'is_active' => isset($input['is_active']) ? 1 : 0,
        ]);

        toastr()->success(__('Blog Category has been added'));
        return redirect(route('blogcategory.index'));
    }

    /**
     * Show the form for editing the specified blogcategory.
     *
     * @param  \App\Modules\Blog\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogcategory)
    {
        if (!Auth::user()->can('blogs.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        return view('admin.blog.blogcategory.edit', compact('blogcategory'));
    }

    /**
     * Update the specified blogcategory in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Blog\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogcategory)
    {
        if (!Auth::user()->can('blogs.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $blogcategory->id,
        ]);

        $input = array_filter($request->all());

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        $blogcategory->update([
            'title' => $input['title'],
            'slug' => str::slug($input['title'], '-'),
            'is_active' => $input['is_active'],
        ]);

        if ($blogcategory->is_active == 0) {
            foreach ($blogcategory->blogs as $blog) {
                $blog->update([
                    'is_active' => 0,
                ]);
            }
        } else {
            foreach ($blogcategory->blogs as $blog) {
                $blog->update([
                    'is_active' => 1,
                ]);
            }
        }
        toastr()->info(__('Blog has been updated'));
        return redirect('manage/admin/blogcategory');
    }

    /**
     * Remove the specified blogcategory from storage.
     *
     * @param  \App\Modules\Blog\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogcategory)
    {

        if (!Auth::user()->can('blogs.delete')) {
            return abort(403,__( 'User does not have the right permissions.'));
        }
        $blogcategory->delete();
        toastr()->error(__('Slider has been deleted'));
        return back();
    }
/**
 * Bulk remove the specified blogcategory from storage.
 *
 * @param  \App\Modules\Blog\Models\BlogCategory  $blogCategory
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
            $blogcategory = BlogCategory::find($checked);
            $blogcategory->delete();
        }
        toastr()->error(__('Selected BlogCategory has been deleted.'));
        return back();
    }
    /**
     * Update the status of specified blogcategory in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Blog\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $blogcategory = BlogCategory::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $blogcategory->update($input);
        toastr()->info(__('Blogcategory status has been changed'));
        return back()->with('updated',__( 'Blog Category status has been changed'));
    }
}
