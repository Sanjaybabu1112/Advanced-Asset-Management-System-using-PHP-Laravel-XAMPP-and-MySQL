<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AssignController;
 
Route::resource('assigns', AssignController::class);

Route::resource('assets', AssetsController::class);

Route::resource('employee', EmployeeController::class);

Route::resource('employees', EmployeeController::class);

Route::get('/developers', [EmployeeController::class, 'developers'])->name('employee.developers');

Route::get('/designers', [EmployeeController::class, 'designers'])->name('employee.designers');

Route::get('/testers', [EmployeeController::class, 'testers'])->name('employee.testers');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('/total', [DashboardController::class, 'total'])->name('assets.total');

Route::get('/assigned', [DashboardController::class, 'assigned'])->name('assets.assigned');

Route::get('/available', [DashboardController::class, 'available'])->name('assets.available');

Route::get('/deadline', [DashboardController::class, 'deadline'])->name('assigns.deadline');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
