<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        // Define the API middleware group
        $middleware->group('api', [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Ensures that frontend requests are stateful (important for SPA with Sanctum)
            'throttle:api', // Limits the rate of API requests
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Automatically inject route model bindings
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle exception logic here, if necessary
    })
    ->create();
