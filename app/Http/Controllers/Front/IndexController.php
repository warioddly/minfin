<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Page;
use App\Models\Post;

class IndexController extends Controller
{
    public function Index(){
        $posts = Post::where('is_published', true)->get();
        $pages = Page::where('parent_id', null)->get();
        $carouselItems = CarouselItem::latest()->get();
        return view('front.index', compact('posts', 'pages', 'carouselItems'));
    }
}
