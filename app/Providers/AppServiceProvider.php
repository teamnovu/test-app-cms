<?php

namespace App\Providers;

use App\Http\Resources\CustomAssetRessource;
use App\Http\Resources\CustomEntryResource;
use Illuminate\Support\ServiceProvider;
use Statamic\Http\Resources\API\Resource;
use Statamic\Http\Resources\API\AssetResource;
use Statamic\Http\Resources\API\EntryResource;

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
            AssetResource::class => CustomAssetRessource::class,
            EntryResource::class => CustomEntryResource::class
        ]);
        // Statamic::script('app', 'cp');
        // Statamic::style('app', 'cp');
    }
}
