<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\Produto;
use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    public function index(){
        $data = ProdutoCategoria::all();

        return view('categoriasProduto.list')->with(['pedido'=> $data]);
    }

    public function create(){

        $produto=Produto::all();
        $categoria=CategoriaModel::all();
        $data = ProdutoCategoria::all();

        return view('categoriasProduto.form')->with(['pedido'=>$data,  "produto"=> $produto,"categoria"=> $categoria]);
    }
    public function store(Request $request){


        $dados = ["produto_id"=>$request->produto_id,
        "categoria_id"=> $request->categoria_id,
    ];
    ProdutoCategoria::create($dados);
    $data = ProdutoCategoria::all();

        return view('categoriasProduto.list')->with(['pedido'=> $data]);

    }


}
