<?php

namespace App\Providers;

use App\Services\DebugRequestActivityLogger;
use App\Services\ProductionRequestActivityLogger;
use App\Services\RequestActivityLoggerInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestActivityLoggerInterface::class, function (){
            return $this->app->make(App::environment() != 'production' ? DebugRequestActivityLogger::class : ProductionRequestActivityLogger::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
    }
}
