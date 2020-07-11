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

Route::get('/', 'JobsController@index');
Route::get('/jobs/{id}/view/{slug}', 'JobsController@show')->name('jobs.view');
Route::get('/jobs/post', 'JobsController@create')->name('jobs.post');
Route::post('/jobs/store', 'JobsController@store')->name('jobs.store');
Route::get('/jobs/myjobs', 'JobsController@myjob')->name('jobs.myjob');
Route::post('/jobs/{id}/apply', 'JobsController@apply')->name('job.apply');
Route::post('/jobs/applicant', 'JobsController@applicant');
Route::get('/jobs/{id}/edit/{slug}', 'JobsController@edit')->name('jobs.edit');
Route::post('/jobs/{id}/update', 'JobsController@update')->name('jobs.update');
Route::get('/jobs/{id}/delete/{slug}', 'JobsController@destroy')->name('jobs.delete');
Route::get('/jobs/applicant', 'JobsController@applicant')->name('jobs.applicant');
Route::post('/application/{id}', 'JobsController@apply')->name('apply');


Route::get('/company/{id}/{slug}', 'CompanyController@index')->name('company.index');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::post('/company/banner', 'CompanyController@banner')->name('company.banner');



Route::get('/user/profile', 'UserController@index')->name('user.profile');
Route::post('/user/store', 'UserController@store')->name('user.store');

Route::view('/employer/register', 'auth.employer')->name('employer.register');
Route::post('/employer/register', 'EmployerController@store')->name('employer.register');
Route::get('/employer/profile', 'EmployerController@index')->name('employer.profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
