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
//Login, Register... Fix it
Auth::routes();

//Home routes
Route::get('/home', 'HomeController@returnEventsAndProjects');
Route::post('/home', 'HomeController@saveReview');

//Profile routes
Route::get('/profile/{id}', 'UserController@getProfileDetails')->middleware('auth');
Route::post('/profile/{id}', 'UserController@editProfile');
Route::delete('/profile/{id}', 'UserController@deleteExperienceandEducation');


//Events routes
Route::get('/events', 'EventsController@showDetails');
Route::post('/events', 'EventsController@saveNewEvent');


//Event routes
Route::get('/event/{name}', 'EventController@showDetails');
Route::post('/event/{name}', 'EventController@goingEvent');
Route::put('/event/{name}', 'EventController@editEvent');
Route::delete('/event/{name}','EventController@ungoingEvent');


//People routes
Route::get('/people','PeopleController@showDetails');


//Project routes
Route::get('/projects','ProjectController@showDetails');
Route::post('/projects','ProjectController@saveNewProject');
//Route::get('/projects/{project}', 'ProjectController@showDetails');

//HR panel
Route::get('/hrpanel', 'HRController@returnView');
Route::post('/hrpanel', 'HRController@sendMail');



//Account
Route::get('/account','AccountController@showDetails');
Route::post('/account','AccountController@changePassword');

