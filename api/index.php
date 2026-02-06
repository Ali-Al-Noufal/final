<?php

// 1. تحديد المجلد المؤقت في Vercel
$storagePath = '/tmp/storage';
$cachePath = '/tmp/bootstrap/cache';

// 2. إنشاء الهيكلية المطلوبة في المجلد المؤقت المسموح بالكتابة فيه
$directories = [
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
    $cachePath
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 3. إعادة توجيه المسارات الحساسة للمجلد المؤقت
// هذا السطر يحل مشكلة "must be present and writable"
putenv("APP_SERVICES_CACHE={$cachePath}/services.php");
putenv("APP_PACKAGES_CACHE={$cachePath}/packages.php");

// 4. استدعاء ملف التشغيل الأصلي
require __DIR__ . '/../public/index.php';