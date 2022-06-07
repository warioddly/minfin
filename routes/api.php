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

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "dashboard"], function () {

    Route::group(["prefix" => "users"], function () {
        Route::post('/getUsers', 'ApiController@getUser')->name('get-users');
        Route::post('/deleteUser', 'ApiController@deleteUser')->name('delete-user');
    });

    Route::group(["prefix" => "users"], function () {
        Route::post('/deletePost', 'ApiController@deletePost')->name('post-delete');
    });

    Route::group(["prefix" => "categories"], function () {
        Route::post('/deleteCategory', 'ApiController@deleteCategory')->name('delete-category');
    });

    Route::group(["prefix" => "tags"], function () {
        Route::post('/deleteTag', 'ApiController@deleteTag')->name('delete-tag');
    });

    Route::group(["prefix" => "roles"], function () {
        Route::post('/getPermissions', 'ApiController@getPermissions')->name('get-permissions');
        Route::post('/deleteRole', 'ApiController@deleteRole')->name('delete-role');
    });

    Route::group(["prefix" => "pages"], function () {
        Route::post('/getPages', 'ApiController@getPageData')->name('get-pages');
        Route::post('/deletePage', 'ApiController@deletePage')->name('delete-page');
    });

});
