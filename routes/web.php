<?php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('companies', App\Http\Controllers\CompanyController::class);
Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);