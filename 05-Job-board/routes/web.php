<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Middleware\Employer;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class)
        ->only(['index', 'show']);

Route::get('auth/login', [AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('auth/register', [AuthController::class, 'create'])->name('auth.create');
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
ROute::delete('auth', [AuthController::class, 'destroy'])
        ->name('auth.destroy');

Route::middleware('auth')->group(function(){
    Route::resource('job.application', JobApplicationController::class)
                ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)
                ->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)
                ->only(['create', 'store']);

    Route::middleware(Employer::class)
        ->resource('my-jobs', MyJobController::class);
});
