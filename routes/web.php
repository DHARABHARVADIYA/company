<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;





Route::get('/', function () {
    return redirect()->route('login'); 
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::resource('customers', CustomerController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Show profile form

    // Route to update the profile
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
  
});
