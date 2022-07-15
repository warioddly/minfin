<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ArchiveController extends Controller
{
    public function Index(){
        $posts = Post::where('sheet', false)->where('is_published', 1)->latest()->paginate(23);
        return view('front.vendor.archive', compact('posts'));
    }

    public function ShowWithMonth(){
        $month = request()->get('month');
        $year = request()->get('year');
        $posts = Post::where('is_published', 1)
            ->latest()
            ->filter(['month' => $month, 'year' => $year])
            ->paginate(23);

        return view('front.vendor.archive', compact('posts'));
    }
}
