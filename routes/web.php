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
    return view('login');
});


Route::get('/home', function () {
    return view('home');
});




Route::get('/profile', function(){
    return view('profile');
});



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
