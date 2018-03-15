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
Route::get('/', 'Auth\LoginController@getLogin');
Route::post('/', 'Auth\LoginController@postLogin');


Route::get('/home', 'HomeController@returnEventsAndProjects');



Route::get('/profile/{id}', 'ProfileController@getProfileDetails');




Route::get('/project', function (){
    return view('project');
});


Route::get('/projects', function (){
    return view('projects');
});

Route::get('/event', function (){
    return view('event');
});

Route::get('/events', function (){
    return view('events');
});

Route::get('/documents', function (){
    return view('documents');
});
