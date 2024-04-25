<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::apiResource('project',ProjectController::class);
Route::apiResource('employee',EmployeeController::class);
Route::apiResource('department',DepartmentController::class);
Route::get('employeetrashed',[EmployeeController::class],'showTrashedEmployee');
Route::delete('forceDelete/{id}',[EmployeeController::class],'forceDelete');
Route::post('Restoe/{id}',[EmployeeController::class],'restoe');







