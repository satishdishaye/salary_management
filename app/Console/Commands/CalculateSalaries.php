<?php
namespace App\Console\Commands;

use App\Models\Salary;
use Illuminate\Console\Command;
use App\Jobs\SalaryCalculate;


class CalculateSalaries extends Command
{ 
    protected $signature = 'salaries:calculate';

    protected $description = 'Calculate the salaries for the month where is_salary_calculated is 0';

    public function handle()
    {
        SalaryCalculate::dispatch();
        $this->info('Salaries have been successfully calculated!');
    }
}
