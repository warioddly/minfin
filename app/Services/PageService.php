<?php

namespace App\Services;


use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PageService
{

    public function validateData($request, $id, $child = true){
        $data = $request->all();

        if($request->hasFile('image')) {
            $image = $data['image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Иконки Страниц/', $image, $name);
            $data['icon'] =  '/storage/' . $filepath;
            $data['icon_type'] =  'image';
        }
        else{
            $data['icon_type'] =  'mdi';
        }

        if($data['icon'] == null || $data['icon'] == ''){
            unset($data['icon']);
        }

        unset($data['image']);
        unset($data['_token']);
        unset($data['_method']);

        if($child){
            if(isset($data['parent_id'])){
                $movetoPage = Page::find($data['parent_id']);

                if($movetoPage->level + 1 != 4 && $movetoPage->level != 4){
                    $data['level'] = $movetoPage->level + 1;
                }
                else{
                    $data['level'] = 4;
                }

                $movetoPage->update(['type' => 1]);
            }
            else{
                $parentPage = Page::find($id);
                if($parentPage->level + 1 != 4 && $parentPage->level != 4){
                    $data['level'] = $parentPage->level + 1;
                }
                else{
                    $data['level'] = 4;
                }
                if(!isset($data['parent_id'])){
                    $data['parent_id'] = $id;
                }
            }
        }

        return $data;
    }
}
