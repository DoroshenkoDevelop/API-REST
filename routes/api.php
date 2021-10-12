<?php

use App\Http\Controllers\ApiDepartmentController;
use App\Http\Controllers\ApiEmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.layout');
});
Route::get('employees', [ApiEmployeeController::class,'index']);
Route::get('employees/{id}/show', [ApiEmployeeController::class,'show']);
Route::post('employees/add', [ApiEmployeeController::class,'store']);
Route::put('employees/{id}/update', [ApiEmployeeController::class,'update']);
Route::delete('employees/{id}/delete',[ApiEmployeeController::class,'destroy']);

Route::get('departments', [ApiDepartmentController::class,'index']);
Route::get('departments/{id}/show', [ApiDepartmentController::class,'show']);
Route::post('departments/add', [ApiDepartmentController::class,'store']);
Route::put('departments/{id}/update', [ApiDepartmentController::class,'update']);
Route::delete('departments/{id}/delete',[ApiDepartmentController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


