<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// General Pages
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

// Auth
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Others
Route::get('test', [TestController::class, 'index'])->name('test');
Route::get('setup', [TestController::class, 'defaultConfig'])->name('defaultConfig');
