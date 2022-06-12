<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function Index($locale){
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
