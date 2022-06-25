<?php

namespace App\Http\Controllers\Admin\AppealController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensAnswerRequest;
use App\Http\Requests\AppealOfCitizensUpdateRequest;
use App\Models\AppealOfCitizens;
use App\Models\Category;

class AppealController extends Controller
{
    public function Index(){
        $appealofcitizens = AppealOfCitizens::latest()->get();
        $is_published = 'all';

        return view('admin.appealofcitizens.index', compact('appealofcitizens', 'is_published'));
    }

    public function Show($id){
        $appealofcitizen = AppealOfCitizens::find($id);
        $categories = Category::all();
        return view('admin.appealofcitizens.show', compact('appealofcitizen', 'categories'));
    }

    public function Answer(AppealOfCitizensAnswerRequest $request, $id){
        $data = $request->all();
        AppealOfCitizens::whereId($id)->update(['answer' => $data['answer'], 'is_published' => true]);
        return redirect()->back()->with(['status' => __('Answer successfully added')]);
    }

    public function Edit(AppealOfCitizensUpdateRequest $request, $id){
        $data = $request->all();

        unset($data['_token']);
        unset($data['_method']);

        AppealOfCitizens::whereId($id)->update($data);
        return redirect()->back()->with(['status' => __('Successfully updated')]);
    }

    public function Publish($id, $publish){
        if($publish == 'publish'){
            AppealOfCitizens::whereId($id)->update(['is_published' => true]);
        }
        else{
            AppealOfCitizens::whereId($id)->update(['is_published' => false]);
        }
        return redirect()->back()->with(['status' => __('Successfully updated')]);
    }

    public function PublishedAppeals($is_published){
        if($is_published == 'published'){
            $appealofcitizens = AppealOfCitizens::where('is_published', 1)->latest()->get();
            $is_published = 1;
        }
        else{
            $appealofcitizens = AppealOfCitizens::where('is_published', 0)->latest()->get();
            $is_published = 0;
        }

        return view('admin.appealofcitizens.index', compact('appealofcitizens', 'is_published'));
    }
}
