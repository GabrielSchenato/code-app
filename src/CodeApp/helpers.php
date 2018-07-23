<?php

use CodePress\CodeApp\Models\AppConfig;

function codeasset($path, $secure = null)
{
    if (!file_exists(public_path($path))) {
        /** @var AppConfig $appConfig */
        $appConfig = app(AppConfig::class);
        $frontLayout = $appConfig->frontLayout;
        $path = ltrim($path, '/');
        $path = "$frontLayout/$path";
    }

    return asset($path, $secure);
}
