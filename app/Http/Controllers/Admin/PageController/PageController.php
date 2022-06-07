<?php

namespace App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use App\Models\Post;
use App\Services\CheckPermissionService;
use App\Services\PageService;

class PageController extends Controller
{
    public function Index(CheckPermissionService $permissionService){

        $pages = Page::where('parent_id', null)->get();
        $userCanActions = $permissionService->permissionsInPages();

        return view('admin.pages.index', compact('pages', 'userCanActions'));
    }

    public function Show(CheckPermissionService $permissionService, $parentId){
        $page = Page::find($parentId);
        $parentPages = Page::where('parent_id', null)->get();
        $ChildPages = Page::where('parent_id', $parentId)->get();
        $posts = Post::where('page_id', $parentId)->get();
        $is_published = 'all';

        $userCanActions = $permissionService->permissionsInPages();

        return view('admin.pages.show', compact('page', 'userCanActions',
            'ChildPages', 'parentId', 'parentPages', 'is_published', 'posts'));
    }

    public function DirectoryStore(PageStoreRequest $request, PageService $service, $parentId){

        $data = $service->validateData($request, $parentId);
        Page::create($data);
        Page::where('id', $parentId)->update(['type' => 1]);

        return redirect()->back()->with('status', __('Page successfully created'));
    }

    public function DirectoryUpdate(PageUpdateRequest $request, PageService $service, $parentId){

        $data = $service->validateData($request, $parentId);
        Page::where('id', $request->route('id'))->update($data);

        return redirect()->back()->with('status', __('Page successfully created'));
    }

}
