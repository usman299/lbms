<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.auth.login');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/filter/stats', 'HomeController@filter')->name('filter.stats');

Route::get('/admin/login', 'Admin\AdminController@login')->name('admin.login');

// Lab attendent
Route::get('/admin/lab/index', 'Admin\AdminController@labIndex')->name('admin.lab.index');
Route::get('/admin/lab/create', 'Admin\AdminController@labCreate')->name('admin.lab.create');
Route::get('/partner/edit/{id}', 'Admin\AdminController@partnerEdit')->name('partner.edit');
Route::post('/partner/update/{id}', 'Admin\AdminController@partnerUpdate')->name('partner.update');
Route::post('/admin/lab/store', 'Admin\AdminController@labStore')->name('admin.lab.store');

Route::get('/patients', 'Admin\PatientController@index')->name('patients');
Route::get('/patient/create', 'Admin\PatientController@create')->name('patient.create');
Route::get('/patient/show/{id}', 'Admin\PatientController@show')->name('patient.show');
Route::get('/patient/edit/{id}', 'Admin\PatientController@edit')->name('patient.edit');
Route::get('/patient/delete/{id}', 'Admin\PatientController@delete')->name('patient.delete');
Route::post('/patient/update', 'Admin\PatientController@update')->name('patient.update');
Route::get('/patient/status/{id}', 'Admin\PatientController@statusView')->name('patients.status');
Route::get('/patient/status/{id}/{status}', 'Admin\PatientController@status')->name('patient.status');
Route::post('/patient/store', 'Admin\PatientController@store')->name('patient.store');



Route::get('/patient/create/direct/{id}', 'Admin\PatientController@direct')->name('patient.create.direct');

Route::post('/batch/store/{id}', 'Admin\BatchController@store')->name('batch.store');
Route::get('/batch/delete/{id}', 'Admin\BatchController@delete')->name('batch.delete');
Route::post('/batch/update', 'Admin\BatchController@update')->name('batch.update');

Route::get('/certificate/{id}', function ($id){
    $user = \App\User::find($id);
    return view('admin.email.certificate', compact('user'));
})->name('certificate.view');
