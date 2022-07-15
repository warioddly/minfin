<?php

namespace App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostTranslate;
use App\Models\Tag;
use App\Services\CheckPermissionService;
use App\Services\DocumentService;
use App\Services\PostService;
use App\Services\PostTranslateService;
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

        $moveToPages = Page::query()
            ->where('level', '!=', 4)
            ->where('type', '!=', 3)
            ->get();

        return view('admin.pages.show', compact('page', 'userCanActions',
            'ChildPages', 'parentId', 'parentPages', 'is_published', 'posts', 'moveToPages'));
    }

    public function Create($parentId){
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();
        $tags = Tag::latest()->get();
        $pages = Page::query()
            ->where('type', '!=', 2)
            ->where('parent_id', '!=', null)
            ->get();

        return view('admin.pages.posts.create', compact('categories', 'tags', 'publishers', 'parentId', 'pages'));
    }

    public function Store(PostRequest $request, PostService $postService, DocumentService $documentService, PostTranslateService $translateService, $parentId){

        if($parentId == '-1'){
            $parentId = $request->page_id;
        }

        $data = $postService->validateData($request, $request->route('id'), $parentId);

        Page::whereId($parentId)->update(['type' => 3 ]);
        $lastCreatedPostId = Post::create($data)->id;

        $tags = $request->get('tags');

        foreach($tags as $tag){
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $lastCreatedPostId
            ]);
        }

        $translateData = $translateService->validateData($request, $lastCreatedPostId);

        PostTranslate::create($translateData);

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $lastCreatedPostId);
        }
        if($request->hasFile('galleries')) {
            $postService->putGalleryImages($request['galleries'], $lastCreatedPostId);
        }

        return redirect()->route('show-pages', $parentId);
    }

    public function Update(PostRequest $request, PostService $postService,  DocumentService $documentService, PostTranslateService $translateService, $id){
        $post = Post::find($id);
        $data = $postService->validateUpdateData($request);
        $post->update($data);

        $tags = $request->get('tags');
        PostTag::where('post_id', $id)->delete();

        foreach($tags as $tag){
            PostTag::create([
                'tag_id' => $tag,
                'post_id' => $id
            ]);
        }

        $translateData = $translateService->validateData($request, $id);

        $translates = PostTranslate::where('post_id', $id)->first();
        if($translates == null || $translates == []){
            PostTranslate::create($translateData);
        }
        else{
            $translates->update($translateData);
        }

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $id);
        }

        if($request->hasFile('galleries')) {
            $postService->putGalleryImages($request['galleries'], $id);
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
