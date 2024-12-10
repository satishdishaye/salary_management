<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee', compact('employees'));
    }

    public function create()
    {

        return view('add-employee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required',
            'address' => 'required',
            'base_salary' => 'required|numeric',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('edit-employee', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'mobile' => 'required',
            'address' => 'required',
            'base_salary' => 'required|numeric',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
