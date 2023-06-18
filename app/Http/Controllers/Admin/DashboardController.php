<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Admin\Tag;
use App\Models\Admin\User;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::count();
        $posts = Post::all();
        $tag = Tag::count();
        $category = Category::count();
        $user = User::count();
        return view('administrator.dashboard.index',[
            'post' => $post,
            'tag' => $tag,
            'category' => $category,
            'users' => $user,
            'posts' => $posts
        ]);
    }
}
