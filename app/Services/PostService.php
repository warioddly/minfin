<?php

namespace App\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class PostService
{

    public function validateData($request, $id, $parentId = null){
        $data = $request->all();

        if($request->hasFile('preview_image')) {
            $image = $data['preview_image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Новости/', $image, $name);
            $data['preview_image'] =  url('/storage/' . $filepath);
        }

        if(array_key_exists('is_published', $data)){
            if($data['is_published'] == 'on'){
                $data['is_published'] = true;
            }
        }

        if($id != null){
            $data['page_id'] = $id;
        }
        else{
            $data['page_id'] = $parentId;
        }
        $data['user_id'] = auth()->user()['id'];

        return $data;
    }

    public function validateUpdateData($request, $id){
        $data = $request->all();

        if($request->hasFile('preview_image')) {
            $image = $data['preview_image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Новости/', $image, $name);
            $data['preview_image'] =  url('/storage/' . $filepath);
        }

        if(array_key_exists('is_published', $data)){
            if($data['is_published'] == 'on'){
                $data['is_published'] = true;
            }
        }

        return $data;
    }

    public function userRoleSync($request, $user)
    {
        $roles = Role::whereIn('id', $request->roles)->get();

        $user->syncRoles($roles);
    }

}
