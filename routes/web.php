<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index')->name('login');
Route::get('/home','IndexController@index')->name('home');

# Models
Route::resource('/pareceristas','PareceristaController');
Route::resource('/estagios','EstagioController');
Route::resource('/vagas','VagaController');
Route::resource('/empresas', 'EmpresaController');
Route::resource('/avisos','AvisoController');
Route::resource('/convenios','ConvenioController');


#PDF's 
Route::get('/pdfs/convenio/{convenio}', 'PDFsController@convenio');
Route::get('/pdfs/termo/{estagio}', 'PDFsController@termo');

#Rescisão
Route::get('/pdfs/rescisao/{estagio}/{empresa}', 'PDFsController@rescisao');

#Aditivo
Route::get('/pdfs/aditivo/{empresa}', 'PDFsController@aditivo');

#Renovação
Route::get('/pdfs/renovacao/{estagio}', 'PDFsController@renovacao');

#Termo
Route::get('/pdfs/termo/{estagio}', 'PDFsController@termo');

# Convênio
Route::get('/convenios/{convenio}','ConvenioController@show');

# Login comunidade USP
Route::get('login/usp', 'Auth\LoginUspController@redirectToProvider');
Route::get('callback', 'Auth\LoginUspController@handleProviderCallback');
Route::get('/logout', 'Auth\LogoutController@logout');

# Login empresa
Route::get('login/empresa', 'Auth\LoginEmpresaController@create');
Route::post('login/empresa', 'Auth\LoginEmpresaController@store');
Route::get('login/empresa/check', 'Auth\LoginEmpresaController@empresa')->name('login_empresa');

# Rotas para empresa
Route::get('/empresa_update', 'EmpresaController@empresa_update');


