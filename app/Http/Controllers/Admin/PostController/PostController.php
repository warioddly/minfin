<?php

namespace App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostTranslate;
use App\Models\Tag;
use App\Services\CheckPermissionService;
use App\Services\DocumentService;
use App\Services\PostService;
use App\Services\PostTranslateService;
use App\Services\TranslateService;

class PostController extends Controller
{
    public function Index(TranslateService $translateService, CheckPermissionService $permissionService){
        $posts = Post::where('sheet', 0)->latest()->paginate(20);
        $dataPosts = Post::where('sheet', 0)->latest()->get();

        $is_published = 'all';

        $userCanActions = $permissionService->permissionsInPosts();
        $translateService->translatePosts($posts);
        $translateService->translatePosts($dataPosts);

        return view('admin.posts.index', compact('posts', 'is_published', 'userCanActions', 'dataPosts'));
    }

    public function PublishedPosts(TranslateService $translateService, CheckPermissionService $permissionService, $is_published){
        if($is_published == 'published'){
            $posts = Post::where('sheet', 0)->where('is_published', 1)->latest()->paginate(20);
            $is_published = 1;
        }
        else{
            $posts = Post::where('sheet', 0)->where('is_published', 0)->latest()->paginate(20);
            $is_published = 0;
        }
        $dataPosts = Post::where('sheet', 0)->latest()->get();

        $userCanActions = $permissionService->permissionsInPosts();
        $translateService->translatePosts($posts);
        $translateService->translatePosts($dataPosts);

        return view('admin.posts.index', compact('posts', 'is_published', 'userCanActions', 'dataPosts'));
    }

    public function Show(TranslateService $translateService, $id){
        $post = Post::find($id);
        $translateService->translate($post);
        return view('admin.posts.show', compact('post', ));
    }

    public function Edit($id){
        $post = Post::find($id);
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();
        $tags = Tag::latest()->get();
        $tagIds = $post->tags()->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'publishers', 'tags', 'tagIds'));
    }

    public function Publish($id){
        $post = Post::find($id);

        $data = $post->toArray();
        $data['is_published'] = true;

        $post->update($data);

        return redirect()->back();
    }

    public function Create(){
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();
        $tags = Tag::latest()->get();
        $pages = Page::query()
            ->where('type', '!=', 2)
            ->where('parent_id', '!=', null)
            ->get();

        $parentId = -1;

        return view('admin.pages.posts.create', compact('categories','tags', 'publishers', 'parentId', 'pages'));
    }
}
