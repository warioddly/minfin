<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('index'));
});

Breadcrumbs::for('Posts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Posts'), route('front-posts'));
});

Breadcrumbs::for('Pages', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Pages'), route('front-pages'));
});

Breadcrumbs::for('Post', function ($trail, $post) {
    $trail->parent('Posts');
    $trail->push(\Illuminate\Support\Str::limit(__($post->title), $limit=25, $end='...'), route('front-page-show', $post->id));
});

Breadcrumbs::for('Contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Contacts'));
});

Breadcrumbs::for('AppealOfCitizens', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Appeal Of Citizens'), route('appeal-of-citizens'));
});

Breadcrumbs::for('AskAQuestions', function ($trail) {
    $trail->parent('AppealOfCitizens');
    $trail->push(__('Ask a Questions'));
});

Breadcrumbs::for('Page', function ($trail, $page) {
    $trail->parent('home');

    $parentItems = [];
    $childPage = $page;
    while(true){
        try {
            $parent = $page->parentPage;
            array_push($parentItems, $page);

            $page = $parent->parentPage;
            array_push($parentItems, $parent);
        }
        catch (\Exception){
            break;
        }
    }

    $parentItems = array_reverse($parentItems);

    foreach ($parentItems as $key => $item) {
        if(count($parentItems) != $key + 1){
            $trail->push(__($item->title), route('front-page-show', $item->id));
        }
    }

    $trail->push(__($childPage->title), route('front-page-show', $childPage->id));
});
