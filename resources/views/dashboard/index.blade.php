@extends('layouts.app')
@section('content')
    <div class="ml-10 mt-6 block">
        <div class="flex justify-between mr-10">
            <div class="block">
                <h2 class="font-bold font-display text-[32px]">
                    Good Morning, {{Auth::user()->name}}
                </h2>
                <p class="font-bold font-display text-[20px] text-gray-500">
                    Here’s what’s happening with your tasks today.
                </p>
            </div>
            <div class="flex gap-5 mt-4">
                <div class="bg-blue-500 rounded-lg w-10 h-10 py-1.5 px-1 text-white flex justify-center items-center">
                    <x-solar-bell-bold class="w-5 h-5"></x-solar-bell-bold>
                </div>
                <div class="bg-blue-500 rounded-lg w-10 h-10 py-1.5 px-1 text-white flex justify-center items-center">
                    <x-solar-inbox-bold class="w-5 h-5"></x-solar-inbox-bold>
                </div>
            </div>
        </div>
        @include('dashboard.box-dashboard')
        <div class="mr-6">
            @include('dashboard.under-box')
        </div>

    </div>
@endsection
