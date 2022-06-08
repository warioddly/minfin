<?php

namespace App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Services\CheckPermissionService;
use App\Services\DocumentService;
use App\Services\PostService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $posts = Post::latest()->get();
        $is_published = 'all';

        $userCanActions = $permissionService->permissionsInPosts();

        return view('admin.posts.index', compact('posts', 'is_published', 'userCanActions'));
    }

    public function PublishedPosts(CheckPermissionService $permissionService, $is_published){
        if($is_published == 'published'){
            $posts = Post::where('is_published', 1)->get();
            $is_published = 1;
        }
        else{
            $posts = Post::where('is_published', 0)->get();
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
        $categories = Category::latest()->get();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function Publish($id){
        $post = Post::find($id);

        $data = $post->toArray();
        $data['is_published'] = true;

        $post->update($data);

        return redirect()->back();
    }
}
