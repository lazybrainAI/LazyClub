<?php

//Login, logout routes
Auth::routes();

//Home routes
Route::get('/home', 'HomeController@returnEventsAndProjects');
Route::put('/home', 'HomeController@attendEvent');
Route::delete('/home', 'HomeController@unattendEvent');

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

//Route::post('/event/{name}', 'EventController@saveReview');

Route::put('/event/{name}', 'EventController@editEvent');
Route::delete('/event/{name}','EventController@ungoingEvent');

//People routes
Route::get('/people','PeopleController@showDetails');

//Project routes
Route::get('/projects','ProjectsController@showDetails');
Route::post('/projects','ProjectsController@saveNewProject');
//Route::get('/project/{name}', 'ProjectController@showDetails');


//HR panel
Route::get('/hrpanel', 'HRController@returnView');
Route::post('/hrpanel', 'HRController@sendMail');

//Account
Route::get('/account','AccountController@showDetails');
Route::post('/account','AccountController@changePassword');

