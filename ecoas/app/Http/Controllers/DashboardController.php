<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
          return redirect('/');
        }

        $employees = Employee::all();
        return view('admin.dashboard', compact('employees'));
    }

    public function handle(Request $request)
    {
        $mode = $request->mode;
         if (!session('admin_logged_in')) {
            return redirect('/');
        }
        // ADD MODE
        if ($mode === 'add') {
            $request->validate([
                'name' => 'required|string|min:5|max:20',
                'age' => 'required|integer|gt:20',
                'address' => 'required|string|min:10|max:40',
                'phone' => [
                   'required',
                   'string',
                   'min:9',
                   'max:12',
                   'regex:/^08[0-9]+$/'
                ],
            ]);


            Employee::create($request->only(['name', 'age', 'phone', 'address']));

            return redirect()->back()->with('success', 'Employee added successfully.');
        }

        // CHANGE MODE
        if ($mode === 'change') {

            $request->validate([
                'name' => 'required|string|min:5|max:20',
                'age' => 'required|integer|gt:20',
                'address' => 'required|string|min:10|max:40',
                'phone' => [
                   'required',
                   'string',
                   'min:9',
                   'max:12',
                   'regex:/^08[0-9]+$/'
                ],
            ]);

            $employee = Employee::where('name', $request->name)->first();

            if (!$employee) {
                return redirect()->back()->with('error', 'Employee not found.');
            }

            $employee->update($request->only(['age', 'phone', 'address']));

            return redirect()->back()->with('success', 'Employee updated successfully.');
        }

        // DELETE MODE
        if ($mode === 'delete') {

            $request->validate([
                'name' => 'required|string|min:5|max:20',
                'age' => 'required|integer|gt:20',
                'address' => 'required|string|min:10|max:40',
                'phone' => [
                   'required',
                   'string',
                   'min:9',
                   'max:12',
                   'regex:/^08[0-9]+$/'
                ],
            ]);

            $deleted = Employee::where('name', $request->name)
             ->where('age', $request->age)
                ->where('phone', $request->phone)
                ->where('address', $request->address)
                ->delete();

            if ($deleted) {
                return redirect()->back()->with('success', 'Employee deleted successfully.');
            }

            return redirect()->back()->with('error', 'Employee not found.');
        }

        return redirect()->back()->with('error', 'Invalid action.');
    }
}