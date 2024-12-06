<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalaryDetailsMail; 

class SalaryController extends Controller
{
    public function create()
    {
        $employees = Employee::all();
        return view('add-salary', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:2100',
            'total_working_days' => 'required|integer|min:1',
            'total_leave_taken' => 'required|integer|min:0',
            'overtime' => 'required|integer|min:0',
        ]);

        $existingSalary = Salary::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->first();

        if ($existingSalary) {
            return redirect()->back()->withErrors('Salary for this employee has already been inserted for the given month/year.');
        }

        Salary::create([
            'employee_id' => $request->employee_id,
            'month' => $request->month,
            'year' => $request->year,
            'total_working_days' => $request->total_working_days,
            'total_leave_taken' => $request->total_leave_taken,
            'overtime' => $request->overtime,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary record created successfully.');
    }

    public function index()
    {
        $salaries = Salary::where('is_salary_calculated', 1)->paginate(10);
        return view('salary-management', compact('salaries'));
    }




    public function calculateSalaries()
    {
        $salaries = Salary::where('is_salary_calculated',0)->get();

        foreach ($salaries as $salary) {
            $totalSalary = ($salary->per_day_salary * ($salary->employee->working_days - $salary->leaves_taken)) + ($salary->overtime / 8);
            $salary->total_salary_made = $totalSalary;
            $salary->is_salary_calculated = 1;
            $salary->save();
            Mail::to($salary->employee->email)->queue(new SalaryDetailsMail($salary));
        }

        return response()->json(['message' => 'Salaries calculated successfully.']);
    }

}

