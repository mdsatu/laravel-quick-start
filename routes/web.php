<?php

use Illuminate\Support\Facades\Route;

// Backend=======================================================================
// Admin Auth
Route::get('/admin-cp/login',            'Back\AuthController@login')                    ->name('back.login');
Route::post('/admin-cp/login',           'Back\AuthController@loginSubmit');


Route::prefix('admin-cp')->middleware('auth:admin')->group(function (){
    Route::get('/',                      'Back\DashboardController@dashboard')           ->name('back.dashboard');

    // Admin CRUD
    Route::get('/admins',                'Back\AdminController@admins')                  ->name('back.admins');
    Route::get('/admin-create',          'Back\AdminController@create')                  ->name('back.adminCreate');
    Route::post('/admin-create',         'Back\AdminController@store');
    Route::get('/admin-edit/{q}',        'Back\AdminController@edit')                    ->name('back.adminEdit');
    Route::post('/admin-edit/{q}',       'Back\AdminController@update');
    Route::get('/admin-delete/{q}',      'Back\AdminController@destroy')                 ->name('back.adminDestroy');

    // User CRUD
    Route::get('/users',                 'Back\UserController@index')                    ->name('back.users');
    Route::get('/user-create',           'Back\UserController@create')                   ->name('back.userCreate');
    Route::post('/user-create',          'Back\UserController@store');
    Route::get('/user-edit/{q}',         'Back\UserController@edit')                     ->name('back.userEdit');
    Route::post('/user-edit/{q}',        'Back\UserController@update');
    Route::get('/user-delete/{q}',       'Back\UserController@destroy')                  ->name('back.userDestroy');
    
    // Admin Profile
    Route::get('/profile',                  'Back\ProfileController@index')             ->name('back.profile');
    Route::post('/profile',                 'Back\ProfileController@profileSubmit');
    
    // Settings
    Route::get('/info',                     'Back\SettingsController@info')              ->name('back.info');
    Route::post('/info',                    'Back\SettingsController@infoSubmit');
});
// End Backend===================================================================


// Frontend=======================================================================
//General Pages
Route::get('/',                             'Front\PageController@homepage')             ->name('homepage');
// End Frontend===================================================================

// Auth
Route::post('logout',                       'Auth\LoginController@logout')               ->name('logout');

Route::get('/test',                     'TestController@index')                          ->name('test');
Route::get('/default-config',           'TestController@defaultConfig')                  ->name('defaultConfig');