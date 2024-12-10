<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\User;
use App\Models\Employee;
use App\Models\Salary;

use Carbon\Carbon;



class AdminController extends Controller
{

    public function dashboard(){

        $total_employee = Employee::where('status', 1)->count();

        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;

        $this_month_attendance = Salary::where('month', $current_month)
                                        ->where('year', $current_year)
                                        ->count();

        $last_month = Carbon::now()->subMonth()->month; 
        $last_month_year = Carbon::now()->subMonth()->year; 

        $last_month_attendance = Salary::where('month', $last_month)
                                        ->where('year', $last_month_year)
                                        ->count();
                                        
        return view('dashboard',compact('total_employee','this_month_attendance','last_month_attendance'));
    }

    
    public function adminlogin(){
        return view('admin-login');
    }


    public function adminLoginPost(Request $request)
    {
       
        $request->validate([
            "email" => 'email|required',
            "password" => 'required'
        ]);
    
        
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

       
      
        if (Auth::guard('admins')->attempt($credentials)) {
          
            // Debugging or your actual logic
            $Admin = Auth::guard('admins')->user();

          
            return redirect('dashboard')->with('success', 'Login successful.');

        } else {
          
            return redirect()->back()->with('error', 'Invalid Username and Password');
        }
    
       
    }

   

    public function adminLogout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->flush(); // Flushes the session of the admin guard
        $request->session()->regenerateToken();
        return redirect('admin-login')->with('success', 'LogOut successful.');
    }
}
