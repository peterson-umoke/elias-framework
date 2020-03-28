<?php

namespace Modules\Core\Flash\Providers;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerViews();

        $this->app->bind(
            'Modules\Core\Flash\Helpers\SessionStore',
            'Modules\Core\Flash\Helpers\LaravelSessionStore'
        );

        $this->app->singleton('flash', function () {
            return $this->app->make('Modules\Core\Flash\Notifiers\FlashNotifier');
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'flash'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $sourcePath = __DIR__ . '/../Views';
        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/flash';
        }, \Config::get('view.paths')), [$sourcePath]), 'flash');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'flash'
        ];
    }
}
