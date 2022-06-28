<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensRequest;
use App\Models\AppealOfCitizens;
use App\Models\Category;
use App\Models\Post;
use App\Services\DocumentService;
use Carbon\Carbon;

class ArchiveController extends Controller
{
    public function Index(){
        $posts = Post::where('sheet', false)->latest()->paginate(23);
        return view('front.vendor.archive', compact('posts'));
    }

    public function ShowWithMonth(){
        $month = request()->get('month');
        $year = request()->get('year');
        $posts = Post::latest()
            ->filter(['month' => $month, 'year' => $year])
            ->paginate(23);

        return view('front.vendor.archive', compact('posts'));
    }
}
