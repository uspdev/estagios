<?php

use Illuminate\Support\Facades\Route;

Route::get('/pareceristas/create','PareceristaController@create');
Route::post('/pareceristas','PareceristaController@store');
