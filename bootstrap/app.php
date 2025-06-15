<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckRole::class,
            // alias middleware lain yang mungkin sudah ada atau akan kamu tambahkan
            // 'auth' => \App\Http\Middleware\Authenticate::class, // Contoh, mungkin sudah ada
            // 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // Contoh
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
