<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JWTAuthenticate;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // In Laravel 12, the alias method expects an array of aliases
        $middleware->alias([
            'jwt.auth' => JWTAuthenticate::class,
        ]);

        // Alternative approach if you prefer adding it to specific middleware groups
        // $middleware->api([JWTAuthenticate::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle any exception-related configurations here
    })
    ->create();
