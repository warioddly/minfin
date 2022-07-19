<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppealOfCitizens;
use App\Models\Category;
use App\Models\Document;
use App\Models\Notes;
use App\Models\Page;
use App\Models\Post;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(){
        $postsCount = Post::all()->count();
        $categoryCount = Category::where('publisher', true)->get()->count();
        $documentCount = Document::all()->count();
        $latestCategory = Category::where('publisher', true)->latest()->first();
        $popularPosts = Post::where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();
        $appeals = AppealOfCitizens::latest()->take(7)->get();
        $notes = Notes::where('user_id', auth()->user()['id'])->latest()->get();
        $latestPage = Page::latest()->first();
        $posts = Post::all();

        $calendarData = [];
        foreach ($posts as $post) {
            $calendarData[] = [
                'start' => $post->created_at->format('Y-m-d'),
                'title' => $post->title,
                'url' => route('post-show', $post->id),
                'color' => '#5b78be'
            ];
        }

        $revenueMonth = Post::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get();
        $viewCountCurrentMonth = Post::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get()->sum('views');

        $postViewsCount =  Post::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get()->sum('views');

        $viewsPercent = 0;
        if(count($revenueMonth) != 0 && $viewCountCurrentMonth != 0){
            $viewsPercent = count($revenueMonth) / $viewCountCurrentMonth * 100;
        }

        return view('admin.index', compact('postsCount', 'categoryCount',
            'viewsPercent', 'notes', 'popularPosts', 'appeals', 'latestCategory',
            'documentCount', 'latestPage', 'calendarData', 'postViewsCount'
        ));
    }
}
