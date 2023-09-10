<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedido;
use App\Models\User;


class PedidoController extends Controller
{
    public function listPedidos () {
        $pedidos = Pedido::all();

        return view('pedido.listPedido')->with(['pedidos'=> $pedidos]);
    }

    public function createPedido(){
        $users = User::all();


        return view('pedido.formPedido')->with(['users' => $users]);
    }

    public function cadastrarPedido (Request $request) {

        $pedido = new Pedido();
        $pedido->nome_peca = $request->name;
        $pedido->user_id = $request->user_id;
        $pedido->cnpj = $request->cnpj;
        $pedido->data_pedido = $request->data_pedido;
        $pedido->email = $request->email;
        $pedido->Quantidade = $request->Quantidade;
        $pedido->save();

        return redirect('pedidos.listPedidos')->with('success', "Cadastrado com sucesso!");

    }


    public function editPedido ($id) {
        $pedido = Pedido::find($id);
        $users = User::all();
        return view('pedido.formPedido')->with(['pedido'=> $pedido, 'users' => $users]);
    }


    public function updatePedido($id){
        return;
    }

    public function destroyPedido ($id){
        Pedido::destroy($id);
        return redirect('pedidos')->with('success', "Removido com sucesso!");

    }
}
