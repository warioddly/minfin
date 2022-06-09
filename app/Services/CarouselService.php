<?php

namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class CarouselService
{

    public function validateData($request){
        $data = $request->all();

        if($request->hasFile('image')) {
            $image = $data['image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Разные/', $image, $name);
            $data['path'] =  url('/storage/' . $filepath);
        }

        unset($data['image']);
        unset($data['_token']);
        unset($data['_method']);

        return $data;
    }
}
