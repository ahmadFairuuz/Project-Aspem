<?php

if (!function_exists('public_asset')) {
    function public_asset($path)
    {
        // Untuk akses file di htdocs/assets/
        return url('/assets') . '/' . ltrim($path, '/');
    }
}