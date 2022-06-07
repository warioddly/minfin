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
            $data['avatar'] =  url('/storage/' . $filepath);
        }

        unset($data['roles']);

        if(array_key_exists('password', $request->all())){
            $data['password'] = Hash::make($data['password']);
        }

        return $data;
    }

    public function userRoleSync($request, $user)
    {
        $roles = Role::whereIn('id', $request->roles)->get();

        $user->syncRoles($roles);
    }

}
