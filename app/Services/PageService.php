<?php

namespace App\Services;


use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PageService
{

    public function validateData($request, $id){
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);

        if($request->hasFile('icon')) {
            $image = $data['icon'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Иконки Страниц/', $image, $name);
            $data['icon'] =  url('/storage/' . $filepath);
        }

        $parentPage = Page::find($id);

        if($parentPage->level + 1 != 3 && $parentPage->level != 3){
            $data['level'] = $parentPage->level + 1;
        }
        else{
            $data['level'] = 3;
        }

        $data['parent_id'] = $id;

        return $data;
    }
}
