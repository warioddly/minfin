<?php

namespace App\Http\Controllers\Admin\AppealController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensUpdateRequest;
use App\Models\AppealOfCitizens;

class AppealController extends Controller
{
    public function Index(){
        $appealofcitizens = AppealOfCitizens::latest()->get();
        $userCanActions = [1, 2, 3];
        return view('admin.appealofcitizens.index', compact('appealofcitizens', 'userCanActions'));
    }

    public function Show($id){
        $appealofcitizen = AppealOfCitizens::find($id);
        return view('admin.appealofcitizens.show', compact('appealofcitizen'));
    }

    public function Answer(AppealOfCitizensUpdateRequest $request, $id){
        $data = $request->all();
        AppealOfCitizens::whereId($id)->update(['answer' => $data['answer'], 'is_published' => true]);
        return redirect()->back()->with(['status' => __('Answer successfully added')]);
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
}
