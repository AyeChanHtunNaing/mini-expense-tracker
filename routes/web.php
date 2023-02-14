<?php

use Illuminate\Support\Facades\Route;

Route::get('/','PageController@index');
Route::post('/','PageController@store');