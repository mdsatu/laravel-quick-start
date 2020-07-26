<?php

// Admin Auth
Route::get('login',                 'Back\Auth\AuthController@login')               ->name('back.login');
Route::post('login',                'Back\Auth\AuthController@loginSubmit');

// Admin Password Reset
Route::get('/password/email',           'Back\Auth\ForgotPasswordController@showLinkRequestForm')   ->name('back.password.email');
Route::post('/password/email',          'Back\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset',           'Back\Auth\ForgotPasswordController@showLinkRequestForm')   ->name('back.password.request');                                     
Route::post('/password/reset',          'Back\Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}',   'Back\Auth\ResetPasswordController@showResetForm')          ->name('back.password.reset');

Route::middleware('auth:back')->group(function (){
    Route::get('/',                     'Back\DashboardController@dashboard')           ->name('back.dashboard');

    // Admin CRUD
    Route::resource('admins', 'Back\AdminController', ['as' => 'back']);

    // User CRUD
    Route::resource('users', 'Back\UserController', ['as' => 'back']);
    
    // Admin Profile
    Route::get('profile',               'Back\ProfileController@index')                 ->name('back.profile');
    Route::post('profile',              'Back\ProfileController@profileSubmit');
    
    // Settings
    Route::get('info',                  'Back\SettingsController@info')                 ->name('back.info');
    Route::post('info',                 'Back\SettingsController@infoSubmit');
});