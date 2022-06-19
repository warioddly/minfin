<?php

namespace App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Services\CheckPermissionService;
use App\Services\DocumentService;
use App\Services\PostService;
use JoeDixon\Translation\Drivers\Translation;

class PagePostController extends Controller
{
    public function PublishedPosts(CheckPermissionService $permissionService, $parentId, $is_published){
        $page = Page::find($parentId);
        $parentPages = Page::where('parent_id', null)->get();
        $ChildPages = Page::where('parent_id', $parentId)->get();

        $userCanActions = $permissionService->permissionsInPages();

        if($is_published == 'published'){
            $posts = Post::where('page_id', $parentId)->where('is_published', 1)->get();
            $is_published = 1;
        }
        else{
            $posts = Post::where('page_id', $parentId)->where('is_published', 0)->get();
            $is_published = 0;
        }

        return view('admin.pages.show', compact('page', 'userCanActions',
            'ChildPages', 'parentId', 'parentPages', 'is_published', 'posts'));
    }

    public function Create($parentId){
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();
        return view('admin.pages.posts.create', compact('categories', 'publishers', 'parentId'));
    }

    public function Store(Translation $translation, PostRequest $request, PostService $postService, DocumentService $documentService, $parentId){
        $data = $postService->validateData($request, $request->route('id'), $parentId);

        Page::whereId($parentId)->update(['type' => 3 ]);
        $lastCreatedPostId = Post::create($data)->id;

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $lastCreatedPostId);
        }

        $translation->addGroupTranslation(session('locale'), 'post-description', $request->get('description'), $request->get('description'));
        $translation->addGroupTranslation(session('locale'), 'post-content', $request->get('content'), $request->get('content'));
        $translation->addGroupTranslation(session('locale'), 'post-title', $request->get('title'), $request->get('title'));

        return redirect()->route('show-pages', $parentId);
    }

    public function Update(PostRequest $request, PostService $service,  DocumentService $documentService, $id){
        $post = Post::find($id);
        $data = $service->validateUpdateData($request, $id);
        $post->update($data);

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $id);
        }

        return redirect()->route('post-show', $request->id);
    }

    public function Publish($id){
        $post = Post::find($id);

        $data = $post->toArray();
        $data['is_published'] = true;

        $post->update($data);

        return redirect()->back();
    }

}
