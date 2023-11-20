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

        return redirect('loja')->with('success', "Cadastrado com sucesso!");

    }

    public function edit ($id) {
        $loja = Lojas::find($id); //select * from aluno where id = $id
        return view('loja.form')->with([
            'loja'=>  $loja]);
    }
    public function update(Request $request)
    {

        $request->validate(
            [
                'endereco'=>'required|min:3',
                'numero'=>'required|min:1',
                'cidade'=>'required|min:1'
            ],[
            'endereco.required'=>"O :attribute é obrigatorio!",
            'numero.required'=>"O :attribute é obrigatorio!",
            'cidade.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['endereco'=> $request->endereco,
            'numero'=> $request->numero,
            'cidade'=> $request->cidade,];

        Lojas::updateOrCreate(
            ['id'=>$request->id],
            $dados);
            return redirect('loja')->with('success', "Atualizado com sucesso!");

    }
    public function search(Request $request)
        {
            if(!empty($request->valor)){
                $loja = Lojas::where(
                    $request->tipo,
                     'like' ,
                    "%". $request->valor."%"
                    )->get();
            } else {
                $loja = Lojas::all();
            }

            return view('loja.list')->with(['loja'=> $loja]);
        }

        public function destroy ($id){
            Lojas::destroy($id);
            return redirect('loja')->with('success', "Removido com sucesso!");

        }







}