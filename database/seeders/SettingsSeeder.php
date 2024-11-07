<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settingsData = [
            ['key' => 'display', 'value' => 'cards'],
            ['key' => 'show_image', 'value' => 'true'],
            ['key' => 'show_description', 'value' => 'false'],
            ['key' => 'show_menu', 'value' => 'true'],
            ['key' => 'show_title', 'value' => 'true'],
            ['key' => 'show_search', 'value' => 'true'],
            ['key' => 'show_footer', 'value' => 'true'],
            ['key' => 'show_food_count', 'value' => 'true'],
            ['key' => 'allow_theme_change', 'value' => 'true'],
            ['key' => 'show_features', 'value' => 'true'],
            ['key' => 'show_calories', 'value' => 'false'],
            ['key' => 'show_preparation_time', 'value' => 'true'],
            ['key' => 'menu_design', 'value' => '1'],
            ['key' => 'currency', 'value' => '$'],
            ['key' => 'show_as_categorized', 'value' => 'true'],
            ['key' => 'show_uncategorized', 'value' => 'true'],
            ['key' => 'name', 'value' => 'Big Bunz'],
        ];

        foreach ($settingsData as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
