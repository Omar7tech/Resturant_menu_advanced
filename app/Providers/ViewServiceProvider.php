<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Fetch settings from the database and convert to associative array
        $settings = Setting::pluck('value', 'key')->toArray();
        view()->share('settings', $settings);
    }

    public function register()
    {
        //
    }
}
