<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class AntiCorruptionController extends Controller
{
    public function Index(){
        return view('front.vendor.antiCorruption');
    }

    public function SendMessage(){
        dd(request()->all());
    }
}
