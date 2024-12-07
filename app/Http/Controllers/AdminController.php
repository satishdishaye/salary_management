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




class AdminController extends Controller
{
    public function Adminlogin(){
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

    public function dashboard()
    {
       
        
        return view('dashboard',['Allpost'=>1]);
    }
    
    public function adminLogout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->flush(); // Flushes the session of the admin guard
        $request->session()->regenerateToken();
        return redirect('admin-login')->with('success', 'LogOut successful.');
    }
}
