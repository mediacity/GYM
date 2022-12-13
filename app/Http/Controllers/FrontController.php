<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontController extends Controller
{
    public function blog_details($id)
    {
        $data['blog'] = Blog::where('id',$id)->first();
        return view('front.blog_detail',$data);
    }
}
