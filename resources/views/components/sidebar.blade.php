<aside class="bg-primary text-white w-64 min-h-screen">
    <div class="px-4 py-8 flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-8">
        <h1 class="text-xl font-bold ml-2 font-display">impleTrack To-Do</h1>
    </div>
    <nav class="p-4">
        <ul class="space-y-2">
            <li class="font-display text-md">Main</li>
            <li><a href="{{ route('dashboard') }}" class="hover:bg-secondary px-6 py-2 flex items-center gap-2 rounded-lg"><x-solar-home-2-bold class="w-5 h-5"/>Dashboard</a></li>
            <li><a href="{{ route('tasks.index') }}" class="hover:bg-secondary px-6 py-2 flex items-center gap-2 rounded-lg"><x-solar-checklist-minimalistic-bold class="w-5 h-5"/>All Tasks</a></li>
            <li class="font-display text-md">Setting</li>
            <li><a href="{{ route('setting.index') }}" class="hover:bg-secondary px-6 py-2 flex items-center gap-2 rounded-lg"><x-solar-settings-minimalistic-bold class="w-5 h-5"/>Setting</a></li>
        </ul>
    </nav>
    <div class="p-4 fixed bottom-0 w-64">
        <div class="profile flex items-center mb-4">
            <img src="{{ asset('images/profile.png') }}" alt="Profile" class="h-10 w-10 rounded-full">
            <div class="ml-3">
                <p class="text-md font-medium font-display">John Doe</p>
            </div>
        </div>
        <button class="w-full bg-secondary text-white px-6 py-2 rounded-lg hover:bg-secondary/80 flex items-center gap-2">
            <x-solar-logout-bold class="w-5 h-5"/>Logout
        </button>
    </div>
</aside>
