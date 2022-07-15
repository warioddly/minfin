<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CarouselItem;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Services\PageFrontService;
use App\Services\TranslateService;

class IndexController extends Controller
{
    public function Index(TranslateService $translateService, PageFrontService $frontService){
        $posts = Post::where('is_published', true)->latest()->get();
        $pages = Page::where('parent_id', null)->get();
        $selectedMainPages = Page::where('visible_on_main_page', 1)->get();
        $carouselItems = CarouselItem::latest()->get();
        $banner = Banner::first();

        $ministerPage = $frontService->getAllChildPages(Page::find(1), null);
        $ministerPosts = Post::whereIn('page_id', $ministerPage)
            ->where('is_published', true)
            ->where('sheet', false)
            ->latest()
            ->get();

        $translateService->translatePosts($posts);
        $translateService->translatePosts($ministerPosts);

        return view('front.index', compact('posts', 'ministerPosts', 'pages', 'carouselItems', 'selectedMainPages', 'banner'));
    }

    public function Search(TranslateService $translateService){
        $search = request()->get('query');

        $posts = Post::where('title', 'LIKE', "%{$search}%")->paginate(9);
        $pages = Page::where('title', 'LIKE', "%{$search}%")->get();
        $categories = Category::where('title', 'LIKE', "%{$search}%")->get();

        $translateService->translatePosts($posts);

        return view('front.vendor.search', compact('posts', 'pages', 'categories', 'search'));
    }
}
