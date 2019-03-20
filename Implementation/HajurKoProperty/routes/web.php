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
// quick view after loged in and non logged
Route::get('/','userController@welcomeProp');
// detail view
Route::get('/propDetail/{id}','userController@detailProp');


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
})->middleware('auth');

//add prop 
Route::get('/addProp',function(){
    return view('propcrud.addProp');
})->middleware('auth');
Route::post('/addProp','usrcrudController@store'); // insert property
Route::get('/editProp','usrcrudController@displayProp')->middleware('auth'); // edit quick view
Route::get('/editProp/{pid}','usrcrudController@edit'); // edit view by id

Route::delete('/editProp/{pid}', 'usrcrudController@destroy'); //delete
//retrive in select 
Route::get('addProp','usrcrudController@getPropType');
// Route::get('/editProp/{pid}','usrcrudController@loadcmb');
//detail page
Route::get('/propdetail',function(){
    return view('propView.detailview');
});
// for map 
Route::get('/mapApi', function(){
    return view('mapApi.mapAdd');
});
// about page
Route::get('/about', function(){
    return view('about');
}); 
//listings page
Route::get('/listings',function(){
    return view('listings');
});

// Admin part
Route::get('/admin', function(){
    return view('adminJob.mainApannel');
});