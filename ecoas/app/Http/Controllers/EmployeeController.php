<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $employees = \App\Models\Employee::all();
    return view('employees.index', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|min:5|max:20',
        'age' => 'required|integer|gt:20',
        'address' => 'required|string|min:10|max:40',
        'phone' => ['required','regex:/^08[0-9]{7,10}$/']
    ]);

    Employee::create($validated);

    return redirect()->route('employees.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
    return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Employee $employee)
    {
    $validated = $request->validate([
        'name' => 'required|string|min:5|max:20',
        'age' => 'required|integer|gt:20',
        'address' => 'required|string|min:10|max:40',
        'phone' => ['required','regex:/^08[0-9]{7,10}$/']
    ]);

    $employee->update($validated);

    return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
    $employee->delete();
    return redirect()->route('employees.index');
    }
}
