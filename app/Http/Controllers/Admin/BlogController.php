<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin\{Category,Post,Tag};

class BlogController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->paginate(6);
        return view('frontpage.index',[
            'posts' => $posts
        ]);
    }
    public function index()
    {
//        dd("Oke");
        $posts = Post::latest()->simplePaginate(10)->withQueryString();
        return view('frontpage.blogs', [
            'posts' => $posts
        ]);
    }

    public function post()
    {
        $posts = Post::latest()->simplePaginate(10)->withQueryString();
        return view('frontpage.blogs',[
            'posts' => $posts
        ]);
    }

    public function detailBlogs($slug)
    {

        $time = Carbon::now();

        $posts = Post::publish()->with(['categories','tags'])->where('slug', $slug)->first();
        if(!$posts){
            return redirect()->route('blog.home');
        }
        return view('frontpage.detail_blog',[
            'posts'  => $posts,
            'time' => Carbon::now()
        ]);
    }



}
