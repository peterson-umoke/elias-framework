<?php


namespace Modules\Admin\Filters;


use Modules\Core\Menu\Builder;
use Modules\Core\Menu\Filters\FilterInterface;

class LaratrustGateFilter implements FilterInterface
{
    protected $gate;

    public function __construct()
    {
        $this->gate = auth(config('admin.auth_guard'))->user();
    }

    public function transform($item, Builder $builder)
    {
        if (!$this->isVisible($item)) {
            return false;
        }

        return $item;
    }

    protected function isVisible($item)
    {

        if (!isset($item['can'])) {
            return true;
        }

        return $this->gate->can($item['can']);
    }
}
