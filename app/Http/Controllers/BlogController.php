<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BlogController
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Blog.
     */
    public function __construct()
    {
        $this->middleware(['permission:blogs.view']);
    }
    /**
     * This function is used to display all blog.
     *
     * @param $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        if (!$request->search) {
            $blogCategory = BlogCategory::all();
            $blogs = Blog::paginate(3);

        } else {
            $blogs = Blog::where('title', 'LIKE', '%' . $request->search . '%')->paginate(2);

        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('blogs.add')) {

            return abort(403, __('User does not have the right permissions.'));
        }
        $users = User::all();
        $blogcategory = BlogCategory::where('is_active', '1')->pluck('title', 'id')->all();
        return view('admin.blog.create', compact('users', 'blogcategory'));
    }

    /**
     * Store a newly created blog in storage.
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
            'user_id' => 'required',
            'blog_cat_id' => 'required',
            'title' => 'required',
            'detail' => 'required|max:5000',
        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($image = $request->file('image')) {
            $optimizeImage = Image::make($image);
            $optimizePath = public_path() . '/image/blog/';
            if (!file_exists($optimizePath)) {
                mkdir($optimizePath, 666, true);
            }
            $name = time() . $image->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 70);

            $input['image'] = $name;
        }
        if ($video = $request->file('video')) {
            $filename = time() . $video->getClientOriginalName();
            $path = public_path() . '/image/blog/';
            $videoname = str_replace(' ', '', $filename);
            $video->move($path, $videoname);
            $input['video'] = $videoname;
        }
        $blog = Blog::create($input);
        $blog->slug = str_slug($input['detail'], '-');
        $uni_col = array(Blog::pluck('uni_id'));
        do {
            $random = str_random(5);
        } while (in_array($random, $uni_col));

        $blog->uni_id = $random;
        $blog->save();
        toastr()->success(strip_tags('Blog has been added'));
        return redirect(route('blog.index'));
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param  \App\modules\Blog\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if (!Auth::user()->can('blogs.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $blogcategory = BlogCategory::where('is_active', '1')->pluck('title', 'id')->all();
        $users = User::all();
        return view('admin.blog.edit', compact('blog', 'users', 'blogcategory'));
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modules\Blog\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if (!Auth::user()->can('blogs.edit')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        $request->validate([
            'user_id' => 'required',
            'blog_cat_id' => 'required',
            'title' => 'required',
            'detail' => 'required|max:5000',

        ]);

        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }

        if ($image = $request->file('image')) {
            $optimizeImage = Image::make($image);
            $optimizePath = public_path() . '/image/blog/';
            $name = time() . $image->getClientOriginalName();
            if ($blog->image != '') {
                $image_file = @file_get_contents(public_path() . '/image/blog/' . $blog->image);
                if ($image_file) {
                    unlink(public_path() . '/image/blog/' . $blog->image);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['image'] = $name;
        }
        if ($video = $request->file('video')) {
            $filename = time() . $video->getClientOriginalName();
            $path = public_path() . '/image/blog/';
            $videoname = str_replace(' ', '', $filename);
            $video->move($path, $videoname);
            $input['video'] = $videoname;
        }
        $blog->update($input);
        $blog->slug = str_slug($input['detail'], '-');
        toastr()->info(__('Blog has been updated'));
        return redirect('manage/admin/blog')->with('updated', __('Blog has been updated'));
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\modules\Blog\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (!Auth::user()->can('blogs.delete')) {
            return abort(403, __('User does not have the right permissions.'));
        }
        if ($blog->image != null) {
            $image_file = @file_get_contents(public_path() . '/image/blog/' . $blog->image);
            if ($image_file) {
                unlink(public_path() . '/image/blog/' . $blog->image);
            }
        }
        $blog->delete();
        toastr()->error(__('Blog has been deleted'));
        return back();
    }
    /**
     * Bulk remove the specified blog from storage.
     *
     * @param  \App\modules\Blog\Models\Blog  $blog
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
            $blog = Blog::find($checked);
            $blog->delete();
        }
        toastr()->error(__('Selected Blog has been deleted.'));
        return back();
    }
    /**
     * Update the status of specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modules\Blog\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function status_update(Request $request, $id)
    {
        $blog = Blog::findOrFail(strip_tags($id));
        $input = array_filter($request->all());
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        $blog->update($input);
        toastr()->info(__('blog status has been changed'));
        return back()->with('updated', __('Blog status has been changed'));
    }
    /**
     * This function is used to display all blog.
     *
     * @param $request
     * @return Renderable
     */
    public function blog()
    {
        $blog = Blog::where('is_active', '1')->get();
        return view('Blog::front.blog', compact('blog'));
    }
    /**
     * This function is used to display all blogdetail.
     *
     * @param $request
     * @return Renderable
     */
    public function blogdetail($slug)
    {
        $blog = Blog::where('is_active', '1')->where('slug', $slug)->first();
        return view('Blog::front.blogdetail', compact('blog'));
    }
}
