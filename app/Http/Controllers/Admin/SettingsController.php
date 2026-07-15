<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public const KEYS = [
        'about_intro', 'about_mission', 'about_vision',
        'contact_phone', 'contact_address', 'contact_po_box', 'contact_email',
        'social_instagram_url', 'social_twitter_url', 'social_facebook_url',
    ];

    public function edit()
    {
        $settings = [];
        foreach (self::KEYS as $key) {
            $settings[$key] = Setting::get($key, '');
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'about_intro' => ['nullable', 'string'],
            'about_mission' => ['nullable', 'string'],
            'about_vision' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string', 'max:50'],
            'contact_address' => ['nullable', 'string', 'max:255'],
            'contact_po_box' => ['nullable', 'string', 'max:100'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'social_instagram_url' => ['nullable', 'url', 'max:255'],
            'social_twitter_url' => ['nullable', 'url', 'max:255'],
            'social_facebook_url' => ['nullable', 'url', 'max:255'],
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('status', 'Settings updated.');
    }
}
