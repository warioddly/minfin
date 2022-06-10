<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Page;
use App\Models\Post;

class PostController extends Controller
{
    public function Show($id){
        $post = Post::find($id);
        return view('front.posts.show', compact('post'));
    }
}
