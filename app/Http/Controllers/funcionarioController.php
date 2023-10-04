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
}