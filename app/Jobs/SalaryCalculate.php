<?php

namespace App\Jobs;

use App\Models\Salary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalaryDetailsMail;

class SalaryCalculate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
     
        $salaries = Salary::where('is_salary_calculated', 0)->get();


        // dd( $salaries );

        foreach ($salaries as $salary) {
            
            $totalSalary = ($salary->per_day_salary * ($salary->employee->working_days - $salary->leaves_taken)) + ($salary->overtime / 8);
            $salary->total_salary_made = $totalSalary;
            $salary->is_salary_calculated = 1;
            $salary->save();

            
            Mail::to($salary->employee->email)->queue(new SalaryDetailsMail($salary));
        }

        \Log::info('Salaries calculated successfully.');
    }
}
