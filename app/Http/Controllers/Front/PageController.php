<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Services\PageFrontService;

class PageController extends Controller
{
    public function Index(){
        $pages = Page::all();

        return view('front.pages.index', compact('pages'));
    }

    public function Show(PageFrontService $service,$id){
        $page = Page::findOrFail($id);

        if($page->type == 2){
            $sheet = Post::where('page_id', $page->id)->take(1)->get()[0];
            return redirect()->route('front-sheet-show', $sheet->id);
        }

        $childPagesIds = $service->getAllChildPages($page, null);

        $posts = Post::whereIn('page_id', array_merge($childPagesIds, [$page->id]))->where('sheet', false)->where('is_published', true)->latest()->paginate(10);

        return view('front.pages.show', compact('page', 'posts'));
    }

    public function ShowSheet($id){
        $sheet = Post::find($id);

        return view('front.pages.showSheet', compact('sheet'));
    }

    public function Contacts(){
        return view('front.vendor.contacts');
    }

    public function AppealOfCitizens(){
        return view('front.appealofcitizens.appealofcitizens');
    }

    public function AskAQuestions(){
        $categories = Category::where('publisher', false)->get();
        return view('front.appealofcitizens.askaquestions', compact('categories'));
    }

    public function AppealQuestion(AppealOfCitizensRequest $request){
        dd($request->all());
        return view('front.appealofcitizens.askaquestions', compact('categories'));
    }
}
