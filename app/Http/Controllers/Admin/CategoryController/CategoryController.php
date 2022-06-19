<?php

namespace App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\CheckPermissionService;
use JoeDixon\Translation\Drivers\Translation;

class CategoryController extends Controller
{
    public function Index(CheckPermissionService $permissionService){

        if(session('categoryView') == true){
            $categories = Category::where('publisher', 0)->latest()->get();
        }
        else{
            $categories = Category::where('publisher', 1)->latest()->get();
        }

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

        $averageViews = $averageViews / count($categories) ?? 0;

        $userCanActions = $permissionService->permissionsInCategories();

        return view('admin.categories.index', compact('categories', 'userCanActions', 'popularCategory', 'averageViews'));
    }

    public function Show($id){
        $category = Category::find($id);

        if(session('categoryView') == true){
            $popularPosts = Post::where('publisher_id', $id)->where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();
            $posts = Post::where('publisher_id', $id)->get();
        }
        else{
            $popularPosts = Post::where('publisher_id', $id)->where('views', '!=', 0)->orderBy('views', 'desc')->take(7)->get();
            $posts = Post::where('publisher_id', $id)->get();
        }

        return view('admin.categories.show', compact('category', 'posts', 'popularPosts'));
    }

    public function Store(Translation $translation, CategoryRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];
        if(isset($data['publisher'])){
            $data['publisher'] = true;
        }
        else{
            $data['publisher'] = false;
        }

        Category::create($data);

        $translation->addGroupTranslation(session('locale'), 'category', $request->get('title'), $request->get('title'));

        return redirect()->back()->with('status', __('Category successfully created'));
    }

    public function Update(CategoryUpdateRequest $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()['id'];
        Category::find($request->id)->update($data);
        return redirect()->back()->with('status', __('Category successfully updated'));
    }
}
