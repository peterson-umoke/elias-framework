<?php

namespace Modules\Core\Menu\Providers;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Menu\Menu;

class MenuServiceProvider extends ServiceProvider
{
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
        $this->app->singleton(Menu::class, function (Container $app) {
            return new Menu(
                $app['config']['menus.filters'],
                $app['events'],
                $app
            );
        });
        $this->registerConfig();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'menus.config');
        $this->mergeConfigFrom(__DIR__ . '/../Config/menus.php', 'menus.demo');
        $this->mergeConfigFrom(__DIR__ . '/../Config/filters.php', 'menus.filters');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
