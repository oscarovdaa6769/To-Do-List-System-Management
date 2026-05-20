<?php
namespace App\Http\Controllers;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $total    = Task::count();
        $pending  = Task::where('completed', false)->count();
        $complete = Task::where('completed', true)->count();
        $high     = Task::where('priority', 'high')->count();
        $completePercent   = Task::latest()->take($total)->get();
        $pendingPercen = Task::latest()->take($total)->get();
        $highPercent = Task::latest()->take($total)->get();
        return view('dashboard.index', compact(
            'total', 'pending', 'complete', 'high', 'completePercent','pendingPercen','highPercent'
        ));
    }


}
