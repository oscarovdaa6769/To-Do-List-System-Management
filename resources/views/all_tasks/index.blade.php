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
    <div class="mt-8 flex gap-2" x-data="{ show: false }">
        <button @click="show = !show" class="z-20 w-40 border border-gray-200 rounded-2xl flex items-center justify-between px-4 py-2">All tasks <span><x-solar-close-circle-broken class="w-5 h-5" x-show="show"/><x-solar-alt-arrow-right-broken class="w-5 h-5" x-show="!show" x-cloak/></span></button>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100' : 'opacity-0'">Pending</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-100' : 'opacity-0'">In-Progress</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-200' : 'opacity-0'">Completed</div>
        <div class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200" :class="show ? 'opacity-100 delay-300' : 'opacity-0'">High Priority</div>
    </div>
    <div x-data="{ showModal: false }" class="mt-4 p-4 flex flex-col w-full h-full bg-background rounded-2xl">
        <div class="w-full flex justify-end">
            <button @click="showModal = true" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-4 py-2 text-white rounded-2xl flex items-center justify-between w-40">
                New Task <x-solar-add-circle-broken class="w-5 h-5"/>
            </button>
        </div>

        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-show="showModal" x-cloak>
            <div class="bg-white w-full max-w-lg p-8 rounded-2xl shadow-xl" @click.away="showModal = false">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-display text-xl">New Task</h2>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                        <x-solar-close-circle-bold class="w-5 h-5"></x-solar-close-circle-bold>
                    </button>
                </div>
                <form action="/all-tasks" method="POST" class="space-y-4 h-100">
                    @csrf
                    <div class="space-y-2">
                        <label class="block text-sm font-medium">Task Title</label>
                        <input type="text" name="task_title" required
                        class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-primary"
                        placeholder="What need to be done?">
                    </div>
                    <div class="relative space-y-2" x-data="{ showDropDown: false, selectedPriority: 'Select Priority', priorityValue: ''}">
                        <label class="block text-sm font-medium">Priority Level</label>
                        <input type="hidden" name="priority" :value="priorityValue">
                        <div @click="showDropDown = !showDropDown" @click.away="showDropDown = false"
                            class="relative cursor-pointer w-full border border-gray-300 rounded-2xl px-4 py-2 flex items-center justify-between text-gray-700 bg-white hover:border-primary transition"
                            :class="priorityValue ? 'text-gray-900 border-primary' : 'text-gray-400'">

                            <span x-text="selectedPriority"></span> <x-solar-alt-arrow-down-broken class="w-5 h-5"></x-solar-alt-arrow-down-broken>
                        </div>
                        <ul class="absolute z-50 w-full border border-gray-300 rounded-2xl overflow-hidden bg-white" x-show="showDropDown" x-transition x-cloak>
                            <li @click="selectedPriority = 'Low'; priorityValue = 'low'; showDropDown = false" class="hover:bg-primary hover:text-white text-gray-600 px-4 py-2 transition cursor-pointer">Low</li>
                            <li @click="selectedPriority = 'Medium'; priorityValue = 'medium'; showDropDown = false" class="hover:bg-primary hover:text-white text-gray-600 px-4 py-2 transition cursor-pointer">Medium</li>
                            <li @click="selectedPriority = 'High'; priorityValue = 'high'; showDropDown = false" class="hover:bg-primary hover:text-white text-gray-600 px-4 py-2 transition cursor-pointer">High</li>
                        </ul>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium">Due Date</label>
                        <input type="date" name="due_date" required
                        class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-primary">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-4 py-2 text-white rounded-2xl flex items-center justify-between w-40">
                            Create Task <x-solar-add-circle-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="bg-white mt-6 rounded-2xl overflow-hidden border border-gray-300 h-auto">
            <table class="w-full text-left">
                <thead class="text-gray-500">
                    <tr>
                        <td class="w-12 px-6 py-5"></td>
                        <td class="w-1/2 px-6 py-5">Task</td>
                        <td class="px-6 py-5">Status</td>
                        <td class="px-6 py-5">Priority</td>
                        <td class="px-6 py-5">Due-Date</td>
                        <td class="px-6 py-5">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200 text-gray-400">
                        <td class="px-6 py-5"><input type="checkbox"></td>
                        <td class="px-6 py-5">Watch Movie</td>
                        <td class="px-6 py-5">
                            @php
                                $status = strtolower($status ?? 'pending');

                                $color = match($status) {
                                    'pending' => 'bg-yellow-500/20 bg-blur-md text-yellow-500',
                                    'in-progress' => 'bg-blue-500/20 bg-blur-md text-blue-500',
                                    'completed' => 'bg-green-500/20 bg-blur-md text-green-500',
                                    default => 'bg-gray-500/20 bg-blur-md text-gray-500'
                                };
                            @endphp
                            <span class="{{ $color }} px-2 py-1 rounded-lg">
                                {{ ucfirst($status) }}
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            @php
                                $priority = strtolower($priority ?? 'high');

                                $color = match($priority) {
                                    'low' => 'bg-yellow-500/20 bg-blur-md text-yellow-500',
                                    'medium' => 'bg-blue-500/20 bg-blur-md text-blue-500',
                                    'high' => 'bg-red-500/20 bg-blur-md text-red-500',
                                    default => 'bg-gray-500/20 bg-blur-md text-gray-500'
                                };
                            @endphp
                            <span class="{{ $color }} px-2 py-1 rounded-lg">
                                {{ ucfirst($priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-5">2023-10-10</td>
                        <td class="px-6 py-5 flex   ">
                            <x-solar-pen-new-square-bold class="w-5 h-5 text-blue-500 cursor-pointer"></x-solar-pen-new-square-bold>
                            <x-solar-trash-bin-2-bold class="w-5 h-5 text-red-500 cursor-pointer"></x-solar-trash-bin-2-bold>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between text-gray-400 mt-auto">
            <button class="border border-gray-300 bg-white hover:bg-primary hover:border-primary hover:text-white transition-all duration-150 ease-in rounded-2xl px-4 py-2 w-36">Previous</button>
            <span>1 of 1</span>
            <button class="border border-gray-300 bg-white hover:bg-primary hover:border-primary hover:text-white transition-all duration-150 ease-in rounded-2xl px-4 py-2 w-36">Next</button>
        </div>
    </div>
@endsection
