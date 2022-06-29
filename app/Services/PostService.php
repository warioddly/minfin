<?php

namespace App\Services;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class PostService
{
    public function validateData($request, $id, $parentId = null){
        $data = $request->all();
        unset($data['documents']);
        unset($data['galleries']);

        if($request->hasFile('preview_image')) {
            $image = $data['preview_image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Новости', $image, $name);
            $data['preview_image'] =  '/storage/' . $filepath;
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

    public function validateUpdateData($request){
        $data = $request->all();
        unset($data['documents']);
        unset($data['galleries']);

        if($request->hasFile('preview_image')) {
            $image = $data['preview_image'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Новости', $image, $name);
            $data['preview_image'] =  '/storage/' . $filepath;
        }

        if(array_key_exists('is_published', $data)){
            if($data['is_published'] == 'on'){
                $data['is_published'] = true;
            }
        }else{
            $data['is_published'] = false;
        }

        return $data;
    }

    public function userRoleSync($request, $user)
    {
        $roles = Role::whereIn('id', $request->roles)->get();

        $user->syncRoles($roles);
    }

    public function putGalleryImages($images, $id){
        $dir = 'files/shares/Новости/Пост-' . $id;

        if(!File::exists('storage/' . $dir)){
            File::makeDirectory('storage/' . $dir);
        }

        if(!File::exists('storage/' . $dir . '/thumbs/')){
            File::makeDirectory( 'storage/' . $dir . '/thumbs/');
        }

        $data['post_id'] = $id;

        foreach ($images as $image){
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs($dir, $image, $name);

            try {

                Image::make(Storage::disk('public')->get($filepath))
                    ->resize(320, 240)
                    ->save('storage/' . $dir . '/thumbs/thumb_' . $name);

                $data['full_size_image'] = '/storage/' . $filepath;
                $data['thumbnail_image'] = '/storage/' . $dir . '/thumbs/thumb_' . $name;
                $data['size'] = $image->getSize();
                $data['title'] = $image->getClientOriginalName();

                Gallery::create($data);

            }
            catch (\Exception $exception){
                //
            }
        }

    }

}
