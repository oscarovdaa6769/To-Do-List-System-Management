@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold font-display">Account Settings</h1>
            <p class="text-gray-700">Manage your profile details, security, and preferences.</p>
        </div>
    </div>

    <div class="mt-8 p-8 flex flex-col md:flex-row gap-8 w-full h-auto bg-background rounded-2xl"
         x-data="{ activeTab: 'profile' }">

        <div class="w-full md:w-1/4 flex flex-col space-y-2">
            <button
                @click="activeTab = 'profile'"
                :class="activeTab === 'profile' ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                class="w-full text-left font-medium px-4 py-3 rounded-2xl transition duration-150 ease-in flex items-center justify-between"
            >
                Profile Information
                <x-solar-user-linear class="w-5 h-5"/>
            </button>

            <button
                @click="activeTab = 'security'"
                :class="activeTab === 'security' ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                class="w-full text-left font-medium px-4 py-3 rounded-2xl transition duration-150 ease-in flex items-center justify-between"
            >
                Security
                <x-solar-lock-keyhole-linear class="w-5 h-5"/>
            </button>
        </div>

        <div class="w-full md:w-3/4 bg-white p-6 md:p-8 rounded-2xl border border-gray-200">

            <div x-show="activeTab === 'profile'" x-cloak class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold font-display text-gray-900">Profile Information</h2>
                    <p class="text-sm text-gray-400">Update your account's profile information and email address.</p>
                </div>

                <hr class="border-gray-200">

                <form action="{{ route('account.profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" value="{{ auth()->user()->name ?? 'John Doe' }}" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-gray-900">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" value="{{ auth()->user()->email ?? 'johndoe@example.com' }}" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary text-gray-900">
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-6 py-2 text-white rounded-2xl flex items-center gap-2 font-medium">
                            Save Changes <x-solar-check-circle-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'security'" x-cloak class="space-y-6">
                <div>
                    <h2 class="text-xl font-bold font-display text-gray-900">Update Password</h2>
                    <p class="text-sm text-gray-400">Ensure your account is using a long, random password to stay secure.</p>
                </div>

                <hr class="border-gray-200">

                <form action="{{ route('user-password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" name="current_password" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="password" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="password_confirmation" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-6 py-2 text-white rounded-2xl flex items-center gap-2 font-medium">
                            Update Password <x-solar-lock-keyhole-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
