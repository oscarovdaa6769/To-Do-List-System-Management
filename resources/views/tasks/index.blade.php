@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between">
        <div class="">
            <h1 class="text-2xl font-bold font-display">All tasks</h1>
            <p class="text-gray-700">Here you can view all your tasks.</p>
        </div>
        <form action="{{ route('tasks.index') }}" method="GET">
            @if (request('filter'))
                <input type="hidden" name="filter" value="{{ request('filter') }}">
            @endif
            <div class="searchbar relative mt-4 w-100">
                <input type="text" placeholder="Search tasks..." class="w-full px-4 py-2 bg-background rounded-2xl focus:outline-none focus:ring-2 focus:ring-primary" value="{{ request('search') }}" name="search">
                @if(request('search'))
                    <button
                        type="button"
                        onclick="window.location.href='{{ route('tasks.index', request()->except('search')) }}'"
                        class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600"
                    >
                        <x-solar-close-circle-broken class="w-5 h-5" />
                    </button>
                @else
                    <x-solar-magnifer-linear class="w-5 h-5 absolute right-3 top-1/2 -translate-y-1/2 text-gray-500"/>
                @endif
            </div>
        </form>
    </div>
    <div class="mt-8 flex gap-2 relative" x-data="{ show: false, selectedTasks: '{{ ucfirst(request('filter', 'All Tasks')) }}', taskValue: '{{ request('filter', 'all') }}' }">
        <input type="hidden" name="tasks" :value="taskValue">
        <button
            class="w-40 border border-gray-200 rounded-2xl flex items-center justify-between px-4 py-2"
            @click="show = !show"
            :class="taskValue && taskValue !== 'all' ? 'text-gray-900 border-primary' : 'text-gray-400'"
        >
            <span
                x-text="selectedTasks"
            >
            </span>
            <span
                x-show="taskValue && taskValue !== 'all'" @click.stop="window.location.href = '{{ route('tasks.index') }}'" class="text-gray-400 hover:text-gray-600"
            >
            <x-solar-close-circle-broken
                class="w-5 h-5"
            />
            </span>
            <span
                x-show="!taskValue || taskValue === 'all'" class="text-gray-400 hover:text-gray-600"
            >
            <x-solar-alt-arrow-right-broken
                class="w-5 h-5"
            />
            </span>
        </button>
        <ul
            class="overflow-hidden flex items-center space-x-2 text-gray-400"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-x-4"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-cloak
        >
            <li
                @click="window.location.href = '{{ route('tasks.index', ['filter' => 'pending']) }}'"
                class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200"
            >
                Pending
            </li>
            <li
                @click="window.location.href = '?filter=in-progress'"
                class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200"
            >
                In-Progress
            </li>
            <li
                @click="window.location.href = '?filter=completed'"
                class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200"
            >
                Completed
            </li>
            <li
                @click="window.location.href = '?filter=high priority'"
                class="border border-gray-200 rounded-2xl w-36 text-center px-4 py-2 bg-white hover:bg-primary hover:text-white hover:border-white cursor-pointer transition-opacity ease-in duration-200"
            >
                High Priority
            </li>
        </ul>
    </div>
    <div x-data="{ showModal: false, showEdit: false, currentTask: { id: null, task_title: '', priority: '', due_date: '' } }" class="mt-4 p-4 flex flex-col w-full h-full bg-background rounded-2xl">
        <div class="w-full flex justify-end">
            <button @click="showModal = true" class="bg-primary hover:bg-secondary transition duration-150 ease-in px-4 py-2 text-white rounded-2xl flex items-center justify-between w-40">
                New Task <x-solar-add-circle-broken class="w-5 h-5"/>
            </button>
        </div>

        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-show="showModal" x-cloak>
            <div class="bg-white w-full max-w-lg p-8 rounded-2xl" @click.away="showModal = false">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-display text-xl">New Task</h2>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                        <x-solar-close-circle-bold class="w-5 h-5"></x-solar-close-circle-bold>
                    </button>
                </div>
                <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4 h-auto>
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
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" x-show="showEdit" x-cloak>
            <div class="bg-white w-full max-w-lg p-8 rounded-2xl" @click.away="showEdit = false">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-display text-xl">Edit Task</h2>
                    <button @click="showEdit = false" class="text-gray-400 hover:text-gray-600">
                        <x-solar-close-circle-bold class="w-5 h-5" />
                    </button>
                </div>

                <form :action="'/tasks/' + currentTask.id" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <label class="block text-sm font-medium">Task Title</label>
                        <input type="text" name="task_title" required
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-primary"
                            x-model="currentTask.title">
                    </div>

                    <div class="relative space-y-2" x-data="{ showDropDown: false }">
                        <label class="block text-sm font-medium">Priority Level</label>
                        <input type="hidden" name="priority" :value="currentTask.priority">
                        <div @click="showDropDown = !showDropDown"
                            class="relative cursor-pointer w-full border rounded-2xl px-4 py-2 flex items-center justify-between bg-white text-gray-900 border-primary">
                            <span x-text="currentTask.priority || 'Select Priority'"></span>
                            <x-solar-alt-arrow-down-broken class="w-5 h-5" />
                        </div>
                        <ul class="absolute z-50 w-full border border-gray-300 rounded-2xl overflow-hidden bg-white" x-show="showDropDown" @click.away="showDropDown = false">
                            <template x-for="p in ['low', 'medium', 'high']">
                                <li @click="currentTask.priority = p; showDropDown = false"
                                    class="hover:bg-primary hover:text-white px-4 py-2 cursor-pointer capitalize"
                                    x-text="p"></li>
                            </template>
                        </ul>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium">Due Date</label>
                        <input type="date" name="due_date" required x-model="currentTask.due_date"
                            class="block w-full border border-gray-300 rounded-2xl px-4 py-2 focus:outline-primary">
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" @click="showEdit = false" class="px-4 py-2 border border-gray-300 rounded-2xl ">Cancel</button>
                        <button type="submit" class="bg-primary hover:bg-secondary px-4 py-2 text-white rounded-2xl flex items-center gap-2">
                            Update Task <x-solar-add-circle-bold class="w-5 h-5"/>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white mt-2 rounded-2xl overflow-hidden border border-gray-300 h-auto">
            <table class="w-full text-left">
                <thead class="text-gray-500">
                    <tr>
                        <td class="w-12 px-6 py-5"></td>
                        <td class="w-1/2 px-6 py-5">Task</td>
                        <td class="w-1/8 px-6 py-5">Status</td>
                        <td class="px-6 py-5">Priority</td>
                        <td class="px-6 py-5">Due-Date</td>
                        <td class="px-6 py-5">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class="border-t border-gray-200 text-gray-400" x-data="{ completed: {{ $task->completed ? 'true' : 'false'}} }">
                        <td class="px-6 py-5">
                            <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="completed" value="0">
                            <input type="checkbox" x-model="completed" value="1" name="completed" onChange="this.form.submit()" {{ (int)$task->completed === 1 ? 'checked' : '' }}>
                            </form>
                        </td>
                        <td class="px-6 py-5" :class="completed ? 'line-through text-gray-400' : ''">{{ $task->task_title }}</td>
                        <td class="px-6 py-5">
                            <span x-text="completed ? 'Completed' : 'Pending'" :class="completed ? 'bg-green-500/20 bg-blur-md text-green-500' : 'bg-yellow-500/20 bg-blur-md text-yellow-500'" class="px-2 py-1 rounded-lg">
                                {{ $task->completed ? 'Completed' : 'Pending' }}
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            @php
                                $priority = strtolower($task->priority ?? 'high');

                                $color = match($priority) {
                                    'low' => 'bg-green-500/20 bg-blur-md text-green-500',
                                    'medium' => 'bg-yellow-500/20 bg-blur-md text-yellow-500',
                                    'high' => 'bg-red-500/20 bg-blur-md text-red-500',
                                    default => 'bg-gray-500/20 bg-blur-md text-gray-500'
                                };
                            @endphp
                            <span class="{{ $color }} px-2 py-1 rounded-lg">
                                {{ ucfirst($priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-5">{{ $task->due_date }}</td>
                        <td class="px-6 py-5 flex">
                            <button @click="showEdit = true;
                            currentTask = {
                            id: {{ $task->id }},
                            title: '{{ $task->task_title }}',
                            priority: '{{ $task->priority }}',
                            due_date: '{{ $task->due_date }}'
                            }">
                                <x-solar-pen-new-square-bold class="w-5 h-5 text-blue-500 cursor-pointer"></x-solar-pen-new-square-bold>
                            </button>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete me? :(')" class="flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <x-solar-trash-bin-2-bold class="w-5 h-5 text-red-500 cursor-pointer"></x-solar-trash-bin-2-bold>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between text-gray-400 mt-auto">
            @if ($tasks->onFirstPage())
                <span class="text-center w-36 text-gray-400 bg-gray-100 cursor-not-allowed px-4 py-2">
                    Previous
                </span>
            @else
                <a href="{{ $tasks->previousPageUrl() }}" class="text-center border border-gray-300 bg-white hover:bg-primary hover:border-primary hover:text-white transition-all duration-150 ease-in rounded-2xl px-4 py-2 w-36">
                    Previous
                </a>
            @endif
            <span>Page {{ $tasks->currentPage() }} of {{ $tasks->lastPage() }}</span>
            @if ($tasks->hasMorePages())
                <a href="{{ $tasks->nextPageUrl() }}" class="text-center border border-gray-300 bg-white hover:bg-primary hover:border-primary hover:text-white transition-all duration-150 ease-in rounded-2xl px-4 py-2 w-36">
                    Next
                </a>
            @else
                <span class="text-center w-36 text-gray-400 bg-gray-100 cursor-not-allowed px-4 py-2">
                    Next
                </span>
            @endif
        </div>
    </div>
@endsection
