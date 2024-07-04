<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Assets;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function developers()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('employee.developers', compact('employees'));
    }

    public function designers()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('employee.designers', compact('employees'));
    }

    public function testers()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('employee.testers', compact('employees'));
    }

    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('employee.index', compact('employees'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('employee.create'); // Removed compact('employees')
    }
    

    /**
   * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees')->with('success', 'Employee has been added successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Assets  $employee
    * @return \Illuminate\Http\Response
    */
    public function show(Assets $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'uid' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'role' => 'required',
            'address' => 'required',
        ]);

        $employee->fill($request->all())->save();

        return redirect()->route('employee.index')->with('success', 'Employee has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', 'Employee has been deleted successfully');
    }
}
