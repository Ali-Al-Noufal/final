<?php

$storagePath = '/tmp/storage';
$cachePath = '/tmp/bootstrap/cache';

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

// --- الجزء الجديد والحاسم لإجبار التطبيق على نسيان الإعدادات القديمة ---
if (file_exists($cachePath . '/config.php')) {
    unlink($cachePath . '/config.php');
}
// -------------------------------------------------------------------

putenv("APP_SERVICES_CACHE={$cachePath}/services.php");
putenv("APP_PACKAGES_CACHE={$cachePath}/packages.php");

require __DIR__ . '/../public/index.php';