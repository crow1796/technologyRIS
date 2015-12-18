<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DeviceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\RepositoryInterface', 'App\Repositories\DeviceRepository');
        
        $this->app->bind('App\Repositories\DeviceTypeRepository', 'App\Repositories\DeviceTypeRepository');
        
        $this->app->bind('App\Repositories\DeviceStatusRepository', 'App\Repositories\DeviceStatusRepository');

        $this->app->bind('App\Repositories\DeviceLocationRepository', 'App\Repositories\DeviceLocationRepository');

        $this->app->bind('App\Repositories\PermissionRepository', 'App\Repositories\PermissionRepository');
        $this->app->bind('App\Repositories\UserRepository', 'App\Repositories\UserRepository');

        $this->app->bind('App\Repositories\ActivityLogRepository', 'App\Repositories\ActivityLogRepository');
    }
}
