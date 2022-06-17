<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;

class PageController extends Controller
{
    public function getAllChildPages($page, $type = null, $childPages = []){
        foreach ($page->childPages as $item) {
            if (count($item->childPages) > 0) {
                $allChilds = $this->getAllChildPages($item, $type, $childPages);
                $childPages[$item->id] = [
                    'page' => $item,
                    'childs' => [
                        'ids' => array_merge(
                            !$type || $item->type === $type ? [$item->id] : [],
                            array_filter(array_map(function ($v) use ($type) {
                                if ($type === $v['page']->type) {
                                    return $v['childs']['ids'][0];
                                }
                            }, $allChilds), function ($v) {
                                return (bool)$v;
                            })
                        ),
                        'items' => $allChilds
                    ]
                ];
            } else {
                $childPages[$item->id] = [
                    'page' => $item,
                    'childs' => [
                        'ids' => !$type || $item->type === $type ? [$item->id] : [],
                        'items' => []
                    ]
                ];
            }
        }

        return $childPages;
    }

    public function Show($id){
        $page = Page::findOrFail($id);

        if($page->type == 2){
            $sheet = Post::where('page_id', $page->id)->take(1)->get()[0];
            return redirect()->route('front-sheet-show', $sheet->id);
        }

        $childPages = $this->getAllChildPages($page, null);
        $childPagesIds = [];
        foreach ($childPages as $childPage) {
            foreach ($childPage['childs']['ids'] as $item) {
                array_push($childPagesIds, $item);
            }
        }

        $posts = Post::whereIn('page_id', array_merge($childPagesIds, [$page->id]))->where('sheet', false)->where('is_published', true)->latest()->paginate(10);

        return view('front.pages.show', compact('page', 'posts'));
    }

    public function ShowSheet($id){
        $sheet = Post::find($id);

        return view('front.pages.showSheet', compact('sheet'));
    }

    public function Contacts(){
        return view('front.vendor.contacts');
    }
}
