@extends('base.app')

@section('titulo', 'Formulário de Usuários')

@section('content')

    @php
        // dd($users); // é igual ao var_dump()
        if (!empty($users->id)) {
            $route = route('user.update', $users->id);
        } else {
            $route = route('user.create');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Cadastrar</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($user->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($users->id)) {{ $users->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label class="block">
                    <span class="text-gray-700">Nome</span>
                    <input type="text" name="name"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty($users->name)) {{ $users->name }} @elseif(!empty(old('name'))) {{ old('name') }} @else {{ '' }} @endif">
                </label>

                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($users->email)) {{ $users->email }}@elseif(!empty(old('email'))) {{ old('email') }} @else{{ '' }} @endif"><br><br>
                </label>


                @if (empty($users->id))
                <label class="block">
                    <span class="text-gray-700">Senha</span>
                    <input type="password" name="password"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty(old('senha'))) {{ old('senha') }}@elseif(!empty($users->senha)){{ $users->senha }}@else{{ '' }} @endif"><br><br>
                </label>
                @endif




        </div>

        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">Salvar</button>

        <button><a class="rounded-full text-neutral-100 bg-blue-700 px-4 py-2 w-40 font-bold hover:bg-blue-300"
                href="{{ route('user.list') }}">Voltar</a></button>
        </form>
    </div>
    </div>
@endsection
