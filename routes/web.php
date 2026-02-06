<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/debug-db', function () {
    // 1. مسح ملفات الكاش الفيزيائية في Vercel
    $cacheConfigPath = '/tmp/bootstrap/cache/config.php';
    if (file_exists($cacheConfigPath)) {
        unlink($cacheConfigPath);
    }

    // 2. محاولة مسح الكاش برمجياً مع تجنب قاعدة البيانات
    try {
        // نغير الإعدادات لحظياً لضمان عدم الذهاب للقاعدة
        config(['cache.default' => 'file']);
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        return "تم تحرير التطبيق من الكاش القديم بنجاح! جرب الآن.";
    } catch (\Exception $e) {
        return "فشل المسح التلقائي، ولكن تم حذف ملف الإعدادات يدوياً. الرسالة: " . $e->getMessage();
    }
});