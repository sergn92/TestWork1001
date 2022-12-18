<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {
        Response::macro('api', function (mixed $value, string $message = "", int $code = 200) {
            return Response::json([
                "status" => $code === 200 ? "success" : "error",
                "data" => collect($value),
                "message" => $message
            ], $code);
        });
    }
}
