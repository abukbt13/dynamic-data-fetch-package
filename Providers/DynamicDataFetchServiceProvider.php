<?php

namespace Vendor\DynamicDataFetchPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Vendor\DynamicDataFetchPackage\Console\FetchDataCommand;
use Vendor\DynamicDataFetchPackage\Services\DataFetchService;

class DynamicDataFetchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the DataFetch service
        $this->app->singleton('DataFetchService', function ($app) {
            return new DataFetchService();
        });

        // Register the command
        $this->commands([
            FetchDataCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
