<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeInfoController;
use App\Http\Controllers\CustomerInfoController;
use App\Http\Controllers\EmployeeAddController;
use App\Http\Controllers\CustomerAddController;
use App\Http\Controllers\PlotInfoController;
use App\Http\Controllers\PlotAddController;

//welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

//Sign up
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

// Sign-in
Route::get('/signin', [SigninController::class, 'showSigninForm'])->name('signin.form');
Route::post('/signin', [SigninController::class, 'signin'])->name('signin');

// Logout
Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

//Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



//plot
Route::get('/plot/info', [PlotInfoController::class, 'index'])->name('plot.info');
Route::post('/plot/info/search', [PlotInfoController::class, 'search'])->name('plot.info.search');
Route::get('/plot/add', [PlotAddController::class, 'index'])->name('plot.add.submit');
Route::post('/plot/add', [PlotAddController::class, 'addPlot'])->name('plot.add');
Route::get('/plot/update', [PlotAddController::class, 'index'])->name('plot.update');
Route::post('/plot/update', [PlotAddController::class, 'updatePlot'])->name('plot.update');
Route::get('/plot/delete', [PlotAddController::class, 'index'])->name('plot.delete');
Route::post('/plot/delete', [PlotAddController::class, 'deletePlot'])->name('plot.delete');
Route::get('/get-crops/{plotNumber}', [PlotAddController::class, 'getCropsForPlot'])->name('get.crops');


// Employees
Route::get('/employee/info', [EmployeeInfoController::class, 'index'])->name('employee.info');
Route::get('/employee/info/search', [EmployeeInfoController::class, 'search'])->name('employee.info.search');
Route::get('/employee/add', [EmployeeAddController::class, 'index'])->name('employee.add');
Route::post('/employee/add', [EmployeeAddController::class, 'addEmployee'])->name('employee.add.submit');
Route::post('/employee/update', [EmployeeAddController::class, 'updateEmployee'])->name('employee.update');
Route::post('/employee/delete', [EmployeeAddController::class, 'deleteEmployee'])->name('employee.delete'); 


//Customers
Route::get('/customer/info', [CustomerInfoController::class, 'index'])->name('customer.info');
Route::post('/customer/search', [CustomerInfoController::class, 'search'])->name('customer.search');
Route::get('/customer/add', [CustomerAddController::class, 'index'])->name('customer.add');
Route::post('/customer/add', [CustomerAddController::class, 'addCustomer'])->name('customer.add.submit');
Route::post('/customer/update', [CustomerAddController::class, 'updateCustomer'])->name('customer.update');
Route::post('/customer/delete', [CustomerAddController::class, 'deleteCustomer'])->name('customer.delete');

//Warehouse
Route::get('/warehouse/info', [WarehouseInfoController::class, 'index'])->name('warehouse.info');
Route::get('/warehouse/info/search', [WarehouseInfoController::class, 'search'])->name('warehouse.info.search');
Route::get('/warehouse/add', [WarehouseAddController::class, 'index'])->name('warehouse.add');
Route::post('/warehouse/add', [WarehouseAddController::class, 'addWarehouse'])->name('warehouse.add.submit');
Route::post('/warehouse/update', [WarehouseAddController::class, 'updateWarehouse'])->name('warehouse.update');

