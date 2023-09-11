<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controlador
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;

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

Route::post('/produto/search',
    [ProdutoController::class, 'search'])->name('produto.search');

Route::post('/pedido/search',
    [PedidoController::class, 'search'])->name('pedido.search');

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

Route::post('/pedidos/update/{id}',
    [PedidoController::class, 'update'])->name('pedido.update');

Route::get('/pedidos/destroy/{id}',
    [PedidoController::class, 'destroyPedido'])->name('pedido.destroy');

Route::get('/produto',
    [ProdutoController::class, 'listProduto'])->name('produto.list');

Route::get('/produto/create',
    [ProdutoController::class, 'createProduto'])->name('produto.create');

Route::post('/produto/cadastrar',
    [ProdutoController::class, 'cadastrarProduto'])->name('produto.cadastrar');

Route::post('/pedido/cadastrar',
    [PedidoController::class, 'cadastrarPedido'])->name('pedido.cadastrar');
Route::get('/produto/destroy/{id}',
    [ProdutoController::class, 'destroyProduto'])->name('produto.destroy');

    //chama o formulário para edição
Route::get('/produto/edit/{id}',
[ProdutoController::class, 'edit'])->name('produto.edit');

Route::post('/produto/update/{id}',
    [ProdutoController::class, 'update'])->name('produto.update');