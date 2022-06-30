<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Models\Post;

class GalleryController extends Controller
{
    public function Index(){
        $posts = Post::where('sheet', false)->latest()->paginate(28);
        return view('admin.gallery.index', compact('posts'));
    }

    public function Show($id){
        $post = Post::find($id);
        return view('admin.gallery.show', compact('post'));
    }
}
