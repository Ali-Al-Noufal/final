<?php

namespace App\Providers;

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
           config(['database.connections.mysql.options.' . \PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false]);
    config(['database.connections.mysql.options.' . \PDO::MYSQL_ATTR_SSL_CA => '/dev/null']);
    }
}
