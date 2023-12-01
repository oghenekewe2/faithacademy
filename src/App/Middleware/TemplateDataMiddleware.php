<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class TemplateDataMiddleware implements MiddlewareInterface
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function process(callable $next)
    {
        // Middleware logic goes here
        $this->view->addGlobal('title', 'application for checking secondary school student result');

        // Call the next middleware or the controller action
        $next();
    }
}
