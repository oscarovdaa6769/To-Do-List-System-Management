<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total    = Task::count();
        $pending  = Task::where('status', 'pending')->count();
        $complete = Task::where('status', 'complete')->count();
        $high     = Task::where('status', 'high')->count();
        $completePercent   = Task::latest()->take($total)->get();
        $pendingPercen = Task::latest()->take($total)->get();
        $highPercent = Task::latest()->take($total)->get();
        return view('dashboard.index', compact(
            'total', 'pending', 'complete', 'high', 'completePercent','pendingPercen','highPercent'
        ));
    }

    
}