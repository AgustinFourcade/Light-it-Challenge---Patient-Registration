<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', 'App\Http\Controllers\PatientController@getAllPatients');
Route::post('/create', 'App\Http\Controllers\PatientController@createPatient');
