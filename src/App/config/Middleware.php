<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middleware\{
    TemplateDataMiddleware,
    ValidationExceptionMiddleware,
    SessionMiddleware,
    FlashMiddleware
};

function registerMiddleware(App $app)
{
    $app->addMiddlewares(TemplateDataMiddleware::class);
    $app->addMiddlewares(ValidationExceptionMiddleware::class);
    $app->addMiddlewares(FlashMiddleware::class);
    $app->addMiddlewares(SessionMiddleware::class);
}
