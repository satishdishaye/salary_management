<?php
namespace App\Console\Commands;

use App\Models\Salary;
use Illuminate\Console\Command;

class CalculateSalaries extends Command
{ 
    protected $signature = 'salaries:calculate';

    protected $description = 'Calculate the salaries for the month where is_salary_calculated is 0';

    public function handle()
    {
        app('App\Http\Controllers\SalaryController')->calculateSalaries();
        $this->info('Salaries have been successfully calculated!');
    }
}
