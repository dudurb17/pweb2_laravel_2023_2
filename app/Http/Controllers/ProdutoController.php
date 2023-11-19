<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Symfony\Contracts\Service\Attribute\Required;

class ProdutoController extends Controller
{
    public function listProduto () {


        $produto = Produto::all();

        return view('produto.listProduto')->with(['produto'=> $produto]);
    }

    public function createProduto(){


        $produto = Produto::all();

        return view('produto.formProduto')->with(['produto'=> $produto]);
    }

    public function cadastrarProduto (Request $request) {

        $request->validate(['nome_peca'=>'required|max:100',
        'codigo'=>'required|min:3',
        'tamanho'=>'required|min:1'
    ], ['nome_peca'=>"O :attribute é obrigatorio!",
    'codigo'=>"O :attribute é obrigatorio!",
    "tamanho"=>'O :attribute é obrigatorio!'

]);

    $dados=['nome_peca'=>$request->nome_peca,
    'codigo'=>$request->codigo,
    'tamanho'=>$request->tamanho];



    $imagem = $request->file('image');
    //verifica se existe imagem no formulário
if($imagem){
    $nome_arquivo =
    date('YmdHis').'.'.$imagem->getClientOriginalExtension();

    $diretorio = "img/events/";
    //salva imagem em uma pasta do sistema
    $imagem->storeAs($diretorio,$nome_arquivo,'public');

    $dados['image'] = $diretorio.$nome_arquivo;
}


    Produto::create($dados);

    return redirect('produto')->with('success', "Cadastrado com sucesso!");

    }

    public function destroyProduto ($id){
        Produto::destroy($id);
        return redirect('produto')->with('success', "Removido com sucesso!");

    }

    public function edit($id)
    {
        $produto = Produto::find($id); //select * from aluno where id = $id
        return view('produto.formProduto')->with([
            'produto'=> $produto]);
    }

        public function update(Request $request, Produto $produto)
        {

            $request->validate([
                'nome_peca.required'=>"O :attribute é obrigatorio!",
                'codigo.required'=>"O :attribute é obrigatorio!",
                'tamanho.required'=>"O :attribute é obrigatorio!",


            ]);

            $dados = [
                'nome_peca'=> $request->nome_peca,
                'codigo'=> $request->codigo,
                'tamanho'=> $request->tamanho,



            ];



            Produto::updateOrCreate(
                ['id'=>$request->id],
                $dados);


            return redirect('produto')->with('success', "Atualizado com sucesso!");

        }
        public function search(Request $request)
        {
            if(!empty($request->valor)){
                $produto = Produto::where(
                    $request->tipo,
                     'like' ,
                    "%". $request->valor."%"
                    )->get();
            } else {
                $produto = Produto::all();
            }

            return view('produto.listProduto')->with(['produto'=> $produto]);
        }





}