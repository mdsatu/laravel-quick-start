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
    Route::get('/delete-admin/{q}',         'Back\AdminController@delete')                  ->name('admin.deleteAdmin');
    
    // Admin Profile
    Route::get('/profile',                  'Back\ProfileController@profile')               ->name('admin.profile');
    Route::post('/profile',                 'Back\ProfileController@profileSubmit');
    
    // Settings
    Route::get('/settings',                 'Back\SettingsController@settings')             ->name('admin.settings');
});
// End Backend===================================================================

// Auth
Route::post('logout',                       'Auth\LoginController@logout')                  ->name('logout');

Route::get('/test',                     'TestController@index')                     ->name('test');
Route::get('/default-config',           'TestController@defaultConfig')             ->name('defaultConfig');

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/home', 'HomeController@index')->name('home');
