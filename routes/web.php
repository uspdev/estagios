<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index');

Route::resource('/pareceristas','PareceristaController');

Route::get('/vagas','VagaController@index');
Route::get('/vagas/create','VagaController@create');
Route::post('/vagas','VagaController@store');
Route::get('/vagas/{vaga}','VagaController@show');


Route::get('/estagios','EstagioController@index');
Route::get('/estagios/create','EstagioController@create');
Route::post('/estagios','EstagioController@store');
Route::get('/estagios/{estagio}','EstagioController@show');
Route::get('/estagios/{estagio}/edit','EstagioController@edit');
Route::patch('/estagios/{estagio}','EstagioController@update');

Route::resource('/empresas', 'EmpresaController');

Route::resource('/avisos','AvisoController');


Route::resource('/convenios','ConvenioController');


#PDF's - Convênio
Route::get('/pdfs/convenio/{convenio}/{empresa}', 'PDFsController@convenio');

#Rescisão
Route::get('/pdfs/rescisao/{estagio}/{empresa}', 'PDFsController@rescisao');

#Aditivo
Route::get('/pdfs/aditivo/{empresa}', 'PDFsController@aditivo');

#Renovação
Route::get('/pdfs/renovacao/{estagio}', 'PDFsController@renovacao');

#Termo
Route::get('/pdfs/termo/{estagio}', 'PDFsController@termo');

Route::get('/convenios/{convenio}','ConvenioController@show');

