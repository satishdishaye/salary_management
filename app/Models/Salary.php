<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id', 'month', 'year','total_working_days', 'total_leave_taken', 'overtime', 'total_salary_made', 'is_salary_calculated'
    ];
    public function employee()
    
    {
        return $this->belongsTo(Employee::class);
    }
}
