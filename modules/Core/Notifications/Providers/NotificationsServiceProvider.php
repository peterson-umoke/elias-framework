<?php

namespace Modules\Core\Notifications\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Notifications\Helpers\Notifications;

class NotificationsServiceProvider extends ServiceProvider
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
        $this->registerConfig();
        $this->registerViews();
        $this->registerBladeDirective();

        // Register the service the package provides.
        $this->app->singleton('notifications', function ($app) {
            return $app->make(Notifications::class);
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
            __DIR__ . '/../Config/config.php', 'notifications'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $sourcePath = __DIR__ . '/../Resources/views';

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/notifications';
        }, \Config::get('view.paths')), [$sourcePath]), 'notifications');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'notifications'
        ];
    }

    private function registerBladeDirective()
    {
        Blade::directive('notifications_css', function () {
            return '<?php echo notifications_css(); ?>';
        });

        Blade::directive('notifications_js', function () {
            return '<?php echo notifications_js(); ?>';
        });
    }
}
