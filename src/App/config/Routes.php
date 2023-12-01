<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;

use App\Controllers\{
    HomeController,
    AboutController,
    AuthController,
    GenerateIDController
};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [AuthController::class, 'registerView'])->add(AuthRequiredMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(AuthRequiredMiddleware::class);
    $app->get('generateID', [GenerateIDController::class, 'generateIDView']);
    $app->get('/login', [AuthController::class, 'loginView'])->add(AuthRequiredMiddleware::class);
    $app->get('/checkresult', [AuthController::class, 'checkResultView'])->add(AuthRequiredMiddleware::class);
}
