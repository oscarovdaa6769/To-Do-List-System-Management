<?php
namespace App\Http\Controllers;
use App\Models\Tasks;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total    = Tasks::count();
        $pending  = Tasks::where('status', 'pending')->count();
        $complete = Tasks::where('status', 'complete')->count();
        $high     = Tasks::where('status', 'high')->count();
        $completePercent   = Tasks::latest()->take($total)->get();
        $pendingPercen = Tasks::latest()->take($total)->get();
        $highPercent = Tasks::latest()->take($total)->get();
        return view('dashboard.index', compact(
            'total', 'pending', 'complete', 'high', 'completePercent','pendingPercen','highPercent'
        ));
    }

    
}