@extends('layouts.app')

@section('content')
    <div class="ml-10 mt-6 block font-display">
        <div class="flex justify-between mr-10">
            <div class="block">
                <h2 class="font-bold text-[32px]">
                    Settings
                </h2>
                <p class="text-gray-500">
                    Manage your preferences.
                </p>
            </div>
        </div>
        
        <div class="flex justify-center" style="margin-top: 20px;">
            @include('setting.preferences')
        </div>
        <div  class="flex justify-center" style="margin-top: 20px;">
            @include('setting.notifications')
        </div>

    </div>
@endsection