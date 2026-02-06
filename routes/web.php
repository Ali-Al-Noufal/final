<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debug-db', function () {
    return [
        'current_host' => env('DB_HOST'),
        'current_db' => env('DB_DATABASE'),
        'app_key_exists' => !empty(env('APP_KEY')),
    ];
});