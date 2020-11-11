<?php

namespace App\Providers;

use App\Http\Resources\CustomEntryResource;
use Illuminate\Support\ServiceProvider;
use Statamic\Http\Resources\API\EntryResource;
use Statamic\Http\Resources\API\Resource;

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
        Resource::map([
            EntryResource::class => CustomEntryResource::class
        ]);
        // Statamic::script('app', 'cp');
        // Statamic::style('app', 'cp');
    }
}
