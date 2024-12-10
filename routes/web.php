<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin-login',[AdminController::class ,'adminlogin'])->name('admin-login');


Route::post('admin-login-post',[AdminController::class ,'adminLoginPost'])->name('admin-login-post');
Route::get('dashboard',[AdminController::class ,'dashboard'])->name('dashboard');
Route::resource('employees', EmployeeController::class);
Route::resource('salaries', SalaryController:: class);
