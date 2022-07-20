<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('index'));
});

Breadcrumbs::for('Posts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Posts'), route('front-posts'));
});

Breadcrumbs::for('Search', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Search'));
});

Breadcrumbs::for('Pages', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Pages'), route('front-pages'));
});

Breadcrumbs::for('botman', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Botman'), route('botman'));
});

Breadcrumbs::for('Post', function ($trail, $post) {
    $trail->parent('Posts');
    $trail->push(\Illuminate\Support\Str::limit(__($post->title), $limit=25, $end='...'), route('front-page-show', $post->id));
});

Breadcrumbs::for('Contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Contacts'));
});

Breadcrumbs::for('Tags', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Tags'));
});

Breadcrumbs::for('Tag', function ($trail, $tag) {
    $trail->parent('Tags');
    $trail->push(__($tag->title));
});

Breadcrumbs::for('AppealOfCitizens', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Appeal Of Citizens'), route('appeal-of-citizens'));
});

Breadcrumbs::for('AskAQuestions', function ($trail) {
    $trail->parent('AppealOfCitizens');
    $trail->push(__('Ask a Questions'));
});

Breadcrumbs::for('AntiCorruption', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Anti-Corruption policy'), route('anti-corruption'));
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

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push(__('Main'), route('dashboard'));
});

Breadcrumbs::for('documents', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Documents'));
});

Breadcrumbs::for('gallery', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Gallery'), route('gallery'));
});

Breadcrumbs::for('show-gallery', function ($trail, $post) {
    $trail->parent('gallery');
    $trail->push(\Illuminate\Support\Str::limit(__($post->title), $limit=20));
});

Breadcrumbs::for('appeal', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Appeal of citizens'), route('appeal'));
});

Breadcrumbs::for('show-appeal', function ($trail, $appeal) {
    $trail->parent('appeal');
    $trail->push(\Illuminate\Support\Str::limit(__($appeal->title), $limit=20));
});


Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Posts'), route('posts'));
});

Breadcrumbs::for('show-post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push(\Illuminate\Support\Str::limit(__($post->title), $limit=20), route('post-show', $post->id));
});

Breadcrumbs::for('edit-post', function ($trail, $post) {
    $trail->parent('show-post', $post);
    $trail->push(__('Editing'));
});

Breadcrumbs::for('publishers', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Publisher'), route('categories'));
});

Breadcrumbs::for('show-category', function ($trail, $category) {
    $trail->parent('publishers');
    $trail->push(\Illuminate\Support\Str::limit(__($category->title), $limit=20));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Users'), route('users'));
});

Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Roles'), route('roles'));
});

Breadcrumbs::for('logs', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Logs'), route('logs'));
});

Breadcrumbs::for('trash', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Trash'), route('trash'));
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Settings'), route('settings'));
});

Breadcrumbs::for('tags', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('Tags'), route('tags'));
});


Breadcrumbs::for('show-tag', function ($trail, $tag) {
    $trail->parent('tags');
    $trail->push(__($tag->title));
});
