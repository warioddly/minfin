<?php

namespace App\Providers;

use App\Models\MinFinContact;
use App\Models\Page;
use App\Models\Post;
use App\Models\SocialWebSites;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(session(['locale']) === null){
            session(['locale' => 'ru']);
            App::setLocale('ru');
        }
//        URL::forceScheme('http');
        Paginator::useBootstrap();
        $latestUsers = User::latest()->take(3)->get();
        View::share('latestUsers', $latestUsers);
        View::share('navPages', Page::where('parent_id', null)->get());
        View::share('сontactData', MinFinContact::first());
        View::share('socialMedia', SocialWebSites::all());
        View::share('archives', Post::archives());
    }
}
