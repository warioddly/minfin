<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["namespace" => "App\Http\Controllers\Admin\FeatureController"], function () {
    Route::get('/getChartData', 'ChartController@getData');
});

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "dashboard"], function () {

    Route::group(["prefix" => "users"], function () {
        Route::post('/getUsers', 'ApiController@getUser')->name('get-users');
        Route::post('/deleteUser', 'ApiController@deleteUser')->name('delete-user');
    });

    Route::group(["prefix" => "botman"], function () {
        Route::post('/getBotmanData', 'ApiController@getBotmanData')->name('get-botman-message');
        Route::post('/deleteBotmanMessage', 'ApiController@deleteBotmanMessage')->name('delete-botman-message');
    });

    Route::group(["prefix" => "posts"], function () {
        Route::post('/deletePost', 'ApiController@deletePost')->name('post-delete');
        Route::post('/restore/post', 'ApiController@restorePost')->name('restore-post');
        Route::post('/deleteGalleryImage', 'ApiController@deleteGalleryImage')->name('delete-gallery-image');
    });

    Route::group(["prefix" => "categories"], function () {
        Route::post('/deleteCategory', 'ApiController@deleteCategory')->name('delete-category');
        Route::post('/restore/category', 'ApiController@restoreCategory')->name('restore-category');
    });

    Route::group(["prefix" => "tags"], function () {
        Route::post('/deleteTag', 'ApiController@deleteTag')->name('delete-tag');
        Route::post('/restore/tag', 'ApiController@restoreTag')->name('restore-tag');
    });

    Route::group(["prefix" => "documents"], function () {
        Route::post('/deleteDocument', 'ApiController@deleteDocument')->name('delete-document');
        Route::post('/restore/document', 'ApiController@restoreDocument')->name('restore-document');
    });

    Route::group(["prefix" => "roles"], function () {
        Route::post('/getPermissions', 'ApiController@getPermissions')->name('get-permissions');
        Route::post('/deleteRole', 'ApiController@deleteRole')->name('delete-role');
    });

    Route::group(["prefix" => "pages"], function () {
        Route::post('/getPages', 'ApiController@getPageData')->name('get-pages');
        Route::post('/deletePage', 'ApiController@deletePage')->name('delete-page');
        Route::post('/getSelectedPages', 'ApiController@getSelectedPages')->name('get-selected-page');
        Route::post('/restore/page', 'ApiController@restorePage')->name('restore-page');
    });

    Route::group(["prefix" => "settings"], function () {
        Route::post('/deleteCarouselItem', 'ApiController@deleteCarouselItem')->name('delete-carousel-item');
        Route::post('/deleteSocialMedia', 'ApiController@deleteSocialMedia')->name('delete-social-media');
    });

    Route::group(["prefix" => "appeal"], function () {
        Route::post('/deleteAppeal', 'ApiController@deleteAppeal')->name('delete-appeal');
        Route::post('/restore/appeal', 'ApiController@restoreAppeal')->name('restore-appeal');

    });
});

Route::group(["namespace" => "App\Http\Controllers\Admin", 'prefix' => 'laravel-filemanager'], function (){
    Route::post('/upload', 'ApiController@UploadFile');
});
