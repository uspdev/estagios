<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/pareceristas/create','PareceristaController@create');
Route::post('/pareceristas','PareceristaController@store');

Route::get('/avisos/create','AvisoController@create');
Route::post('/avisos','AvisoController@store');


