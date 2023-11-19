<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use Illuminate\Http\Request;
use App\Charts\SalarioChar;
use App\Charts\GraficoSalario;
use App\Charts\SalarioPizza;
use App\Models\Funcionario;

class SalarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salario = Salario::all();
        return view('salario.list')->with(['salario'=> $salario ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salario = Salario::all();
        $funcionario=Funcionario::all();

        return view('salario.form')->with(['salario'=> $salario, "funcionario"=>$funcionario]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'salario'=>'required|min:3',
        'carga_horaria'=>'required|min:1'
    ], ['salario'=>"O :attribute é obrigatorio!",
    "carga_horaria"=>'O :attribute é obrigatorio!'

]);

$dados=['funcionario_id'=>$request->funcionario_id,'salario'=>$request->salario,
    'carga_horaria'=>$request->carga_horaria,
];
Salario::create($dados);

    return redirect('salario')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Salario $salario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $salario = Salario::find($id); //select * from aluno where id = $id

        $funcionario = Funcionario::orderBy('nome')->get();
        return view('salario.form')->with([
            'salario'=> $salario, "funcionario"=>$funcionario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salario $salario)
    {

        $request->validate([
            'salario.required'=>"O :attribute é obrigatorio!",
            'carga_horaria.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = [
            'funcionario_id'=>$request->funcionario_id,
            'salario'=> $request->salario,
            'carga_horaria'=> $request->carga_horaria,
        ];



        Salario::updateOrCreate(
            ['id'=>$request->id],
            $dados);


        return redirect('salario')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Salario::destroy($id);
        return redirect('salario')->with('success', "Removido com sucesso!");
    }

    public function chart(SalarioPizza $cargaHoraria, SalarioChar $salario){

        return view('salario.char')->with(['aluno'=> $salario->build(),
                      'alunosNotas'=> $cargaHoraria->build()
    ]);
    }

    public function search(Request $request)
        {
            if(!empty($request->valor)){
                $salario = Salario::where(
                    $request->tipo,
                     'like' ,
                    "%". $request->valor."%"
                    )->get();
            } else {
                $salario = Salario::all();
            }

            return view('salario.list')->with(['salario'=> $salario]);
        }
}