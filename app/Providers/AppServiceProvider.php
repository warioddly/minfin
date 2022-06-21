<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
//        URL::forceScheme('http');
        Paginator::useBootstrap();
        $latestUsers = User::latest()->take(3)->get();
        View::share('latestUsers', $latestUsers);
        View::share('pages',  Page::where('parent_id', null)->get());
    }
}
