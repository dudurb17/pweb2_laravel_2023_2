<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

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

        $produto = new Produto();
        $produto->nome_peca=$request->nome_peca;
        $produto->codigo = $request->codigo;
        $produto->tamanho = $request->tamanho;
        $produto->save();
        $produto = Produto::all();
        return view('produto.listproduto')->with(['produto'=> $produto]);

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