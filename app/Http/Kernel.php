<?php

protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'role' => \App\Http\Middleware\RoleMiddleware::class,
    'admin' => \App\Http\Middleware\RoleMiddleware::class, // alias admin
];

protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class, // ← Tambahkan ini
];


