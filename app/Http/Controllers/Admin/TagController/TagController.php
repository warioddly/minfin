<?php

namespace App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Services\CheckPermissionService;
use App\Services\TranslateService;
use JoeDixon\Translation\Drivers\Translation;

class TagController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $tags = Tag::latest()->get();
        $userCanActions = $permissionService->permissionsInTags();

        return view('admin.tags.index', compact('tags', 'userCanActions'));
    }

    public function Show(TranslateService $translateService, $id){
        $tag = Tag::findOrFail($id);
        $postIds = PostTag::where('tag_id', $id)->get()->pluck('post_id');

        $posts = Post::whereIn('id', $postIds)->where('sheet', false)->latest()->paginate(10);
        $popularPosts = Post::whereIn('id', $postIds)->where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();

        $translateService->translatePosts($posts);
        $translateService->translatePosts($popularPosts);

        return view('admin.tags.show', compact('tag', 'posts', 'popularPosts'));
    }

    public function Store(Translation $translation,TagRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];

        Tag::create($data);

        $translation->addGroupTranslation('ru', 'single', $data['title'], $data['title']);

        return redirect()->back()->with('status', __('Successfully created'));
    }

    public function Update(TagUpdateRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];
        Tag::find($request->id)->update($data);
        return redirect()->back()->with('status', __('Successfully updated'));
    }
}
