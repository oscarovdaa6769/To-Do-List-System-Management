@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between">
        <div class="">
            <h1 class="text-2xl font-bold font-display">All tasks</h1>
            <p class="text-gray-700">Here you can view all your tasks.</p>
        </div>
        <div class="searchbar relative mt-4 w-100">
            <input type="text" placeholder="Search tasks..." class="w-full px-4 py-2 bg-background rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary">
            <x-solar-magnifer-linear class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 text-gray-500"/>
        </div>
    </div>
    <div class="mt-10 flex gap-2" x-data="{ show: false }">
        <button @click="show = !show" class="z-20 w-40 border border-gray-200 rounded-2xl flex items-center justify-between px-4 py-2">All tasks <span><x-solar-close-circle-broken class="w-5 h-5" x-show="show"/><x-solar-alt-arrow-right-broken class="w-5 h-5" x-show="!show" x-cloak/></span></button>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100' : 'opacity-0'">Pending</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-100' : 'opacity-0'">In-Progress</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-200' : 'opacity-0'">Completed</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-300' : 'opacity-0'">High Priority</div>
    </div>
    <div class="mt-4 p-4 w-full h-100 bg-background rounded-2xl">
        <button class="bg-primary px-4 py-2 text-white rounded-2xl flex items-center justify-between w-40">New Task <x-solar-add-circle-broken class="w-5 h-5"/></button>
    </div>
@endsection
