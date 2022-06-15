<?php

namespace App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\CheckPermissionService;

class CategoryController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $categories = Category::latest()->get();
        $categoryCount = Category::all()->count();

        $popularCategory = '';
        $temp = $categories[0]->TotalPostViews() ?? '';
        $averageViews = $categories[0]->TotalPostViews() ?? '';

        foreach ($categories as $category){
            if($temp < $category->TotalPostViews()){
                $temp = $category->TotalPostViews();
                $popularCategory = $category->title;
            }
            $averageViews += $category->TotalPostViews() ?? 0;

        }

        $averageViews = $averageViews / $categoryCount ?? 0;

        $userCanActions = $permissionService->permissionsInCategories();

        return view('admin.categories.index', compact('categories', 'userCanActions', 'popularCategory', 'averageViews'));
    }

    public function Show($id){
        $category = Category::find($id);
        $popularPosts = Post::where('category_id', $id)->where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();
        $posts = Post::where('category_id', $id)->get();
        return view('admin.categories.show', compact('category', 'posts', 'popularPosts'));
    }

    public function Store(CategoryRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];
        Category::create($data);
        return redirect()->back()->with('status', __('Category successfully created'));
    }

    public function Update(CategoryUpdateRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];
        Category::find($request->id)->update($data);
        return redirect()->back()->with('status', __('Category successfully updated'));
    }
}
