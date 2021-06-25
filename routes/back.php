<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\Auth\AuthController;
use App\Http\Controllers\Back\Auth\ForgotPasswordController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Back\UserController;
use Illuminate\Support\Facades\Route;

// Admin Auth
Route::get('login', [AuthController::class, 'login'])->name('back.login');
Route::post('login', [AuthController::class, 'loginSubmit']);

// Admin Password Reset
Route::get('/password/email', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('back.password.email');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('back.password.request');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset']);
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('back.password.reset');

Route::middleware('auth:back')->group(function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('back.dashboard');

    // Admin CRUD
    Route::resource('admins', AdminController::class, ['as' => 'back']);

    // User CRUD
    Route::resource('users', UserController::class, ['as' => 'back']);

    // Admin Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('back.profile');
    Route::post('profile', [ProfileController::class, 'profileSubmit']);

    // Settings
    Route::get('info', [SettingsController::class, 'info'])->name('back.info');
    Route::post('info', [SettingsController::class, 'infoSubmit']);
});
