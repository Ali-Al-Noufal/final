<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/seed-data', function () {
    try {
        Artisan::call('db:seed', ['--force' => true]);
        return "تمت إضافة البيانات بنجاح!";
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});