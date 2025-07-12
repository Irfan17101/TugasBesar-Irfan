<?php

namespace App\Providers;
use Midtrans\Config;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Config::$serverKey = 'SB-Mid-server-xxxxxxxxxxxxxxxxxxxxxxxx'; // Ganti dengan server key kamu
    Config::$isProduction = false; // FALSE untuk SANDBOX, TRUE untuk LIVE
    Config::$isSanitized = true;
    Config::$is3ds = true;
    }
}
