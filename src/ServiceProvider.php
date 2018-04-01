<?php

namespace Pushover;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/pushover.php', 'pushover'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
    //            UserSumsUpdateCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/pushover.php' => config_path('pushover.php'),
        ]);
    }
}
