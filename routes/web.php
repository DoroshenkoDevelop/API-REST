<?php


use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.layout');
});
Route::resource('employees', EmployeeController::class);
Route::resource('destroy', EmployeeController::class);

Route::resource('departments', DepartmentController::class);
Route::resource('destroy', EmployeeController::class);

