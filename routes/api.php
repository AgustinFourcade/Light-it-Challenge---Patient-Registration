<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

// Route::get('/test', 'App\Http\Controllers\PatientController@index');
Route::get('/test', function() {
    return "Probando";
});