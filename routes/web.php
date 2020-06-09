<?php

use Illuminate\Support\Facades\Route;

// Backend=======================================================================
// Admin Auth
Route::get('/admin-cp/login',           'Back\AuthController@login')                ->name('admin.login');
Route::post('/admin-cp/login',          'Back\AuthController@loginSubmit');


Route::prefix('admin-cp')->middleware('auth:admin')->group(function (){
    Route::get('/',                         'Back\DashboardController@dashboard')           ->name('admin.dashboard');

    // Admin CRUD
    Route::get('/admins',                   'Back\AdminController@admins')                  ->name('admin.admins');
    Route::get('/create-admin',             'Back\AdminController@create')                  ->name('admin.createAdmin');
    Route::post('/create-admin',            'Back\AdminController@store');
    Route::get('/edit-admin/{q}',           'Back\AdminController@edit')                    ->name('admin.editAdmin');
    Route::post('/edit-admin/{q}',          'Back\AdminController@update');
    Route::get('/delete-admin/{q}',         'Back\AdminController@destroy')                  ->name('admin.destroyAdmin');

    // Teacher CRUD
    Route::get('/users',                 'Back\UserController@index')                ->name('admin.users');
    Route::get('/create-user',           'Back\UserController@create')               ->name('admin.createUser');
    Route::post('/create-user',          'Back\UserController@store');
    Route::get('/edit-user/{q}',         'Back\UserController@edit')                 ->name('admin.editUser');
    Route::post('/edit-user/{q}',        'Back\UserController@update');
    Route::get('/delete-user/{q}',       'Back\UserController@destroy')              ->name('admin.destroyUser');
    
    // Admin Profile
    Route::get('/profile',                  'Back\ProfileController@profile')               ->name('admin.profile');
    Route::post('/profile',                 'Back\ProfileController@profileSubmit');
    
    // Settings
    Route::get('/info',                     'Back\SettingsController@info')                 ->name('admin.info');
    Route::post('/info',                    'Back\SettingsController@infoSubmit');
});
// End Backend===================================================================


// Frontend=======================================================================
//General Pages
Route::get('/',                             'Front\PageController@homepage')               ->name('homepage');
// End Frontend===================================================================

// Auth
Route::post('logout',                       'Auth\LoginController@logout')                  ->name('logout');

Route::get('/test',                     'TestController@index')                     ->name('test');
Route::get('/default-config',           'TestController@defaultConfig')             ->name('defaultConfig');