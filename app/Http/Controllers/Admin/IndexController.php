<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notes;
use App\Models\Post;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(){
        $postsCount = Post::all()->count();
        $categoryCount = Category::all()->count();
        $popularPosts = Post::where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();

        $revenueMonth = Post::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get();
        $viewCountCurrentMonth = Post::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString()
        )->get()->sum('views');

        $viewsPercent = count($revenueMonth) / $viewCountCurrentMonth * 100;

        $notes = Notes::where('user_id', auth()->user()['id'])->latest()->get();

        return view('admin.index', compact('postsCount', 'categoryCount', 'viewsPercent', 'notes', 'popularPosts'));
    }
}
