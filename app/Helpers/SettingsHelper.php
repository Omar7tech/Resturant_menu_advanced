<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class SettingsHelper
{
    private static $settings;

    private static function loadSettings()
    {
        if (is_null(self::$settings)) {
            $path = storage_path('settings.json');
            if (file_exists($path)) {
                self::$settings = json_decode(file_get_contents($path), true);
            } else {
                self::$settings = []; // Default empty array if file doesn't exist
            }
        }
        return self::$settings;
    }

    public static function get($key)
    {
        $settings = self::loadSettings();
        return $settings[$key] ?? null; // Return null if the key doesn't exist
    }

    public static function set($key, $value)
    {
        $settings = self::loadSettings();

        // Update or add the setting
        $settings[$key] = $value;

        // Save back to the JSON file
        $path = storage_path('settings.json');
        file_put_contents($path, json_encode($settings, JSON_PRETTY_PRINT));
    }
}
