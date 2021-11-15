<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::enforceMorphMap([
            'Admin'     => 'App\Models\Admin',
            'User'      => 'App\Models\User',
            'Comment'   => 'App\Models\Comment',
            'Post'      => 'App\Models\Post',
        ]);
    }
}
