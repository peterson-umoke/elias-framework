<?php

namespace Modules\Core\BreadCrumbs\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Traits\Macroable;
use Modules\Core\BreadCrumbs\BreadcrumbsManager;
use stdClass;

/**
 * Breadcrumbs facade - allows easy access to the Manager instance.
 *
 * @method static void for (string $name, callable $callback)
 * @method static void register(string $name, callable $callback)
 * @method static void before(callable $callback)
 * @method static void after(callable $callback)
 * @method static bool exists(string $name = NULL)
 * @method static Collection generate(string $name = NULL, ...$params)
 * @method static HtmlString view(string $view, string $name = NULL, ...$params)
 * @method static HtmlString render(string $name = NULL, ...$params)
 * @method static stdClass|null current()
 * @method static array getCurrentRoute()
 * @method static void setCurrentRoute(string $name, ...$params)
 * @method static void clearCurrentRoute()
 * @mixin Macroable
 * @see BreadcrumbsManager
 */
class Breadcrumbs extends Facade
{
    /**
     * Get the name of the class registered in the Application container.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BreadcrumbsManager::class;
    }
}
