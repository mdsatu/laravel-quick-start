<?php

use Illuminate\Support\Facades\Route;

// Backend=======================================================================
// Admin Auth
Route::get('/admin-cp/login',           'Back\AuthController@login')                ->name('admin.login');
Route::post('/admin-cp/login',          'Back\AuthController@loginSubmit');

Route::prefix('admin-cp')->middleware('auth:admin')->group(function (){
    Route::get('/',                         'Back\DashboardController@dashboard')           ->name('admin.Dashboard');

    // Admin CRUD
    Route::get('/admins',                   'Back\AdminController@admins')                  ->name('admin.Admins');
    Route::get('/create-admin',             'Back\AdminController@create')                  ->name('admin.createAdmin');
    Route::post('/create-admin',            'Back\AdminController@store');
    Route::get('/edit-admin/{id}',          'Back\AdminController@edit')                    ->name('admin.editAdmin');
    Route::post('/edit-admin/{id}',         'Back\AdminController@update');
    Route::get('/delete-admin/{id}',        'Back\AdminController@delete')                  ->name('admin.deleteAdmin');
});
// End Backend===================================================================

Route::get('/test',                     'TestController@index')                     ->name('test');
Route::get('/default-config',           'TestController@defaultConfig')             ->name('defaultConfig');

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
