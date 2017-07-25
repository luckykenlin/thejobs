<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * User Service Container
 * Created by PhpStorm.
 * User: Ken Lin
 * Date: 2017/5/19
 * Time: 5:03
 */
class BaseServiceProvider extends ServiceProvider
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

        foreach (config('servicecontainer') as $item)
        {
            $this->app->bind(
                $item['contracts'],
                $item['repository']
            );
        }
    }
}
