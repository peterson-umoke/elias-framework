<?php

namespace Modules\Core\Menu\Filters;

use Modules\Core\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}
