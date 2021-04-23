<?php
/**
 * Created by PhpStorm
 * User: ezreal
 * Date: 2021/4/23
 * Time: 09:34
 */

namespace Ezreal\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function() {
            return new Weather(config('services.weather.key'));
        });
        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}