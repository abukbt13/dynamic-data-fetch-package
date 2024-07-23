<?php

namespace Abukbt13\DynamicDataFetchPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Abukbt13\DynamicDataFetchPackage\Console\FetchDataCommand;
use Abukbt13\DynamicDataFetchPackage\Services\DataFetchService;

class DynamicDataFetchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('DataFetchService', function ($app) {
            return new DataFetchService();
        });

        $this->commands([
            FetchDataCommand::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
