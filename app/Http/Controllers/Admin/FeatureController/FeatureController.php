<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\Logs;

class FeatureController extends Controller
{
    public function changeAdminTheme($theme){

        if($theme == 'dark'){
            session(['theme' => 'dark']);
        }
        else{
            session(['theme' => 'light']);
        }

        return redirect()->back();
    }

    public function postListStyle($style){
        if($style == 'list'){
            session(['postListStyle' => 'list']);
        }
        else{
            session(['postListStyle' => 'block']);
        }

        return redirect()->back();
    }

    public function fileManager(){
        return view('admin.vendor.filemanager');
    }
}