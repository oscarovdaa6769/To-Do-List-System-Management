@extends('layouts.app')
@section('content')
    <div class="block">
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-bold font-display">Good Morning, {{Auth::user()->name ?? 'User'}}!</h1>
                <p class="text-gray-700">Here’s what’s happening with your tasks today.</p>
            </div>
            <div class="flex gap-2 mt-4">
                <div class="bg-blue-500 rounded-lg w-10 h-10 py-1.5 px-1 flex items-center justify-center">
                    <x-solar-bell-bold class="w-5 h-5 text-white"></x-solar-bell-bold>
                </div>
                <div class="bg-blue-500 rounded-lg w-10 h-10 py-1.5 px-1 flex items-center justify-center">
                    <x-solar-inbox-bold class="w-5 h-5 text-white"></x-solar-inbox-bold>
                </div>
            </div>
        </div>
        @include('dashboard.box-dashboard')
        <div class="">
            @include('dashboard.under-box')
        </div>

    </div>
@endsection
