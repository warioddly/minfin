<?php

namespace App\Services;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DocumentService
{

    public function validateData($documents, $post_id){
        foreach ($documents as $document){
            $name = md5(Carbon::now() . "_" . $document->getClientOriginalName()) . '.' . $document->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('/files/shares/Документы', $document, $name);
            $filepath = url('storage/files/shares/Документы/' . $name);

            Document::create([
                'title' => $document->getClientOriginalName(),
                'extension' => $document->getClientOriginalExtension(),
                'post_id' => $post_id,
                'icon' => $document->getClientOriginalExtension(),
                'path' => $filepath,
                'author' => auth()->user()['name'],
                'size' => $document->getSize(),
            ]);
        }
    }
}
