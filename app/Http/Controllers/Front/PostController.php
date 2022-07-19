<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostTag;
use App\Services\TranslateService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class PostController extends Controller
{
    public function Show(TranslateService $translateService, $id){
        $post = Post::findOrFail($id);

        if($post->is_published == 0){
            abort(404);
        }

        $post->increment('views', 1);

        $tagsIds = $post->tags()->pluck('id')->toArray();
        $relatedTags = PostTag::whereIn('tag_id', $tagsIds)->pluck('post_id')->toArray();
        $relatedPosts = Post::query()
            ->whereIn('id', $relatedTags)->latest()->get()
            ->except(['id', $post->id]);

        $translateService->translate($post);
        $translateService->translatePosts($relatedPosts);

        return view('front.posts.show', compact('post', 'relatedPosts'));
    }

    public function Index(){
        $posts = Post::where('sheet', false)->where('is_published', true)->latest()->paginate(23);

        return view('front.posts.index', compact('posts'));
    }

    public function DownloadGallery($id){
        $post = Post::find($id);
        $dir = 'storage/files/shares/Новости/Пост-' . $id;
        $fileName =  __($post->title) . '.zip';
        $zip = new ZipArchive;

        if(Storage::exists('public/files/shares/Новости/Пост-' . $id . '/' . $fileName)){
            Storage::delete('public/files/shares/Новости/Пост-' . $id . '/' . $fileName);
        }

        try {

        if ($zip->open($dir . '/' . $fileName, ZipArchive::CREATE) === TRUE){
            $files = File::files($dir);

            foreach ($files as $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }

        return response()->download($dir . '/' . $fileName );
        }
        catch (\Exception $exception){
            return redirect()->back()->with(['status' => 'Unable to download gallery']);
        }
    }
}
