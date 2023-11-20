<?php

namespace App\Http\Controllers;

use App\Models\ProdutoCategoria;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    public function index(){
        $data = ProdutoCategoria::all();
        return view('categoriasProduto.list')->with(['pedido'=> $data]);
    }
}
