<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Models\User;


class UsuarioController extends Controller
{
    function index()
    {

        //controller - app/http/Controllers
        //Model - app/Model
        //view - resouces/view
        //rotas - router/web.php
        $pessoa01 = new stdClass();
        $pessoa01->nome = "Jackson";
        $pessoa01->idade = 35;

        $pessoa02 = new stdClass();
        $pessoa02->nome = "Maria";
        $pessoa02->idade = 15;

        $pessoa03 = new stdClass();
        $pessoa03->nome = "Chaves";
        $pessoa03->idade = 16;

        $pessoas = [$pessoa01, $pessoa02, $pessoa03];

       // dd($pessoas);

        return view('index', ["pessoas" => $pessoas]);
    }

    public function listUsers()
    {
        $users = User::all();

        return view('user.listUsers')->with(['users'=> $users]);
    }

    public function createUser(Request $request){

        $dados = ['nome'=> $request->name,
        'email'=> $request->email,
        'password'=>$request->password,
        ];

        $user = new User();
        $user->password = $request->password;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
        $users = User::all();
        return view('user.listUsers')->with(['users'=> $users]);

    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect('users')->with('success', "Removido com sucesso!");
    }

    public function update(Request $request, User $users)
    {

        $request->validate([
            'name'=>'required|max:100',

        ],[
            'name.required'=>"O :attribute é obrigatorio!",
            'name.max'=>" Só é permitido 120 caracteres no :attribute !",

        ]);

        $dados = ['name'=> $request->name,
            'email'=> $request->email,


        ];



        User::updateOrCreate(
            ['id'=>$request->id],
            $dados);


        return redirect('users')->with('success', "Atualizado com sucesso!");

    }

    public function edit($id)
    {
        $Users = User::find($id); //select * from aluno where id = $id
        return view('user.formUser')->with([
            'users'=> $Users,]);
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $users = User::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $users = User::all();
        }

        return view('user.listUsers')->with(['users'=>$users]);
    }




}