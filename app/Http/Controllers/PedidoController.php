<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedido;
use App\Models\User;
use App\Models\Produto;


class PedidoController extends Controller
{
    public function listPedidos () {
        $pedido = Pedido::all();

        return view('pedido.listPedido')->with(['pedido'=> $pedido]);
    }

    public function createPedido(){
        $users = User::all();
        $produto=Produto::all();



        return view('pedido.formPedido')->with(['users' => $users, 'produto'=>$produto]);
    }

    public function cadastrarPedido (Request $request) {

        $pedido = new Pedido();
        $pedido->user_id = $request->user_id;
        $pedido->cnpj = $request->cnpj;
        $pedido->data_pedido = $request->data_pedido;
        $pedido->email = $request->email;
        $pedido->Quantidade = $request->Quantidade;
        $pedido->produto_id=$request->produto_id;
        $pedido->save();
        $pedido = Pedido::all();
        return view('pedido.listPedido')->with(['pedido'=> $pedido]);

    }


    public function editPedido ($id) {
        $pedido = Pedido::find($id); //select * from aluno where id = $id

        $produto = Produto::orderBy('nome_peca')->get();
        $users = User::orderBy('name')->get();
        return view('pedido.formPedido')->with([
            'pedido'=> $pedido, "produto"=>$produto, "users"=>$users]);
    }




    public function destroyPedido ($id){
        Pedido::destroy($id);
        return redirect('pedidos')->with('success', "Removido com sucesso!");

    }

    public function update(Request $request, Pedido $pedido)
    {

        $request->validate([
            'cnpj.required'=>"O :attribute é obrigatorio!",
            'data_pedido.required'=>"O :attribute é obrigatorio!",

        ]);

        $dados = ['user_id'=> $request->user_id,
            'cnpj'=> $request->cnpj,
            'data_pedido'=> $request->data_pedido,
            'email'=> $request->email,
            'Quantidade'=> $request->Quantidade,
            "produto_id"=>$request->produto_id,

        ];

        Pedido::updateOrCreate(
            ['id'=>$request->id],
            $dados);


        $pedido = Pedido::all();
        return view('pedido.listPedido')->with(['pedido'=> $pedido]);

    }

    public function search(Request $request)
        {
            if(!empty($request->valor)){
                $pedido = Pedido::where(
                    $request->tipo,
                     'like' ,
                    "%". $request->valor."%"
                    )->get();
            } else {
                $pedido = Pedido::all();
            }
    
            return view('pedido.listPedido')->with(['pedido'=> $pedido]);
        }
    
}