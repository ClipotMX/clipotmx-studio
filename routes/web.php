<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;



//This will be the login screen
Route::get('/login', function () {
    return view('login');
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Auth::routes();

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Ensure these routes are present for login functionality
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);


Route::middleware('auth')->group(function () {

    //ADMIN DASHBOARD
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    //USER DASHBOARD
    Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
    Route::get('/user/reports', [UserController::class, 'dashboard'])->name('user.reports');
});





