<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Models\User;


class UsuarioController extends Controller
{
    public function index($id){


        $usuarioPedidos = User::with('pedidos')->find($id);
        return view('pedidosUser.list')->with(['pedido'=> $usuarioPedidos->pedidos]);


    }
    public function listUsers()
    {
        $users =  User::with('pedidos')->get();
        return view('user.listUsers')->with(['users'=> $users]);
    }

    public function createUser(Request $request){


        $request->validate([
            'name'=>'required|max:100',
            'email'=>"required|unique:users,email",
            "password"=>'required|min:5'
        ],[
            'name.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 100 caracteres no :attribute !",
            'email.required'=>"O :attribute é obrigatorio!",
            'email.unique'=>"Email ja cadastrado",
            "password.required"=>" O :attribute é obrigatorio!",
            "password.min"=>"O minino permetido é 5 no :attribute"
        ]);

        $dados = ['name'=> $request->name,
        'email'=> $request->email,
        'password'=>$request->password,
        ];
        User::create($dados);
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
