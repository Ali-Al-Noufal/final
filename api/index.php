<?php

// 1. تهيئة المجلدات الضرورية (للجلسات واللوجز فقط)
$tempStorage = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($tempStorage as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// 2. تعطيل الكاش تماماً لضمان قراءة المتغيرات الجديدة من Vercel
// حذفنا أسطر APP_CONFIG_CACHE و APP_ROUTES_CACHE

// 3. استدعاء ملف التشغيل الأصلي
require __DIR__ . '/../public/index.php';