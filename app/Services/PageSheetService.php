<?php

namespace App\Services;


use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PageSheetService
{

    public function validateData($request, $store = false){
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        unset($data['documents']);

        if($store){
            $parentPage = Page::find($request['page_id']);
            if($parentPage->type != 2){
                $parentPage->update([
                    'type' => 2
                ]);
            }
            else{
                throw ValidationException::withMessages([__('Cannot be added because data already exists')]);
            }
        }

        if($data['icon'] == null){
            unset($data['icon']);
        }

        $data['user_id'] = auth()->user()['id'];
        $data['sheet'] = true;
        return $data;
    }
}
