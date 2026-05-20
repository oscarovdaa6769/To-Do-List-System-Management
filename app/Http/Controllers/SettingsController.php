<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        return view('settings.index', compact('user'));
    }

    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        $user->update($request->only(['theme', 'timezone']));

        return redirect()->route('settings.index')->with('status', 'preferences-updated');
    }

    public function updateNotifications(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        $settingsData = [
            'email_updates' => $request->has('email_updates') ? 1 : 0,
            'reminders' => $request->has('reminders') ? 1 : 0,
        ];

        $user->update($settingsData);

        return redirect()->route('settings.index')->with('status', 'notifications-updated');
    }
}
