<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('{path}', function () {
    return view('index');
});




Auth::routes();

Route::get('/postaladmin/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/postalservice/login', function () {
    return view('auth.login');
})->name('postalservice.login');

Route::get('/postaladmin/{path}', 'AdminController@index')->where('path', '.*');
