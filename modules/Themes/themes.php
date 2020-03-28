<?php

use Modules\Themes\BounceBackHub\Providers\BounceBackHubProvider;
use Modules\Themes\Portfolio\Providers\PortfolioProvider;

return [
    "default" => "bouncebackhub",
    "paths" => [
        "bouncebackhub" => BounceBackHubProvider::class,
        "portfolio_theme" => PortfolioProvider::class
    ],
];
