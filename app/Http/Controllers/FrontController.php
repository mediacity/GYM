<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Pages;
use App\Models\PrivacyPolicy;
use App\Models\TermCondition;

class FrontController extends Controller
{
    public function blog_details($id)
    {
        $blog = Blog::where('id',$id)->first();
        $data['blog'] = $blog;
        $data['relevant_blogs'] = Blog::where('blog_cat_id',$blog?$blog->blog_cat_id:'')->where('id', '!=' , $id)->get();
        return view('front.blog_detail',$data);
    }

    public function privacy_policy()
    {    
        $data['page'] = PrivacyPolicy::first();  
        return view('front.page',$data);
    }

    public function terms_condition()
    {    
        $data['page'] = TermCondition::first();  
        return view('front.page',$data);
    }
}
