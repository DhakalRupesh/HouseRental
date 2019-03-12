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
//userPannel
Route::get('/usrpannel',function(){
    return view('propcrud.mainPannel');
});
//User Part
//userPannel
Route::get('/usrcrud',function(){
    return view('propcrud.mainPannel');
});
//add prop 
Route::get('/addProp',function(){
    return view('propcrud.addProp');
});
Route::post('/addProp','usrcrudController@store'); // insert property
Route::get('/editProp','usrcrudController@displayProp'); // edit quick view plus edit
Route::get('/editProp/{pid}','usrcrudController@edit'); // edit view by id
//retrive in select 
Route::get('addProp','usrcrudController@getPropType');
// for map 
Route::get('/mapApi', function(){
    return view('mapApi.mapAdd');
});