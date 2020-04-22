<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::get('/pareceristas','PareceristaController@index');
Route::get('/pareceristas/create','PareceristaController@create');
Route::post('/pareceristas','PareceristaController@store');
Route::get('/pareceristas/{parecerista}','PareceristaController@show');

Route::get('/vagas/create','VagaController@create');
Route::post('/vagas','VagaController@store');

Route::get('/estagios/create','EstagioController@create');
Route::post('/estagios','EstagioController@store');

Route::get('/empresas', 'EmpresaController@index');
Route::get('/empresas/create', 'EmpresaController@create');
Route::post('/empresas', 'EmpresaController@store');
Route::get('/empresas/{empresa}', 'EmpresaController@show');


Route::get('/avisos/create','AvisoController@create');
Route::post('/avisos','AvisoController@store');

Route::get('/convenios/create','ConvenioController@create');
Route::post('/convenios','ConvenioController@store');
