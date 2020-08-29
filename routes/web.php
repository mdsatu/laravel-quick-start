<?php

use Illuminate\Support\Facades\Route;

//General Pages
Route::get('/',                         'Front\PageController@homepage')             ->name('homepage');

// Auth
Route::post('logout',                   'Auth\LoginController@logout')               ->name('logout');

// Route::get('test',                     'TestController@index')                          ->name('test');
Route::get('setup',                     'TestController@defaultConfig')                  ->name('defaultConfig');
