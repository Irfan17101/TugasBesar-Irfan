<?php

protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    // Tambahkan ini untuk role:
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];

