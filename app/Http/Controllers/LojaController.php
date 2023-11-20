<?php

namespace App\Http\Controllers;

use App\Models\Lojas;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index(){
        $loja = Lojas::all();
        return view('loja.list')->with(['loja'=> $loja]);
    }
    public function create(){
        $loja = Lojas::all();
        return view('loja.form')->with(['loja' =>  $loja]);
    }
    public function store(Request $request) {

        $request->validate([
            'endereco'=>'required|min:3',
            'numero'=>"required",
            "cidade"=>"required"
        ],[
            'endereco.required'=>"O :attribute é obrigatorio!",
            'numero.max'=>"O :attribute é obrigatorio!",
            'cidade.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['endereco'=> $request->endereco,
        'email'=> $request->email,
        'numero'=>$request->numero,
        'cidade'=>$request->cidade,
        ];

        Lojas::create($dados);
        $loja = Lojas::all();
        return view('loja.list')->with(['loja'=> $loja]);

    }


}