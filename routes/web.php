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
//Route::get('/', 'Auth\LoginController@getLogin');
//Route::post('/', 'Auth\LoginController@postLogin');
Auth::routes();

Route::get('/home', 'HomeController@returnEventsAndProjects');
Route::post('/home', 'HomeController@saveReview');


Route::get('/profile/{id}', 'ProfileController@getProfileDetails')->middleware('auth');

//Route::get('/profile', function(){
//    return view('profile');
//})->middleware('auth');
Route::get('/events', function (){
    return view('events');
})->middleware('auth');


Route::get('/projects', function (){
    return view('projects');
})->middleware('auth');

Route::get('/{project}', 'ProjectController@showDetails');
//
//
//
//
Route::get('/events/{name}', 'EventController@showDetails');



//Route::get('/documents', function (){
//    return view('documents');
//});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
