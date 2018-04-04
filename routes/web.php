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


//Event routes
Route::get('/events', function () {
    return view('events');
});
Route::get('/events/{name}', 'EventController@showDetails');

Route::get('/events/{name}', 'EventController@showDetails');



//Project routes
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/projects/{project}', 'ProjectController@showDetails');

//HR panel
Route::get('/hrpanel', 'HRController@returnView');
Route::post('/hrpanel', 'HRController@sendMail');
