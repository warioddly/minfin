<?php

namespace App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use App\Models\Post;
use App\Services\CheckPermissionService;
use App\Services\PageFrontService;
use App\Services\PageService;
use JoeDixon\Translation\Drivers\Translation;

class PageController extends Controller
{
    public function Index(CheckPermissionService $permissionService){

        $pages = Page::where('parent_id', null)->get();
        $userCanActions = $permissionService->permissionsInPages();

        if($userCanActions[2] == 3 || $userCanActions[2] != null){
            $userCanActions[2] = null;
        }

        return view('admin.pages.index', compact('pages', 'userCanActions'));
    }

    public function Show(CheckPermissionService $permissionService, $parentId){
        $page = Page::findOrFail($parentId);

        if($page->type == 2){
            $sheet = Post::where('page_id', $page->id)->first();

            if($sheet != null || $sheet != []){
                return redirect()->route('page-sheet-show', $sheet->id);
            }
            else{
                $page->update([
                    'type' => 0,
                ]);
            }
        }

        $moveToPages = Page::query()
            ->where('level', '!=', 4)
            ->where('type', '!=', 3)
            ->get();

        $parentPages = Page::where('parent_id', null)->get();
        $ChildPages = Page::where('parent_id', $parentId)->get();
        $posts = Post::where('page_id', $parentId)->get();
        $is_published = 'all';

        $userCanActions = $permissionService->permissionsInPages();

        return view('admin.pages.show', compact('page', 'userCanActions',
            'ChildPages', 'parentId', 'parentPages', 'is_published', 'posts', 'moveToPages'));
    }

    public function DirectoryStore(Translation $translation, PageStoreRequest $request, PageService $service, $parentId){

        $data = $service->validateData($request, $parentId);
        Page::create($data);
        Page::where('id', $parentId)->update(['type' => 1]);

        $translation->addGroupTranslation('ru', 'single', $data['title'], $data['title']);

        return redirect()->back()->with('status', __('Page successfully created'));
    }

    public function DirectoryUpdate(PageUpdateRequest $request, PageService $service, $parentId){

        $page = Page::find($request->route('id'));
        $parentPage = Page::find($page->parent_id);

        $data = $service->validateData($request, $parentId);
        Page::where('id', $request->route('id'))->update($data);

        if(count($parentPage->posts) == 0 && count($parentPage->ChildPages) == 0){
            $parentPage->update(['type' => 0 ]);
        }

        return redirect()->back()->with('status', __('Page successfully created'));
    }

    public function DirectoryParentUpdate(PageUpdateRequest $request, PageService $service){

        $data = $service->validateData($request, null, false);
        Page::where('id', $request->route('id'))->update($data);

        return redirect()->back()->with('status', __('Page successfully created'));
    }

}
