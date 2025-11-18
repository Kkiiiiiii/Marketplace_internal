<?php

use App\Http\Middleware\admin;
use App\Http\Middleware\member;
use App\Http\Middleware\StatusToko;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->appendToGroup('admin', [
            admin::class,
        ]);
        $middleware->appendToGroup('member',[
            member::class,
        ]);
            $middleware->appendToGroup('CekToko',[
                StatusToko::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
