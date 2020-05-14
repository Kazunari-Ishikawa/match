<?php

namespace App\Providers;

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
        // 商用環境以外でSQLログを出力する
        if (config('app.env') !== ('production')) {
            \DB::listen(function($query) {
                // \Log::debug("Query Time:{$query->time}s], $query->sql");
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
