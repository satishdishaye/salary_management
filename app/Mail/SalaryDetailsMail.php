<?php

namespace App\Mail;

use App\Models\Salary;
use Illuminate\Mail\Mailable;

class SalaryDetailsMail extends Mailable
{
    public $salary; 

    public function __construct(Salary $salary)
    {
        $this->salary = $salary;
    } 

    public function build()
    {
        return $this->subject('Your Salary Details') 
                    ->view('emails.salary_details'); 
    }
}
