<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        $pages = Page::all();
        return view('front.index', compact('posts', 'pages'));
    }
}
