<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class funcionarioController extends Controller
{
    public function listFuncionario () {
        $funcionario = Funcionario::all();
        return view('funcionario.listFuncionario')->with(['funcionario'=> $funcionario]);
    }
    public function createFuncionario(){


        $funcionario = Funcionario::all();

        return view('funcionario.formFuncionario')->with(['funcionario'=> $funcionario]);
    }

    public function cadastrarFuncionario (Request $request) {

        $request->validate(['nome'=>'required|max:100',
        'cpf'=>'required|min:3',
        'cargo'=>'required|min:1'
    ], ['nome'=>"O :attribute é obrigatorio!",
    'cpf'=>"O :attribute é obrigatorio!",
    "cargo"=>'O :attribute é obrigatorio!'

]);

    $dados=['nome'=>$request->nome,
    'cpf'=>$request->cpf,
    'cargo'=>$request->cargo];


    Funcionario::create($dados);

    return redirect('funcionario')->with('success', "Cadastrado com sucesso!");

    }
    public function edit($id)
    {
        $funcionario = Funcionario::find($id); //select * from aluno where id = $id
        return view('funcionario.formFuncionario')->with([
            'funcionario'=> $funcionario]);
    }
    public function update(Request $request, Funcionario $funcionario)
    {

        $request->validate([
            'nome.required'=>"O :attribute é obrigatorio!",
            'cpf.required'=>"O :attribute é obrigatorio!",
            "cargo.required"=>'O :attribute é obrigatorio!'
        ]);

        $dados = [
            'nome'=> $request->nome,
            'cpf'=> $request->cpf,
            'cargo'=> $request->cargo,

        ];



        Funcionario::updateOrCreate(
            ['id'=>$request->id],
            $dados);


        return redirect('funcionario')->with('success', "Atualizado com sucesso!");

    }
    public function destroyFuncionario ($id){
        Funcionario::destroy($id);
        return redirect('funcionario')->with('success', "Removido com sucesso!");

    }
    public function search(Request $request)
        {
            if(!empty($request->valor)){
                $funcionario = Funcionario::where(
                    $request->tipo,
                     'like' ,
                    "%". $request->valor."%"
                    )->get();
            } else {
                $funcionario = Funcionario::all();
            }

            return view('funcionario.listFuncionario')->with(['funcionario'=> $funcionario]);
        }


}