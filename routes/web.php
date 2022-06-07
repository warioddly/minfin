<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ADMIN CONTROLLERS

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "dashboard", 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController@index')->name('dashboard')->middleware('can:show-posts');

    Route::group(["namespace" => "PostController", "prefix" => "posts"], function () {
        Route::get('/', 'PostController@Index')->name('posts')->middleware('can:show-posts');
        Route::get('/is/{is_published}', 'PostController@PublishedPosts')->name('published-posts')->middleware('can:show-posts');
        Route::get('/{id}', 'PostController@Show')->name('post-show')->middleware('can:show-posts');
        Route::get('/{id}/edit', 'PostController@Edit')->name('post-edit')->middleware('can:edit-posts');
        Route::get('/{id}/publish', 'PostController@Publish')->name('post-publish')->middleware('can:edit-posts');
    });

    Route::group(["namespace" => "CategoryController", "prefix" => "categories"], function () {
        Route::get('/', 'CategoryController@Index')->name('categories')->middleware('can:show-categories');
        Route::get('/{id}', 'CategoryController@Show')->name('show-category')->middleware('can:show-categories');
        Route::post('/store', 'CategoryController@Store')->name('store-category')->middleware('can:add-categories');
        Route::patch('/{id}', 'CategoryController@Update')->name('update-category')->middleware('can:edit-categories');
    });

    Route::group(["namespace" => "PageController", "prefix" => "pages"], function () {
        Route::get('/', 'PageController@Index')->name('pages')->middleware('can:show-pages');

        Route::group(["prefix" => "{parentId}"], function () {
            Route::get('/', 'PageController@Show')->name('show-pages')->middleware('can:show-pages');
            Route::post('/store', 'PageController@DirectoryStore')->name('directory-store-child-page')->middleware('can:add-pages');
            Route::patch('/directory/{id}', 'PageController@DirectoryUpdate')->name('directory-update-child-page')->middleware('can:edit-pages');
        });

        Route::group(["prefix" => "posts"], function () {
            Route::get('/', 'PagePostController@Index')->name('page-posts')->middleware('can:show-posts');
            Route::get('{parentId}/is/{is_published}/', 'PagePostController@PublishedPosts')->name('page-published-posts')->middleware('can:show-posts');
            Route::get('/{parentId}/create', 'PagePostController@Create')->name('page-post-create')->middleware('can:create-posts');
            Route::get('/{id}', 'PagePostController@Show')->name('page-post-show')->middleware('can:show-posts');
            Route::post('/{parentId}/store', 'PagePostController@Store')->name('page-post-store')->middleware('can:add-posts');
            Route::get('/{id}/edit', 'PagePostController@Edit')->name('page-post-edit')->middleware('can:edit-posts');
            Route::patch('/{id}/', 'PagePostController@Update')->name('page-post-update')->middleware('can:edit-posts');
        });
    });

    Route::group(["namespace" => "UserController", "prefix" => "users"], function () {
        Route::get('/', 'UserController@Index')->name('users')->middleware('can:show-users');
        Route::post('/store', 'UserController@Store')->name('store-user')->middleware('can:add-users');
        Route::patch('/{id}', 'UserController@Update')->name('update-user')->middleware('can:edit-users');
    });

    Route::group(["namespace" => "RoleController", "prefix" => "roles"], function () {
        Route::get('/', 'RoleController@Index')->name('roles')->middleware('can:show-roles');
        Route::post('/store', 'RoleController@Store')->name('role-store')->middleware('can:add-roles');
        Route::patch('/{id}', 'RoleController@Update')->name('role-update')->middleware('can:edit-roles');
    });

    Route::group(["namespace" => "ProfileController", "prefix" => "profile"], function () {
        Route::get('/', 'ProfileController@Index')->name('profile');
        Route::patch('/{id}', 'ProfileController@Update')->name('update-profile');
        Route::post('/notes/store', 'NoteController@Store')->name('store-notes');
        Route::delete('/notes/{id}', 'NoteController@Delete')->name('delete-notes');
    });

    Route::group(["namespace" => "FeatureController", "prefix" => "logs"], function () {
        Route::get('/', 'LogController@Index')->name('logs')->middleware('can:show-logs');
        Route::get('/manager', 'FeatureController@fileManager')->name('file-manager')->middleware('can:show-filemanager');;
        Route::get('/{theme}', 'FeatureController@changeAdminTheme')->name('theme');
        Route::get('/{style}/style', 'FeatureController@postListStyle')->name('post-style')->middleware('can:show-posts');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__.'/auth.php';
