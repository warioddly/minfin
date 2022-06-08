<?php

namespace App\Http\Controllers\Admin\DocumentController;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Services\CheckPermissionService;

class DocumentController extends Controller
{
    public function Index(){
        $documents = Document::latest()->get();
        $userCanActions = [3];

        return view('admin.documents.index', compact( 'documents', 'userCanActions'));
    }
}
