<?php

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
Route::get('/addProp',function(){ return view('propcrud.addProp'); })->middleware('auth');
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

// prop book
Route::post('/propDetail/{id}','bookController@bookProp');
Route::get('/bookedListing', function(){
    return view('propView.bookedProp');   // change these code to controller later
});
Route::get('/bookedListing','bookController@getBooked');
Route::get('/otherBooked',function(){
    return view('propView.otherBooked');
});
Route::get('/otherBooked','bookController@getuserbooked');
// book delete
Route::delete('/bookedListing/{id}', 'bookController@delBooking');


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
Route::get('/dashboard', function(){
    return view('adminJob.dashboard'); // ues ->middleware('auth')
});
// queries admin
Route::get('/adminQueries', function(){
    return view('queries.adminQueriesView');
});
// add admin
Route::get('/adminAdd',function(){
    return view('adminJob.adminAdd')->middleware('auth');
});
//adminRequest
Route::put('/{id}','adminController@reqAdmin')->middleware('auth');
//admin 
Route::get('/adminAdd', 'adminController@listRequests')->middleware('auth');
Route::put('/adminAdd/{id}', 'adminController@acceptAdmin')->middleware('auth');
Route::put('/adminremove/{id}', 'adminController@rejectAdmin')->middleware('auth');
//propType
Route::get('/propVA', function(){
    return view('adminJob.propertyVA');
});
Route::post('/propVA','adminController@addPropType')->middleware('auth');
Route::get('/propVA','adminController@requestedProp')->middleware('auth');
Route::put('/propVA/{id}','adminController@reqAccept')->middleware('auth');

//Search 
Route::get('/search_Result',function(){
    return view('search.quick');
});
Route::get('/search_Result','searchController@filterNunfiltered');
Route::get('/customSearchReasult','searchCustomController@filterfiltered');