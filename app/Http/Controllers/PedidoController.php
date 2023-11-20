<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedido;
use App\Models\User;
use App\Models\Produto;
use PDF;


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

        $request->validate([
            'cnpj'=>'required|min:3',
            'email'=>"required",
            "Quantidade"=>"required"
        ],[
            'cnpj.required'=>"O :attribute é obrigatorio!",
            'email.max'=>"O :attribute é obrigatorio!",
            'Quantidade.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['user_id'=> $request->user_id,
        'email'=> $request->email,
        'cnpj'=>$request->cnpj,
        'data_pedido'=>$request->data_pedido,
        'Quantidade'=>$request->Quantidade,
        'produto_id'=>$request->produto_id
        ];

        Pedido::create($dados);
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
            'cnpj'=>'required|min:3',
            'data_pedido'=>'required|min:2',
            'email'=>'required|min:2',
            'Quantidade'=>'required|min:1',

        ],[
            'cnpj.required'=>"O :attribute é obrigatorio!",
            'data_pedido.required'=>"O :attribute é obrigatorio!",
            'email.required'=>"O :attribute é obrigatorio!",
            "Quantidade.required"=>"O :attribute é obrigatorio!"

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
        public function report(){
            //select * from aluno order by nome
            $pedido = Pedido::orderBy('user_id')->get();

            $data = [
                'title'=>"Relatorio Listagem dos Produtos",
                'pedido'=> $pedido
            ];

            $pdf = PDF::loadView('pedido.report',$data);
            return $pdf->download("listagem_produtos.pdf");
    }


}