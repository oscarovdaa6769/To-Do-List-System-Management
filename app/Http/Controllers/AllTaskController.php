<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AllTaskController extends Controller
{
    public function index(Request $request) {

        $filter = $request->query('filter');
        $search = $request->query('search');

        $query = Task::query();

        if (!empty($search)) {
            $query->where('task_title', 'like', '%' . $search . '%');
        }

        if ($request->has('filter')) {
            $filter = $request->get('filter');
        }

        if ($filter == 'completed') {
            $query->where('completed', 1);
        } elseif ($filter == 'pending') {
            $query->where('completed', 0);
        } elseif ($filter == 'high priority') {
            $query->where('priority', 'high');
        }

        $tasks = $query->latest()->paginate(4)->withQueryString();
        return view('tasks.index', compact('tasks', 'filter', 'search'));
    }

    public function store(Request $request) {

        Task::create([
            'task_title' => $request->input('task_title'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);

        return redirect()->back()->with('success', 'Task created :)');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'task_title' => $request->input('task_title'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date')
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task updated :)');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted :(');
    }

    public function toggle(Request $request, Task $task)
    {
        $task->update([
            'completed' => $request->input('completed') == '1' ? 1 : 0
        ]);
        return back();
    }
}
