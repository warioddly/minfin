<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Services\TranslateService;

class TagController extends Controller
{
    public function Show(TranslateService $translateService, $id){
        $tag = Tag::findOrFail($id);
        $postIds = PostTag::where('tag_id', $id)->get()->pluck('post_id');

        $posts = Post::whereIn('id', $postIds)->where('sheet', false)->where('is_published', true)->latest()->paginate(10);
        $translateService->translatePosts($posts);

        return view('front.vendor.tag', compact('tag', 'posts'));
    }
}
