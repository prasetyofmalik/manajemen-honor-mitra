<?php

namespace App\Helpers;

use Config\App;
use Config\Services;

helper('url');

class UrlHelper
{
    /**
     * Get the base URL from configuration
     *
     * @return string
     */
    public static function baseUrl(): string
    {
        $config = new App();
        return Services::request()->getServer('HTTP_HOST') ? 'http://' . Services::request()->getServer('HTTP_HOST') . '/' : $config->baseURL;
    }

    /**
     * Generate a full URL from a path
     *
     * @param string $path
     * @return string
     */
    public static function url(string $path = ''): string
    {
        $config = new App();
        $baseUrl = $config->baseURL;
        return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
    }

    /**
     * Generate asset URL
     *
     * @param string $path
     * @return string
     */
    public static function asset(string $path = ''): string
    {
        return self::url('assets/' . ltrim($path, '/'));
    }

    /**
     * Generate route URL using CodeIgniter's route helper
     *
     * @param string $route
     * @param mixed $params
     * @return string
     */
    public static function route(string $route, $params = []): string
    {
        return route_to($route, ...(array)$params);
    }
}
