<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Assets::orderBy('id', 'desc')->paginate(5);
        $totalEmployees = Employee::count();
        $totalDevelopers = Employee::where('role', 'Developer')->count();
        $totalDesigners = Employee::where('role', 'UI Designer')->count();
        $totalTesters = Employee::where('role', 'Tester')->count();

        return view('employees', compact('employees', 'totalEmployees', 'totalDevelopers', 'totalDesigners', 'totalTesters'));
    }
}
