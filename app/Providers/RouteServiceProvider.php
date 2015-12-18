<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->bind('devices', function($slug){
           return \App\Device::findBySlugOrFail($slug);
        });

        $router->bind('types', function($slug){
            return \App\DeviceType::findBySlugOrFail($slug);
        });

        $router->bind('locations', function($slug){
            return \App\DeviceLocation::findBySlugOrFail($slug);
        });

        $router->bind('admins', function($slug){
            return \App\User::findBySlugOrFail($slug);
        });

        $router->bind('systemusers', function($slug){
            return \App\User::findBySlugOrFail($slug);
        });

        $router->bind('activitylogs', function($id){
            return \App\Activity::findOrFail($id);
        });

        $router->bind('userlogs', function($id){
            return \App\UserLog::findOrFail($id);
        });

        $router->bind('authuser', function($slug){
            return \App\User::findBySlugOrFail($slug);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
