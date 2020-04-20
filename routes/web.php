<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/vagas/create','VagaController@create');
Route::post('/vagas','VagaController@store');
