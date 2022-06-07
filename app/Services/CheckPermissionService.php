<?php


namespace App\Services;


class CheckPermissionService
{

    public function permissionsInCategories(): array
    {
        $userPermissions = [null, null, null];

        if(auth()->user()->can('edit-categories')){
            $userPermissions[1] = 2;
        }
        if(auth()->user()->can('delete-categories')){
            $userPermissions[2] = 3;
        }

        return $userPermissions;
    }

    public function permissionsInPosts(): array
    {
        $userPermissions = [null, null, null];

        if(auth()->user()->can('show-posts')){
            $userPermissions[0] = 1;
        }
        if(auth()->user()->can('edit-posts')){
            $userPermissions[1] = 2;
        }
        if(auth()->user()->can('delete-posts')){
            $userPermissions[2] = 3;
        }

        return $userPermissions;
    }

    public function permissionsInUsers(): array
    {
        $userPermissions = [null, null, null];

        if(auth()->user()->can('edit-users')){
            $userPermissions[1] = 2;
        }
        if(auth()->user()->can('delete-users')){
            $userPermissions[2] = 3;
        }

        return $userPermissions;
    }

    public function permissionsInRoles(): array
    {
        $userPermissions = [null, null, null];

        if(auth()->user()->can('edit-roles')){
            $userPermissions[1] = 2;
        }
        if(auth()->user()->can('delete-roles')){
            $userPermissions[2] = 3;
        }

        return $userPermissions;
    }

    public function permissionsInPages(): array
    {
        $userPermissions = [null, null, null];

        if(auth()->user()->can('edit-pages')){
            $userPermissions[1] = 2;
        }
        if(auth()->user()->can('delete-pages')){
            $userPermissions[2] = 3;
        }

        return $userPermissions;
    }

}
