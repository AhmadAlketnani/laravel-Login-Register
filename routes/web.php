<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('register', 'AuthController@registerPost')->name('register');

    Route::get('login', 'AuthController@login')->name('login');
    Route::post('login', 'AuthController@loginPost')->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index');
    Route::delete('logout','AuthController@logout')->name('logout');
});

