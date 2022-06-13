<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function Show($id){
        $page = Page::findOrFail($id);

        return view('front.pages.show', compact('page'));
    }

    public function Contacts(){
        return view('front.vendor.contacts');
    }
}
