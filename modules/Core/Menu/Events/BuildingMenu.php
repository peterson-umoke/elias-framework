<?php


namespace Modules\Core\Menu\Events;


use Modules\Core\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}
