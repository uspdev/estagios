<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PareceristaController;
use App\Http\Controllers\EstagioController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\PDFsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EstagioWorkflowController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\LoginEmpresaController;
use App\Http\Controllers\Auth\LoginUspController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/',[IndexController::class, 'index'])->name('login');
Route::get('/home',[IndexController::class, 'index'])->name('home');

# Models
Route::resource('/pareceristas',PareceristaController::class);
Route::resource('/estagios',EstagioController::class);
Route::resource('/vagas',VagaController::class);
Route::resource('/empresas', EmpresaController::class);
Route::resource('/avisos',AvisoController::class);
Route::resource('/convenios',ConvenioController::class);
Route::resource('/files', FileController::class);


#PDF's 
Route::get('/pdfs/convenio/{convenio}', [PDFsController::class, 'convenio']);
Route::get('/pdfs/termo/{estagio}', [PDFsController::class, 'termo']);
Route::get('/pdfs/renovacao/{estagio}', [PDFsController::class, 'renovacao']);
Route::get('/pdfs/aditivo/{estagio}', [PDFsController::class, 'aditivo']);
Route::get('/pdfs/rescisao/{estagio}', [PDFsController::class, 'rescisao']);
Route::get('/pdfs/parecer/{estagio}', [PDFsController::class, 'parecer']);

#E-mails
Route::get('/emails/enviar_para_analise_tecnica/{estagio}', [EmailController::class, 'enviar_para_analise_tecnica']);
Route::get('/emails/enviar_para_analise_tecnica_renovacao/{estagio}', [EmailController::class, 'enviar_para_analise_tecnica_renovacao']);
Route::get('/emails/enviar_para_parecerista/{estagio}', [EmailController::class, 'enviar_para_parecerista']);
Route::get('/emails/alteracao/{estagio}', [EmailController::class, 'alteracao']); 
Route::get('/emails/analise_rescisao/{estagio}', [EmailController::class, 'analise_rescisao']);


# Login comunidade USP
Route::get('login/usp', [LoginUspController::class, 'redirectToProvider']);
Route::get('callback', [LoginUspController::class, 'handleProviderCallback']);
Route::post('/logout', [LogoutController::class, 'logout']);

# logins secrets
Route::post('/logandoComoEmpresa/{cnpj}', [EmpresaController::class,'logandoComoEmpresa']);
Route::post('/adminLogandoComoParecerista/{codpes}', [PareceristaController::class,'adminLogandoComoParecerista']);
Route::get('/acessar_outra_empresa', [EmpresaController::class,'acessar_outra_empresa']);

# Login empresa
Route::get('login/empresa', [LoginEmpresaController::class,'create']);
Route::post('login/empresa', [LoginEmpresaController::class,'store']);
Route::get('login/empresa/check', [LoginEmpresaController::class,'empresa'])->name('login_empresa');

# Rotas para empresa
Route::get('/empresa_update', [EmpresaController::class,'empresa_update']);

# rotas para workflow do estágio

# Rotas Análise Técnica
Route::post('/analise_tecnica/{estagio}', [EstagioWorkflowController::class,'analise_tecnica']);
Route::post('/enviar_para_analise_tecnica/{estagio}', [EstagioWorkflowController::class,'enviar_para_analise_tecnica']);
Route::post('/mover_analise_tecnica/{estagio}', [EstagioWorkflowController::class,'mover_analise_tecnica']);
Route::post('/enviar_assinatura/{estagio}', [EstagioWorkflowController::class,'enviar_assinatura']);

# Rotas Assinatura
Route::get('/retornar_assinatura/{estagio}', [EstagioWorkflowController::class,'retornar_assinatura']);

# Rotas Análise Acadêmica
Route::post('/analise_academica/{estagio}', [EstagioWorkflowController::class,'analise_academica']);
Route::get('/voltar_analise_academica/{estagio}', [EstagioWorkflowController::class,'voltar_analise_academica']);
Route::get('/editar_analise_academica/{estagio}', [EstagioWorkflowController::class,'editar_analise_academica']);

# Rotas Cancelamento
Route::get('/cancelar_estagio/{estagio}', [EstagioWorkflowController::class,'cancelar_estagio']);
Route::get('/cancelar_cancelamento/{estagio}', [EstagioWorkflowController::class,'cancelar_cancelamento']);

#Rotas Rescisão
Route::get('/retornar_rescisao/{estagio}', [EstagioWorkflowController::class,'retornar_rescisao']);
Route::post('/avaliacao/{estagio}', [EstagioWorkflowController::class,'avaliacao']);

# Rotas Concluido
Route::post('/rescisao/{estagio}', [EstagioWorkflowController::class,'rescisao']);
Route::post('/renovacao/{estagio}', [EstagioWorkflowController::class,'renovacao']);
Route::get('/iniciar_alteracao/{estagio}', [EstagioWorkflowController::class,'iniciar_alteracao']);

# Rotas Alteração
Route::post('/enviar_alteracao/{estagio}', [EstagioWorkflowController::class,'enviar_alteracao']);

# Rotas Análise da Alteração
Route::post('/analise_tecnica_alteracao/{estagio}', [EstagioWorkflowController::class,'analise_tecnica_alteracao']);

# Rotas Menu dos pareceristas
Route::get('/parecer_merito', [PareceristaController::class,'parecerMerito']);
Route::get('/meus_pareceres', [PareceristaController::class,'meusPareceres']);
Route::get('/estagios_rescindidos', [PareceristaController::class,'estagiosRescindidos']);

#alterar parecerista

Route::post('/parecer_merito/{estagio}', [EstagioController::class,'alterarParecerista']);

#arquivos

Route::post('/files/store', [FileController::class,'store']);
Route::post('/files/store_relatorio', [FileController::class,'store_relatorio']);
Route::post('/files/destroy', [FileController::class,'destroy']);

