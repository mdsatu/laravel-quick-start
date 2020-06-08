<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test',                     'TestController@index')                     ->name('test');
Route::get('/default-config',           'TestController@defaultConfig')             ->name('defaultConfig');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
