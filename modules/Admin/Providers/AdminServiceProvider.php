<?php

namespace Modules\Admin\Providers;

use Config;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Http\Middleware\AuthenticateIfAdmin;
use Modules\Admin\Http\Middleware\ForceJSONResponse;
use Modules\Admin\Http\Middleware\RedirectIfAdmin;
use Modules\Admin\Http\Middleware\RedirectIfNotAdmin;
use Modules\Admin\Http\ViewComposers\AdminViewComposer;
use Modules\Core\Menu\Events\BuildingMenu;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @param Router $router
     * @param Factory $view
     * @param Dispatcher $events
     * @param Repository $config
     * @return void
     */
    public function boot(Router $router, Factory $view, Dispatcher $events,
                         Repository $config)
    {
        $this->loadMigrationsFrom(module_path('Admin', 'Database/Migrations'));
        $router->aliasMiddleware('admin.auth', RedirectIfNotAdmin::class);
        $router->aliasMiddleware('admin.guest', RedirectIfAdmin::class);
        $router->aliasMiddleware('admin.authenticate', AuthenticateIfAdmin::class);
        $router->aliasMiddleware('json.response', ForceJSONResponse::class);
        $this->registerMenu($events, $config);
        $this->registerViewComposers($view);
    }

    /**
     * Generate Menus on demand
     *
     * @param Dispatcher $events
     * @param Repository $config
     */
    public function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('menus.admin.sidebar');
            call_user_func_array([$event->menu, 'add'], $menu);
        });
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('admin::layouts.page', AdminViewComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        // merge configurations
        $this->mergeConfigFrom(module_path('Admin', 'Config/config.php'), 'admin');
        $this->mergeConfigFrom(module_path("Admin", "Config/guards.php"), "auth.guards");
        $this->mergeConfigFrom(module_path("Admin", "Config/passwords.php"), "auth.passwords");
        $this->mergeConfigFrom(module_path("Admin", "Config/providers.php"), "auth.providers");
        $this->mergeConfigFrom(module_path("Admin", "Config/laratrust_seeder.php"), "laratrust_seeder");
        $this->mergeConfigFrom(module_path("Admin", "Config/laratrust.php"), "laratrust");
        $this->mergeConfigFrom(module_path("Admin", "Config/menu.php"), "menus.admin");
        $this->mergeConfigFrom(module_path("Admin", "Config/plugins.php"), "admin.plugins");
        $this->mergeConfigFrom(module_path("Admin", "Config/filters.php"), "menus.filters");
        $this->mergeConfigFrom(module_path("Admin", "Config/widgets.php"), "admin.dashboard.widgets");
        $this->mergeConfigFrom(module_path("Admin", "Config/quick-actions.php"), "admin.dashboard.quick_action_menus");
        $this->mergeConfigFrom(module_path("Admin", "Config/file_storage.php"), "filesystems.disks.admin");
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $sourcePath = module_path('Admin', 'Views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/admin';
        }, Config::get('view.paths')), [$sourcePath]), 'admin');
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(EloquentFactory::class)->load(module_path('Admin', 'Database/factories'));
        }
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
