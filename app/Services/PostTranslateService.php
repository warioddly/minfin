<?php

namespace App\Services;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class PostTranslateService
{
    public function validateData($request, $id){
        $data = $request->all();
        unset($data['_token']);
        unset($data['documents']);
        unset($data['galleries']);
        unset($data['category_id']);
        unset($data['publisher_id']);
        unset($data['is_published']);
        unset($data['preview_image']);
        unset($data['page_id']);
        unset($data['_method']);
        $data['post_id'] = $id;

        return $data;
    }
}
