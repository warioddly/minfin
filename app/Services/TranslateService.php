<?php

namespace App\Services;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class TranslateService
{
    public function translate($items){
        if(session('locale') == 'kg'){
            $translates = $items->translates;
            $items['title'] = $translates['kg_title'] ?? $items['title'];
            $items['description'] = $translates['kg_description'] ?? $items['description'];
            $items['content'] = $translates['kg_content'] ?? $items['content'];
        }
        if(session('locale') == 'en'){
            $translates = $items->translates;
            $items['title'] = $translates['en_title'] ?? $items['title'];
            $items['description'] = $translates['en_description'] ?? $items['description'];
            $items['content'] = $translates['en_content'] ?? $items['content'];
        }

        return $items;
    }

    public function translatePosts($items){
        if(session('locale') == 'kg'){
            foreach ($items as $item){
                $translate = $item->translates;
                $item['title'] = $translate['kg_title'] ?? $item['title'];
                $item['description'] = $translate['kg_description'] ?? $item['description'];
                $item['content'] = $translate['kg_content'] ?? $item['content'];
            }
        }
        if(session('locale') == 'en'){
            foreach ($items as $item){
                $translate = $item->translates;
                $item['title'] = $translate['en_title'] ?? $item['title'];
                $item['description'] = $translate['en_description'] ?? $item['description'];
                $item['content'] = $translate['en_content'] ?? $item['content'];
            }
        }

        return $items;
    }

}
