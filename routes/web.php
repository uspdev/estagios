<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/pareceristas/create','PareceristaController@create');
Route::post('/pareceristas','PareceristaController@store');

Route::get('/estagios/create','EstagioController@create');
Route::post('/estagios','EstagioController@store');
