<?php

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

route::post('serviço/all',[ServicoController::class,'exibirTodosServico']);

route::post('editar',[ServicoController::class,'editar']);

Route::delete('serviço/excluir/{id}',[ServicoController::class, 'excluir']);

//clientes
route::post('cliente',[ClienteController::class,'clienteCreate']);

route::post('cliente/all',[ClienteController::class, 'exibirTodosClientes']);

route::post('editar/cliente',[ClienteController::class, 'editarCliente']);

Route::delete('cliente/excluir/{id}',[ClienteController::class, 'excluirCliente']);

route::post('find/cliente',[ClienteController::class, 'procurarPorNome']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCpf']);

route::post('find/cliente',[ClienteController::class, 'procurarPorCelular']);

route::post('find/cliente',[ClienteController::class, 'procurarPorEmail']);

route::post('recuperar/senha',[ClienteController::class, 'recuperarSenha']);

//profissional

route::post('profissional',[ProfissionalController::class, 'criarProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorNomeProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorCpfProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorCelularProfissional']);

route::post('find/profissional',[ProfissionalController::class, 'procurarPorEmailProfissional']);

route::post('Profissional/all',[ProfissionalController::class, 'exibirTodosProfissional']);

route::post('editar/Profissional',[ProfissionalController::class, 'editarProfissional']);

Route::delete('Profissional/excluir/{id}',[ProfissionalController::class, 'excluirProfissional']);
