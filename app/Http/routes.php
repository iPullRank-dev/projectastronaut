<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('dash');
});

Route::get('/reportset', function () {
    return view('reportset');
});

Route::get('/allcompanies', function () {
    return view('allcompanies');
});

Route::get('/new', function () {
    return view('new');
});

Route::get('/report', function () {
    return view('report');
});