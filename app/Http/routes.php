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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Login@index');

Route::get('/admin/company-view={id}', 'CompanyView@index');
Route::get('/display-report={id}', 'DisplayReport@index');
Route::get('/display-report', 'DisplayReport@unidentified');

Route::get('/admin/', 'Login@index');
Route::get('/admin/login', 'Login@index');
Route::get('/admin/report-setup/', 'ReportSetup@index');

Route::get('/admin/company-view-detail={id}', 'CompanyView@detail');

Route::get('/admin/new-company', 'NewCompany@index');

//Route::get('/admin/upload/', 'Upload@index');
//Route::get('/admin/uploaded/', 'Upload@display');
Route::get('/admin/all-companies/', 'AllCompanies@index');
Route::get('/admin/dashboard/', 'dashboard@index');
Route::get('/ajax', 'Ajax@index');
Route::post('/ajax-insertuser', 'Ajax@insertuser');
Route::post('/ajax-deleteuser', 'Ajax@deleteuser');
Route::post('/ajax-updateuser', 'Ajax@updateuser');
Route::get('/ajax-upload', 'Ajax@upload');
Route::get('/ajax-new-company', 'Ajax@newCompany');
Route::get('/admin/user-detail={id}', 'userdata@index');
Route::get('tests', 'tests@index');

/*Route::get('test', function () {
    return LaravelAnalytics->getVisitorsAndPageViews();
});*/


 


