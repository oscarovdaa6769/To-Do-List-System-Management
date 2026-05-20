@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold font-display">Application Settings</h1>
            <p class="text-gray-700">Configure your workspace preferences and notifications.</p>
        </div>
    </div>

    <div class="mt-8 p-8 flex flex-col md:flex-row gap-8 w-full h-auto bg-background rounded-2xl"
         x-data="{ activeTab: 'preferences' }">

        <div class="w-full md:w-1/4 flex flex-col space-y-2">
            <button
                @click="activeTab = 'preferences'"
                :class="activeTab === 'preferences' ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                class="w-full text-left font-medium px-4 py-3 rounded-2xl transition duration-150 ease-in flex items-center justify-between"
            >
                Preferences
                <x-solar-settings-linear class="w-5 h-5"/>
            </button>

            <button
                @click="activeTab = 'notifications'"
                :class="activeTab === 'notifications' ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                class="w-full text-left font-medium px-4 py-3 rounded-2xl transition duration-150 ease-in flex items-center justify-between"
            >
                Notifications
                <x-solar-bell-linear class="w-5 h-5"/>
            </button>
        </div>

        <div class="w-full md:w-3/4 bg-white p-6 md:p-8 rounded-2xl border border-gray-200">

            <div x-show="activeTab === 'preferences'" x-cloak class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold font-display text-gray-900">Preferences</h2>
                    <p class="text-sm text-gray-400">Customize how your dashboard behaves.</p>
                </div>

                <hr class="border-gray-200">

                <form action="{{ route('settings.preferences.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="relative space-y-2" x-data="{ showDropDown: false, selectedTheme: 'Light Theme', themeValue: 'light'}">
                        <label class="block text-sm font-medium text-gray-700">Interface Theme</label>
                        <input type="hidden" name="theme" :value="themeValue">
                        <div @click="showDropDown = !showDropDown" @click.away="showDropDown = false"
                            class="relative cursor-pointer w-full border border-gray-300 rounded-2xl px-4 py-2 flex items-center justify-between text-gray-900 bg-white hover:border-primary transition border-primary">
                            <span x-text="selectedTheme"></span>
                            <x-solar-alt-arrow-down-broken class="w-5 h-5" />
                        </div>
                        <ul class="absolute z-50 w-full border border-gray-300 rounded-2xl overflow-hidden bg-white mt-1" x-show="showDropDown" x-transition x-cloak>
                            <li @click="selectedTheme = 'Light Theme'; themeValue = 'light'; showDropDown = false" class="hover:bg-primary hover:text-white text-gray-600 px-4 py-2 transition cursor-pointer">Light Theme</li>
                            <li @click="selectedTheme = 'Dark Theme'; themeValue = 'dark'; showDropDown = false" class="hover:bg-primary hover:text-white text-gray-600 px-4 py-2 transition cursor-pointer">Dark Theme</li>
                        </ul>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Timezone</label>
                        <select name="timezone" class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-gray-900 bg-white">
                            <option value="UTC">UTC (Greenwich Mean Time)</option>
                            <option value="EST">EST (Eastern Standard Time)</option>
                            <option value="PST">PST (Pacific Standard Time)</option>
                        </select>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-6 py-2 text-white rounded-2xl flex items-center gap-2 font-medium">
                            Save Preferences <x-solar-check-circle-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'notifications'" x-cloak class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold font-display text-gray-900">Notification Channels</h2>
                    <p class="text-sm text-gray-400">Choose how and when you receive system updates.</p>
                </div>

                <hr class="border-gray-200">

                <form action="{{ route('settings.notifications.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="flex items-start gap-3 py-2">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="email_updates" id="email_updates" value="1" checked class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                        </div>
                        <label for="email_updates" class="text-sm">
                            <span class="block font-medium text-gray-900">Email Notifications</span>
                            <span class="text-gray-400 text-xs">Receive daily status summaries for upcoming or overdue tasks.</span>
                        </label>
                    </div>

                    <div class="flex items-start gap-3 py-2">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="reminders" id="reminders" value="1" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                        </div>
                        <label for="reminders" class="text-sm">
                            <span class="block font-medium text-gray-900">High-Priority Alerts</span>
                            <span class="text-gray-400 text-xs">Get instant notices whenever a high-priority assignment nears its deadline.</span>
                        </label>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-6 py-2 text-white rounded-2xl flex items-center gap-2 font-medium">
                            Save Channels <x-solar-bell-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
