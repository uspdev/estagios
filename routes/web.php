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

Route::get('/empresas', 'EmpresaController@index');
Route::get('/empresas/create', 'EmpresaController@create');
Route::post('/empresas', 'EmpresaController@store');
Route::get('/empresas/{empresa}', 'EmpresaController@show');


Route::get('/avisos','AvisoController@index');
Route::get('/avisos/create','AvisoController@create');
Route::post('/avisos','AvisoController@store');
Route::get('/avisos/{aviso}','AvisoController@show');

Route::get('/convenios','ConvenioController@index');
Route::get('/convenios/create','ConvenioController@create');
Route::post('/convenios','ConvenioController@store');


#PDF's - Convênio
Route::get('/pdfs/convenio', 'PDFsController@convenio');

#Rescisão
Route::get('/pdfs/rescisao', 'PDFsController@rescisao');

#Aditivo
Route::get('/pdfs/aditivo', 'PDFsController@aditivo');

# Renovação
Route::get('/pdfs/renovacao', 'PDFsController@renovacao');

# Termo
Route::get('/pdfs/termo', 'PDFsController@termo');

Route::get('/convenios/{convenio}','ConvenioController@show');

