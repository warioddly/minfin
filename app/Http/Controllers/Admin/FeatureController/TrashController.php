<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\AppealOfCitizens;
use App\Models\Banner;
use App\Models\CarouselItem;
use App\Models\Category;
use App\Models\Document;
use App\Models\MinFinContact;
use App\Models\Page;
use App\Models\Post;
use App\Models\SocialWebSites;

class TrashController extends Controller
{
    public function index(){
        $posts = Post::latest()->onlyTrashed()->get();
        $categories = Category::latest()->onlyTrashed()->get();
        $documents = Document::latest()->onlyTrashed()->get();
        $appeals = AppealOfCitizens::latest()->onlyTrashed()->get();
        $pages = Page::latest()->onlyTrashed()->get();

        return view('admin.trash.index', compact('posts', 'pages', 'categories', 'documents', 'appeals'));
    }

}
