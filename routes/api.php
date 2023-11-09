<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//serviço
route::post('servico',[ServicoController::class,'servicoCreate']);

route::post('find/serviço',[ServicoController::class,'pesquisarPorNome']);

route::get('serviço/all',[ServicoController::class,'exibirTodosServico']);

route::put('editar',[ServicoController::class,'editar']);

Route::delete('serviço/excluir/{id}',[ServicoController::class, 'excluir']);

route::post('find/serviço/{id}',[ServicoController::class, 'pesquisarPorId']);
//clientes
route::post('cliente',[ClienteController::class,'clienteCreate']);

route::get('cliente/all',[ClienteController::class, 'exibirTodosClientes']);

route::put('editar/cliente',[ClienteController::class, 'editarCliente']);

Route::delete('cliente/excluir/{id}',[ClienteController::class, 'excluirCliente']);

route::post('find/cliente/{id}',[ClienteController::class, 'pesquisarPorId']);

route::post('find/cliente',[ClienteController::class, 'procurarPorNome']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCpf']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCelular']);

route::post('find/cliente',[ClienteController::class, 'procurarPorEmail']);

route::post('recuperar/senha',[ClienteController::class, 'recuperarSenha']);

//profissional

route::post('profissional',[ProfissionalController::class, 'criarProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorNomeProfissional']);

route::post('find/profissional/{id}',[ProfissionalController::class, 'pesquisarPorId']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorCpfProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorCelularProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorEmailProfissional']);

route::get('Profissional/all',[ProfissionalController::class, 'exibirTodosProfissional']);

route::put('editar/Profissional',[ProfissionalController::class, 'editarProfissional']);

Route::delete('Profissional/excluir/{id}',[ProfissionalController::class, 'excluirProfissional']);

//Agenda

route::post( 'Agenda',[AgendaController::class , 'CadastroAgenda']);
