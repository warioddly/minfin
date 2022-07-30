<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensRequest;
use App\Models\AppealOfCitizens;
use App\Models\Category;
use App\Models\Document;
use App\Models\Page;
use App\Models\Post;
use App\Services\DocumentService;
use App\Services\PageFrontService;
use App\Services\TranslateService;

class PageController extends Controller
{
    public function Index(){
        $pages = Page::all();

        return view('front.pages.index', compact('pages'));
    }

    public function Show(TranslateService $translateService, PageFrontService $service, $id){
        $page = Page::findOrFail($id);

        if($page->type == 2){
            $sheet = Post::where('page_id', $page->id)->take(1)->get()[0];
            return redirect()->route('front-sheet-show', $sheet->id);
        }

        $childPagesIds = $service->getAllChildPages($page, null);

        $posts = Post::whereIn('page_id', array_merge($childPagesIds, [$page->id]))->where('sheet', false)->where('is_published', true)->latest()->paginate(10);
        $translateService->translatePosts($posts);

        $documents = Document::where('page_id', $id)->get();

        $translateService->translateDocuments($documents);

        return view('front.pages.show', compact('page', 'posts', 'documents'));
    }

    public function ShowSheet($id){
        $sheet = Post::find($id);

        return view('front.pages.showSheet', compact('sheet'));
    }

    public function Contacts(){
        return view('front.vendor.contacts');
    }

}
