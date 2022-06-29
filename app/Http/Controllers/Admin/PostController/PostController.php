<?php

namespace App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use App\Services\CheckPermissionService;

class PostController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $posts = Post::where('sheet', 0)->latest()->get();

        $is_published = 'all';

        $userCanActions = $permissionService->permissionsInPosts();

        return view('admin.posts.index', compact('posts', 'is_published', 'userCanActions'));
    }

    public function PublishedPosts(CheckPermissionService $permissionService, $is_published){
        if($is_published == 'published'){
            $posts = Post::where('sheet', 0)->where('is_published', 1)->latest()->get();
            $is_published = 1;
        }
        else{
            $posts = Post::where('sheet', 0)->where('is_published', 0)->latest()->get();
            $is_published = 0;
        }
        $userCanActions = $permissionService->permissionsInPosts();

        return view('admin.posts.index', compact('posts', 'is_published', 'userCanActions'));
    }

    public function Show($id){
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    public function Edit($id){
        $post = Post::find($id);
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();

        return view('admin.posts.edit', compact('post', 'categories', 'publishers'));
    }

    public function Publish($id){
        $post = Post::find($id);

        $data = $post->toArray();
        $data['is_published'] = true;

        $post->update($data);

        return redirect()->back();
    }
}
