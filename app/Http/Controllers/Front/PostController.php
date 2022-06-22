<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Page;
use App\Models\Post;

class PostController extends Controller
{
    public function Show($id){
        $post = Post::findOrFail($id);

        $post->increment('views', 1);

        return view('front.posts.show', compact('post'));
    }

    public function Index(){
        $posts = Post::where('sheet', false)->latest()->paginate(23);

        return view('front.posts.index', compact('posts'));
    }
}
