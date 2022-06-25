<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppealOfCitizens;
use App\Models\CarouselItem;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\SocialWebSites;
use App\Models\User;
use \App\Models\Document;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ApiController extends Controller
{
    public function getUser(){
        $user = User::find(request()->get('id'));
        $userRoles = [];

        $roles = Role::all();
        foreach ($roles as $role){
            if($user->hasRole($role->name)){
                $userRoles[] = $role->id;
            }
        }

        return response()->json(['user' => $user, 'roles' => $userRoles]);
    }

    public function getPermissions(){
        $role = Role::find(request()->get('id'));
        $permissions = Permission::all();
        $hasPermissions = [];

        foreach ($permissions as $permission){
            if($role->hasPermissionTo($permission->name)){
                $hasPermissions[] = $permission->id;
            }
        }

        return response()->json(['permissions' => $hasPermissions, 'role' => $role->name]);
    }

    public function getPageData(){
        $page = Page::find(request()->get('id'));

        return response()->json(['page' => $page]);
    }

    public function getSelectedPages(){
        $pages = Page::where('visible_on_main_page', 1)->pluck('id');

        return response()->json(['pages' => $pages]);
    }

    public function deleteRole(){
        $role = Role::find(request()->get('id'));

        $permissions = Permission::all();

        foreach ($permissions as $permission){
            if($role->hasPermissionTo($permission->name)){
                $role->revokePermissionTo($permission);
            }
        }

        $role->delete();
    }

    public function deleteUser(){
        User::whereId(request()->get('id'))->delete();
    }

    public function deletePost(){
        $post = Post::find(request()->get('id'));

        $parentPage = Page::find($post->page_id);

        $post->delete();

        if(count($parentPage->posts) == 0 && count($parentPage->ChildPages) == 0){
            $parentPage->update(['type' => 0 ]);
        }

    }

    public function deleteCategory(){
        $category = Category::find(request()->get('id'));
        $category->posts()->delete();
        $category->delete();
    }

    public function deletePage(){
        $page = Page::find(request()->get('id'));
        $parentPage = Page::find($page->parent_id);

        $page->posts()->delete();
        $page->delete();

        if(count($parentPage->posts) == 0 && count($parentPage->ChildPages) == 0){
            $parentPage->update(['type' => 0 ]);
        }
    }

    public function deleteDocument(){
        Document::whereId(request()->get('id'))->delete();
    }

    public function deleteCarouselItem(){
        CarouselItem::whereId(request()->get('id'))->delete();
    }

    public function deleteAppeal(){
        AppealOfCitizens::whereId(request()->get('id'))->delete();
    }

    public function deleteSocialMedia(){
        SocialWebSites::whereId(request()->get('id'))->delete();
    }
}
