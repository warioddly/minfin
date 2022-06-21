<?php


namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserService
{

    public function validateData($request){
        $data = $request->all();

        if($request->hasFile('avatar')) {
            $image = $data['avatar'];
            $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filepath = Storage::disk('public')->putFileAs('/files/shares/Аватар', $image, $name);
            $data['avatar'] = '/storage/' . $filepath;
        }

        unset($data['roles']);

        if(array_key_exists('password', $data) && $data['password'] != null){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }

        return $data;
    }

    public function userRoleSync($request, $user)
    {
        $roles = Role::whereIn('id', $request->roles)->get();

        $user->syncRoles($roles);
    }

}
