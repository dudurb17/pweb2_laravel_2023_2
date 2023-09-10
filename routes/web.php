<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
})->name("home");


//chamar uma função do controlador
Route::get('/usuario', [UsuarioController::class, 'index']);

//carrega uma listagem do banco
Route::get('/users',
    [UsuarioController::class, 'listUsers'])->name('user.list');

//chama o formulário do user
Route::get('/user/create', function () {
    return view('user.formUser');
})->name('user.formUser');

//realiza a ação de cadastrar um novo usuario
Route::post('/user/cadastrar',
    [UsuarioController::class, 'createUser'])->name('user.create');

//chama o formulário para edição
Route::get('/user/edit/{id}',
    [UsuarioController::class, 'edit'])->name('user.edit');

 //realiza a ação de atualizar os dados do formulário
Route::post('/user/update/{id}',
    [UsuarioController::class, 'update'])->name('user.update');

//chama o método para excluir o registro
Route::get('/user/destroy/{id}',
    [UsuarioController::class, 'destroy'])->name('user.destroy');

//chama o método para serch para pesquisar e filtrar o registro da listagem
Route::post('/user/search',
    [UsuarioController::class, 'search'])->name('user.search');

//chamar uma página em HTML
Route::get('/pagina', function () {
    return view('index');
});

Route::get('/pedidos',
    [PedidoController::class, 'listPedidos'])->name('pedido.list');


Route::get('/pedidos/create',
    [PedidoController::class, 'createPedido'])->name('pedido.create');

Route::post('/pedidos/cadastrar',
    [PedidoController::class, 'cadastrarPedido'])->name('pedido.cadastrar');

Route::get('/pedidos/edit/{id}',
    [PedidoController::class, 'editPedido'])->name('pedido.edit');

Route::get('/pedidos/update/{id}',
    [PedidoController::class, 'updatePedido'])->name('pedido.update');

Route::get('/pedidos/destroy/{id}',
    [PedidoController::class, 'destroyPedido'])->name('pedido.destroy');
