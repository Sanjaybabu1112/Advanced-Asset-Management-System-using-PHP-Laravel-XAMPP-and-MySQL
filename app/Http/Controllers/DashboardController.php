<?php

namespace App\Http\Controllers;
use App\Models\Assets;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Assign;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAssets = Assets::count();
        $assignedAssets = Assign::count();
        $availableAssets = $totalAssets-$assignedAssets;
        $maintenance = Assets::where('condition', 'damaged')->count();

        // Fetching assets with upcoming or overdue deadlines within one week
        $deadlineAssets = Assign::where(function($query) {
            $query->whereDate('deadline', '<=', Carbon::now()->addWeek()); // Deadline within the next week
        })
        ->orWhere(function($query) {
            $query->whereDate('deadline', '<', Carbon::now()); // Deadline already passed
        })
        ->count();

        return view('dashboard', compact('totalAssets', 'availableAssets', 'assignedAssets', 'maintenance', 'deadlineAssets'));
    }

    public function total()
    {
        $assets = Assets::orderBy('id', 'desc')->get(); // Fetch all assets
        return view('assets.total', compact('assets'));
    }

    public function assigned()
    {
        $assets = Assets::orderBy('id', 'desc')->get(); // Fetch all assets
        return view('assets.assigned', compact('assets'));
    }

    public function available()
    {
        $assets = Assets::orderBy('id', 'desc')->get(); // Fetch all assets
        $matching = Assign::orderBy('id', 'desc')->get();
        return view('assets.available', compact('assets'), compact('matching'));
    }

    public function deadline()
    {
        $assigns = Assign::orderBy('id', 'desc')->get(); // Fetch all assets
        return view('assigns.deadline', compact('assigns'));
    }
}
