<?php

namespace Modules\Core\Menu\Filters;

use Modules\Core\Menu\Builder;

class SearchFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (! isset($item['search'])) {
            $item['search'] = false;
        } elseif ($item['search'] === true) {
            if (! isset($item['method'])) {
                $item['method'] = 'get';
            } elseif (isset($item['method']) && ! in_array(strtolower($item['method']), ['post', 'get'])) {
                $item['method'] = 'get';
            }
            if (! isset($item['input_name'])) {
                $item['input_name'] = 'q';
            }
        }

        return $item;
    }
}
