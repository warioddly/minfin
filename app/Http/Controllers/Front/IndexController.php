<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CarouselItem;
use App\Models\Page;
use App\Models\Post;
use App\Services\TranslateService;

class IndexController extends Controller
{
    public function Index(TranslateService $translateService){
        $posts = Post::where('is_published', true)->latest()->get();
        $pages = Page::where('parent_id', null)->get();
        $selectedMainPages = Page::where('visible_on_main_page', 1)->get();
        $carouselItems = CarouselItem::latest()->get();
        $banner = Banner::first();

        $translateService->translatePosts($posts);

        return view('front.index', compact('posts', 'pages', 'carouselItems', 'selectedMainPages', 'banner'));
    }
}
