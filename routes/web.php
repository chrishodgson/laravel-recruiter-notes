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

//Route::get('/', function () {
//    return view('home');
//});

Route::redirect('/', '/summary');

Route::resource('companies', 'CompanyController')->except([
    'show'
]);

Route::resource('recruiters', 'RecruiterController')->except([
    'show'
]);

Route::resource('notes', 'NoteController')->except([
    'show'
]);

Route::resource('summary', 'RecruiterSummaryController')->only([
    'index', 'show'
]);
