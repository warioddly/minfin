<?php

namespace App\Services;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    public function validateData($documents, $id, $type='post'){
        foreach ($documents as $document){
            $name = md5(Carbon::now() . "_" . $document->getClientOriginalName()) . '.' . $document->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('/files/shares/Документы', $document, $name);

            if($type == 'post'){
                Document::create([
                    'title' => $document->getClientOriginalName(),
                    'extension' => $document->getClientOriginalExtension(),
                    'post_id' => $id,
                    'icon' => $document->getClientOriginalExtension(),
                    'path' => '/storage/files/shares/Документы/' . $name,
                    'author' => auth()->user()['name'] ?? '',
                    'size' => $document->getSize(),
                ]);
            }
            else{
                Document::create([
                    'title' => $document->getClientOriginalName(),
                    'extension' => $document->getClientOriginalExtension(),
                    'appeal_of_citizens_id' => $id,
                    'icon' => $document->getClientOriginalExtension(),
                    'path' => '/storage/files/shares/Документы/' . $name,
                    'author' => auth()->user()['name'] ?? '',
                    'size' => $document->getSize(),
                ]);
            }
        }
    }
}
