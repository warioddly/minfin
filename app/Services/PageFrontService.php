<?php

namespace App\Services;


class PageFrontService
{
    public function getAllChildPages($page, $type){
        $childPages = $this->recursiveAllPages($page, $type);
        $childPagesIds = [];
        foreach ($childPages as $childPage) {
            foreach ($childPage['childs']['ids'] as $item) {
                array_push($childPagesIds, $item);
            }
        }

        return $childPagesIds;
    }

    public function recursiveAllPages($page, $type = null, $childPages = []){
        foreach ($page->childPages as $item) {
            if (count($item->childPages) > 0) {
                $allChilds = $this->recursiveAllPages($item, $type, $childPages);
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
}
