<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debug-db', function () {
    try {
        DB::connection()->getPdo();
        return "الاتصال ناجح تماماً!";
    } catch (\Exception $e) {
        return "فشل الاتصال: " . $e->getMessage();
    }
});