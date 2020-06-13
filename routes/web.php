<?php

use Illuminate\Support\Facades\Route;

// Backend=======================================================================
// Admin Auth
Route::get('/admin-cp/login',            'Back\AuthController@login')                    ->name('admin.login');
Route::post('/admin-cp/login',           'Back\AuthController@loginSubmit');


Route::prefix('admin-cp')->middleware('auth:admin')->group(function (){
    Route::get('/',                      'Back\DashboardController@dashboard')           ->name('admin.dashboard');

    // Admin CRUD
    Route::get('/admins',                'Back\AdminController@admins')                  ->name('admin.admins');
    Route::get('/admin-create',          'Back\AdminController@create')                  ->name('admin.adminCreate');
    Route::post('/admin-create',         'Back\AdminController@store');
    Route::get('/admin-edit/{q}',        'Back\AdminController@edit')                    ->name('admin.adminEdit');
    Route::post('/admin-edit/{q}',       'Back\AdminController@update');
    Route::get('/admin-delete/{q}',      'Back\AdminController@destroy')                 ->name('admin.adminDestroy');

    // User CRUD
    Route::get('/users',                 'Back\UserController@index')                    ->name('admin.users');
    Route::get('/user-create',           'Back\UserController@create')                   ->name('admin.userCreate');
    Route::post('/user-create',          'Back\UserController@store');
    Route::get('/user-edit/{q}',         'Back\UserController@edit')                     ->name('admin.userEdit');
    Route::post('/user-edit/{q}',        'Back\UserController@update');
    Route::get('/user-delete/{q}',       'Back\UserController@destroy')                  ->name('admin.userDestroy');
    
    // Admin Profile
    Route::get('/profile',                  'Back\ProfileController@profile')            ->name('admin.profile');
    Route::post('/profile',                 'Back\ProfileController@profileSubmit');
    
    // Settings
    Route::get('/info',                     'Back\SettingsController@info')              ->name('admin.info');
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