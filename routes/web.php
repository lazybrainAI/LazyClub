<?php

//Login, logout routes
Auth::routes();


//Home routes
Route::get('/home', 'HomeController@returnEventsAndProjects')->middleware('auth');
Route::put('/home', 'HomeController@attendEvent')->middleware('auth');
Route::delete('/home', 'HomeController@unattendEvent')->middleware('auth');

//Profile routes
Route::get('/profile/{username}', 'UserController@getProfileDetails')->middleware('auth');
Route::put('/profile/{username}', 'UserController@editProfile')->middleware('auth');
Route::delete('/profile/{username}', 'UserController@deleteExperienceandEducation')->middleware('auth');
Route::post('/profile/{username}', 'UserController@uploadProfileImage')->middleware('auth');

//Events routes
Route::get('/events', 'EventsController@showDetails')->middleware('auth');
Route::post('/events', 'EventsController@saveNewEvent')->middleware('auth');
Route::put('/events', 'EventsController@attendEvent')->middleware('auth');
Route::delete('/events', 'EventsController@deleteOrUnattendEvent')->middleware('auth');



//Event routes
Route::get('/event/{name}', 'EventController@showDetails')->middleware('auth');
Route::post('/event/{name}', 'EventController@editEventOrSaveReview')->middleware('auth');
Route::put('/event/{name}', 'EventController@goingEvent')->middleware('auth');
Route::delete('/event/{name}','EventController@ungoingEvent')->middleware('auth');

//People routes
Route::get('/people','PeopleController@showDetails')->middleware('auth');
Route::post('/people', 'PeopleController@sendMail')->middleware('auth');

//Projects routes
Route::get('/projects','ProjectsController@showDetails')->middleware('auth');
Route::post('/projects','ProjectsController@saveNewProject')->middleware('auth');
Route::delete('/projects', 'ProjectsController@deleteProject')->middleware('auth');


//Project route
Route::get('/project/{name}', 'ProjectController@showDetails')->middleware('auth');
Route::put('/project/{name}', 'ProjectController@editProjectorAddTeamMember')->middleware('auth');
Route::post('/project/{name}', 'ProjectController@saveReviewOrSaveApplication')->middleware('auth');


//Account
Route::get('/account','AccountController@showDetails')->middleware('auth');
Route::post('/account','AccountController@changePassword')->middleware('auth');

//Documents

Route::get('/document', 'DocumentsController@showDetails')->middleware('auth');
Route::post('/document', 'DocumentsController@uploadDocument')->middleware('auth');


