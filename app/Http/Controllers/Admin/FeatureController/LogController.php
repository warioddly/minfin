<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\Logs;

class LogController extends Controller
{
    public function index(){
        $logs = Logs::latest()->get();
        return view('admin.logs.index', compact('logs'));
    }
}
