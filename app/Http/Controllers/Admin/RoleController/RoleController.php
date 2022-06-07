<?php

namespace App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\CheckPermissionService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $roles = Role::where('name', '!=', 'super user')->get();
        $permissions = Permission::all();
        $userCanActions = $permissionService->permissionsInRoles();

        return view('admin.roles.index', compact('roles', 'permissions', 'userCanActions'));
    }

    public function Store(RoleRequest $request){

        $newRole = Role::create([
            'name' => $request->name
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $newRole->syncPermissions($permissions);

        return redirect()->back()->with('status', __('Role added successfully'));
    }

    public function Update(RoleRequest $request, $id){

        $role = Role::find($id);

        $role->update([
            'name' => $request->name
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $role->syncPermissions($permissions);

        return redirect()->back()->with('status', __('Role updated successfully'));
    }
}
