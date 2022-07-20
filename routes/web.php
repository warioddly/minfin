<?php

use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['setLocale'])->group(function(){

    // FRONT CONTROLLERS

    Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\Botman\BotManController@handle');

    Route::group(["namespace" => "App\Http\Controllers\Front"], function () {
        Route::get('/', 'IndexController@Index')->name('index');
        Route::get('/contacts', 'PageController@Contacts')->name('contacts');
        Route::get('/tag/{id}', 'TagController@Show')->name('front-show-tag');
        Route::get('/search', 'IndexController@Search')->name('search');

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', 'PostController@Index')->name('front-posts');
            Route::get('/{id}', 'PostController@Show')->name('front-post-show');
            Route::get('/download-gallery/{id}', 'PostController@DownloadGallery')->name('front-post-download');
        });
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/', 'PageController@Index')->name('front-pages');
            Route::get('/{id}', 'PageController@Show')->name('front-page-show');
            Route::get('/sheet/{id}', 'PageController@ShowSheet')->name('front-sheet-show');
        });
        Route::group(["prefix" => "appealofcitizens"], function () {
            Route::get('/', 'AppealController@Index')->name('appeal-of-citizens');
            Route::get('/ask-a-question', 'AppealController@AskAQuestions')->name('ask-a-question');
            Route::post('/appeal-question', 'AppealController@AppealQuestion')->name('appeal-question');
            Route::post('/appeal-search', 'AppealController@AppealSearch')->name('appeal-search');
        });
        Route::group(["prefix" => "anti-corruption"], function () {
            Route::get('/', 'AntiCorruptionController@Index')->name('anti-corruption');
            Route::post('/sendMessage', 'AntiCorruptionController@SendMessage')->name('send-corruption');
        });
        Route::group(["prefix" => "archive"], function () {
            Route::get('/', 'ArchiveController@Index')->name('archive');
            Route::get('/getArchivedPosts', 'ArchiveController@ShowWithMonth')->name('archive-with-month');
        });
    });

    // ADMIN CONTROLLERS

    Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "dashboard", 'middleware' => 'auth'], function () {
        Route::get('/', 'IndexController@index')->name('dashboard')->middleware('can:show-posts');

        Route::group(["namespace" => "PostController", "prefix" => "posts"], function () {
            Route::get('/', 'PostController@Index')->name('posts')->middleware('can:show-posts');
            Route::get('/create', 'PostController@Create')->name('post-create')->middleware('can:add-posts');
            Route::get('/is/{is_published}', 'PostController@PublishedPosts')->name('published-posts')->middleware('can:show-posts');
            Route::get('/{id}', 'PostController@Show')->name('post-show')->middleware('can:show-posts');
            Route::get('/{id}/edit', 'PostController@Edit')->name('post-edit')->middleware('can:edit-posts');
            Route::get('/{id}/publish', 'PostController@Publish')->name('post-publish')->middleware('can:edit-posts');
        });

        Route::group(["namespace" => "DocumentController", "prefix" => "documents"], function () {
            Route::get('/', 'DocumentController@Index')->name('documents')->middleware('can:show-documents');
        });

        Route::group(["namespace" => "CategoryController", "prefix" => "categories"], function () {
            Route::get('/', 'CategoryController@Index')->name('categories')->middleware('can:show-publishers');
            Route::get('/{id}', 'CategoryController@Show')->name('show-category')->middleware('can:show-publishers');
            Route::post('/store', 'CategoryController@Store')->name('store-category')->middleware('can:add-publishers');
            Route::patch('/{id}', 'CategoryController@Update')->name('update-category')->middleware('can:edit-publishers');
        });

        Route::group(["namespace" => "BotmanController", "prefix" => "botman"], function () {
            Route::get('/', 'BotmanController@Index')->name('botman')->middleware('can:show-botman');
            Route::get('/{id}', 'BotmanController@Show')->name('show-botman-message')->middleware('can:show-botman-messages');
            Route::post('/store', 'BotmanController@Store')->name('store-botman-message')->middleware('can:add-botman-messages');
            Route::patch('/{id}', 'BotmanController@Update')->name('update-botman-message')->middleware('can:edit-botman-messages');
        });

        Route::group(["namespace" => "TagController", "prefix" => "tags"], function () {
            Route::get('/', 'TagController@Index')->name('tags')->middleware('can:show-tags');
            Route::get('/{id}', 'TagController@Show')->name('show-tag')->middleware('can:show-tags');
            Route::post('/store', 'TagController@Store')->name('store-tag')->middleware('can:add-tags');
            Route::patch('/{id}', 'TagController@Update')->name('update-tag')->middleware('can:edit-tags');
        });

        Route::group(["namespace" => "SettingController", "prefix" => "settings"], function () {
            Route::get('/', 'SettingController@Index')->name('settings')->middleware('can:show-content-settings');
            Route::post('/storeCarousel', 'SettingController@StoreCarousel')->name('store-carousel')->middleware('can:add-content-settings');
            Route::patch('/{id}', 'SettingController@UpdateCarousel')->name('update-carousel')->middleware('can:edit-content-settings');
            Route::post('/changeBlocks', 'SettingController@ChangeBlocks')->name('changeBlocks')->middleware('can:edit-content-settings');
        });

        Route::group(["namespace" => "PageController", "prefix" => "pages"], function () {
            Route::get('/', 'PageController@Index')->name('pages')->middleware('can:show-pages');
            Route::patch('/directory/{id}', 'PageController@DirectoryParentUpdate')->name('directory-update-parent-page')->middleware('can:edit-pages');

            Route::group(["prefix" => "{parentId}"], function () {
                Route::get('/', 'PageController@Show')->name('show-pages')->middleware('can:show-pages');
                Route::post('/store', 'PageController@DirectoryStore')->name('directory-store-child-page')->middleware('can:add-pages');
                Route::patch('/directory/{id}', 'PageController@DirectoryUpdate')->name('directory-update-child-page')->middleware('can:edit-pages');
            });

            Route::group(["prefix" => "posts"], function () {
                Route::get('/', 'PagePostController@Index')->name('page-posts')->middleware('can:show-posts');
                Route::get('{parentId}/is/{is_published}/', 'PagePostController@PublishedPosts')->name('page-published-posts')->middleware('can:show-posts');
                Route::get('/{parentId}/create', 'PagePostController@Create')->name('page-post-create')->middleware('can:add-posts');
                Route::get('/{id}', 'PagePostController@Show')->name('page-post-show')->middleware('can:show-posts');
                Route::post('/{parentId}/store', 'PagePostController@Store')->name('page-post-store')->middleware('can:add-posts');
                Route::patch('/{id}/', 'PagePostController@Update')->name('page-post-update')->middleware('can:edit-posts');
            });

            Route::group(["prefix" => "sheets"], function () {
                Route::get('/show/{id}', 'PageSheetController@Show')->name('page-sheet-show');
                Route::get('/{parentId}/create', 'PageSheetController@Create')->name('page-sheet-create');
                Route::post('/sheetStore', 'PageSheetController@Store')->name('page-sheet-store');
                Route::get('/sheetEdit/{id}', 'PageSheetController@Edit')->name('page-sheet-edit');
                Route::patch('/sheetUpdate/{id}', 'PageSheetController@Update')->name('page-sheet-update');
                Route::delete('/{id}', 'PageSheetController@Delete')->name('page-sheet-delete');
            });
        });

        Route::group(["namespace" => "UserController", "prefix" => "users"], function () {
            Route::get('/', 'UserController@Index')->name('users')->middleware('can:show-users');
            Route::post('/store', 'UserController@Store')->name('store-user')->middleware('can:add-users');
            Route::patch('/{id}', 'UserController@Update')->name('update-user')->middleware('can:edit-users');
        });

        Route::group(["namespace" => "AppealController", "prefix" => "appeal"], function () {
            Route::get('/', 'AppealController@Index')->name('appeal')->middleware('can:show-appeal');
            Route::get('/{id}', 'AppealController@Show')->name('show-appeal')->middleware('can:show-appeal');
            Route::patch('/{id}/answer', 'AppealController@Answer')->name('appeal-answer')->middleware('can:add-appeal');
            Route::patch('/{id}/edit', 'AppealController@Edit')->name('appeal-edit')->middleware('can:edit-appeal');
            Route::get('/{id}/to/{publish}', 'AppealController@Publish')->name('appeal-publish')->middleware('can:edit-appeal');
            Route::get('/is/{is_published}/', 'AppealController@PublishedAppeals')->name('published-appeals')->middleware('can:show-appeal');
        });

        Route::group(["namespace" => "RoleController", "prefix" => "roles"], function () {
            Route::get('/', 'RoleController@Index')->name('roles')->middleware('can:show-roles');
            Route::post('/store', 'RoleController@Store')->name('role-store')->middleware('can:add-roles');
            Route::patch('/{id}', 'RoleController@Update')->name('role-update')->middleware('can:edit-roles');
        });

        Route::group(["namespace" => "ProfileController", "prefix" => "profile"], function () {
            Route::get('/', 'ProfileController@Index')->name('profile');
            Route::patch('/{id}', 'ProfileController@Update')->name('update-profile');
        });

        Route::group(["namespace" => "FeatureController"], function () {
            Route::group(["prefix" => "features"], function () {
                Route::get('/', 'LogController@Index')->name('logs')->middleware('can:show-logs');
                Route::get('/translations', 'FeatureController@Translations')->name('translations')->middleware('can:show-translations');
                Route::get('/manager', 'FeatureController@fileManager')->name('file-manager')->middleware('can:show-filemanager');
                Route::get('/{theme}', 'FeatureController@changeAdminTheme')->name('theme');
                Route::get('/{type}/isDirectory', 'FeatureController@isDirectory')->name('isDirectory');
                Route::get('/{type}/isCategory', 'FeatureController@isCategory')->name('isCategory');
                Route::get('/{style}/style', 'FeatureController@postListStyle')->name('post-style')->middleware('can:show-posts');
                Route::post('/notes/store', 'NoteController@Store')->name('store-notes');
                Route::delete('/notes/{id}', 'NoteController@Delete')->name('delete-notes');
                Route::patch('/banner-update', 'BannerController@Update')->name('update-banner');
                Route::post('/social-media/store', 'ContactController@StoreSocial')->name('store-social-media');
                Route::patch('/social-media/update/{id}', 'ContactController@UpdateSocial')->name('update-social-media');
                Route::patch('/contacts/update/', 'ContactController@UpdateContacts')->name('update-contacts');
                Route::get('/chart/update/', 'ChartController@Index')->name('update-chart');
            });

            Route::group(["prefix" => "trash"], function () {
                Route::get('/', 'TrashController@Index')->name('trash');
            });

            Route::group(["prefix" => "gallery"], function () {
                Route::get('/', 'GalleryController@Index')->name('gallery');
                Route::get('/{id}', 'GalleryController@Show')->name('show-gallery');
            });
        });

        Route::group(["namespace" => "EmailController", "prefix" => "email"], function () {
            Route::get('/authEmail', function (){
                return LaravelGmail::redirect();
            })->name('auth-email');
            Route::get('/authMakeToken', function (){
                LaravelGmail::makeToken();
                return redirect()->route('email', 'inbox');
            })->name('auth-make-token');
            Route::get('/{page}', 'EmailController@Index')->name('email')->middleware('can:show-email');
            Route::get('/show/{messageId}', 'EmailController@Show')->name('show-email')->middleware('can:show-email');
            Route::get('/actions/{messageId}/{action}', 'EmailController@Actions')->name('action-email')->middleware('can:edit-email');
            Route::post('/sendMessage', 'EmailController@SendMessage')->name('send-email')->middleware('can:show-email');
        });
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    // AUTH ROUTE

    Auth::routes(['reset' => false, 'confirm' => false]);
});

Route::get('/locale/{locale}', 'App\Http\Controllers\LocaleController@Index')->name('locale');
