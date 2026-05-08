<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class AllTaskController extends Controller
{
    public function index() {
        return view('all_tasks.index');
    }

    public function store(Request $request) {

        Tasks::create([
            'task_title' => $request->input('task_title'),
            'status' => $request->input('status'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);

    }
}
