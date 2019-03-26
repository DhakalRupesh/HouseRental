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

Auth::routes();

Route::get('/home','HomeController@index')->name('home');
// Route to visit profile page
Route::get('/profile/{id}','userController@profileIndex'); 
// Profile update
Route::put('/profile/{id}','userController@update');
//Multiple authentication
Route::get('/admin','HomeController@admin');
//userPannel
Route::get('/usrpannel',function(){
    return view('propcrud.mainPannel');
});
//User Part
//userPannel

Route::get('/listingsyour',function(){
    return view('propcrud.editProp');
})->middleware('auth');

//add prop 
Route::get('/addProp',function(){
    return view('propcrud.addProp');
})->middleware('auth');
Route::post('/addProp','usrcrudController@store'); // insert property
Route::get('/listingsyour','usrcrudController@displayProp')->middleware('auth'); // edit quick view
Route::get('/editProp/{id}','usrcrudController@edit')->middleware('auth');// edit view by id

Route::delete('/editProp/{id}', 'usrcrudController@destroy'); //delete
Route::put('/editProp/{id}','usrcrudController@update');
//retrive in select 
Route::get('/addProp','usrcrudController@getPropType')->middleware('auth');
// Route::get('/editProp/{pid}','usrcrudController@loadcmb');
//detail page
Route::get('/propdetail',function(){
    return view('propView.detailview');
});
// detail view
Route::get('/propDetail/{id}','detailController@detailProp');
Route::post('/propDetail/{id}','userController@bookProp');
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
    return view('propView.listings');
});
Route::get('/listings','listingController@listProp');
// Route::get('/listings','listingController@getPropType');

// Admin part
Route::get('dashboard', function(){
    return view('adminJob.dashboard'); // ues ->middleware('auth')
});