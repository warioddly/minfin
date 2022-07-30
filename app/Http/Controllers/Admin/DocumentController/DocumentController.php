<?php

namespace App\Http\Controllers\Admin\DocumentController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\Page;
use App\Models\Tag;
use App\Services\CheckPermissionService;
use App\Services\DocumentService;

class DocumentController extends Controller
{
    public function Index(){
        $documents = Document::latest()->get();
        $userCanActions = [3];

        return view('admin.documents.index', compact( 'documents', 'userCanActions'));
    }

    public function Create(){
        $categories = Category::where('publisher', false)->latest()->get();
        $publishers = Category::where('publisher', true)->latest()->get();
        $tags = Tag::latest()->get();
        $pages = Page::query()
            ->where('type', '!=', 2)
            ->where('parent_id',  null)
            ->get();

        return view('admin.documents.create', compact('categories', 'tags', 'publishers', 'pages'));
    }

    public function Store(DocumentService $documentService){
        $data = request()->all();

        $documentService->validateData($data['documents'], null, 'documents', $data);

        $documents = Document::latest()->get();
        $userCanActions = [3];

        return view('admin.documents.index', compact( 'documents', 'userCanActions'));
    }
}
