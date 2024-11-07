<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    public function index()
    {
        return view(view: "settings.index");
    }





    public function store(Request $request)
{
    // Define validation rules
    $validatedData = $request->validate([
        'display' => 'required|in:cards,list',
        'show_image' => 'required|in:true,false',
        'show_description' => 'required|in:true,false',
        'show_menu' => 'required|in:true,false',
        'show_title' => 'required|in:true,false',
        'show_search' => 'required|in:true,false',
        'show_footer' => 'required|in:true,false',
        'show_food_count' => 'required|in:true,false',
        'allow_theme_change' => 'required|in:true,false',
        'show_features' => 'required|in:true,false',
        'show_calories' => 'required|in:true,false',
        'show_preparation_time' => 'required|in:true,false',
        'show_as_categorized' => 'required|in:true,false',
        'show_uncategorized' => 'required|in:true,false',
        'menu_design' => 'required|in:1,2',
        'currency' => 'required|string|max:10',
        'name' => 'required|string|max:255',
    ]);

    // Update settings in the database
    foreach ($validatedData as $key => $value) {
        $setting = Setting::updateOrCreate(['key' => $key], ['value' => $value]);

        // Log the result
        Log::info('Updated setting:', ['key' => $key, 'value' => $value, 'result' => $setting]);
    }

    return redirect()->back()->with('success', 'Settings updated successfully.');
}





}
