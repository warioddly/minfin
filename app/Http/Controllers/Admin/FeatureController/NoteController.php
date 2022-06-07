<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\Notes;

class NoteController extends Controller
{
    public function Store(){

        $data = request()->validate([
            'note' => 'required|string|max:255'
        ]);

        Notes::create([
            'note' => $data['note'],
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with('status', __('Note added successfully'));
    }

    public function Delete($id){

        Notes::whereId($id)->delete();

        return redirect()->back()->with('status', __('Note successfully deleted'));
    }
}
