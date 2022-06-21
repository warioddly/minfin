<?php

namespace App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostSheetRequest;
use App\Models\Page;
use App\Models\Post;
use App\Services\DocumentService;
use App\Services\PageSheetService;
use JoeDixon\Translation\Drivers\Translation;

class PageSheetController extends Controller
{

    public function Show($id){
        $sheet = Post::findOrFail($id);

        return view('admin.pages.sheets.show', compact('sheet'));
    }

    public function Create($parentId){
        return view('admin.pages.sheets.create', compact('parentId'));
    }

    public function Store(Translation $translation, PostSheetRequest $request, PageSheetService $sheetService,  DocumentService $documentService){
        $data = $sheetService->validateData($request, true);
        $sheet = Post::create($data);

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $sheet->id);
        }

//        $translation->addGroupTranslation(session('locale'), 'sheet-description', $request->get('description'), $request->get('description'));
//        $translation->addGroupTranslation(session('locale'), 'sheet-content', $request->get('content'), $request->get('content'));
//        $translation->addGroupTranslation(session('locale'), 'sheet-title', $request->get('title'), $request->get('title'));

        return redirect()->route('page-sheet-show', $sheet->id);
    }

    public function Edit($id){
        $sheet = Post::findOrFail($id);
        return view('admin.pages.sheets.edit', compact('sheet'));
    }

    public function Update(PostSheetRequest $request, PageSheetService $sheetService,  DocumentService $documentService, $id){
        $data = $sheetService->validateData($request, );
        Post::whereId($id)->update($data);

        if($request->hasFile('documents')) {
            $documentService->validateData($request['documents'], $id);
        }

        return redirect()->route('page-sheet-show', $id);
    }

    public function Delete($id){
        $sheet = Post::find($id);

        $page = Page::findOrFail($sheet->page_id);

        $sheet->delete();

        if($page->type == 2){
            $sheet->update([
                'type' => 0
            ]);
        }

        Post::whereId($id)->delete();

        return redirect()->route('show-pages', $page->id)->with('status', __('Page successfully deleted'));
    }

}
