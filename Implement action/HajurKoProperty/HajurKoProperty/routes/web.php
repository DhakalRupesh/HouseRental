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
    return view('welcome');
});

// link for home page

Auth::routes();

Route::get('/home','HomeController@index')->name('home');
// Route to visit profile page
Route::get('/profile/{id}','userController@profileIndex'); 
// Profile update
Route::put('/profile/{id}','userController@update');
//Multiple authentication
Route::get('/admin','HomeController@admin')->middleware('admin');