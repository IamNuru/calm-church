<?php

namespace App\Providers;


use App\Models\Partner;
use App\Models\Sermon;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('partners', Partner::get());
        view()->share('tags', Tag::get());
        view()->share('users', User::get());
        view()->share('sermons', Sermon::get());
    }
}
