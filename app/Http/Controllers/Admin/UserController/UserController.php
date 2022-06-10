<?php

namespace App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\CheckPermissionService;
use App\Services\UserService;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $users = User::where('email', '!=', 'admin@email.com')->get()->except([auth()->id()]);
        $roles = Role::where('name', '!=', 'super user')->get();

        $userCanActions = $permissionService->permissionsInUsers();

        return view('admin.users.index', compact('users', 'roles', 'userCanActions'));
    }

    public function Store(UserRequest $request, UserService $userService){

        $data = $userService->validateData($request);

        $user = User::create($data);
        $userService->userRoleSync($request, $user);

        return redirect()->back()->with('status', __('User added successfully'));
    }

    public function Update(UserUpdateRequest $request, UserService $userService, $id){
        $user = User::find($id);
        $data = $userService->validateData($request);
        $user->update($data);
        $userService->userRoleSync($request, $user);

        return redirect()->back()->with('status', __('User updated successfully'));
    }
}
