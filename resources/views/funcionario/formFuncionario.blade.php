@extends('base.app')

@section('titulo', 'Formulário de funcionarios')

@section('content')
    @php
        // dd($produto); // é igual ao var_dump()
        if (!empty($funcionario->id)) {
            $route = route('funcionario.update', $funcionario->id);
        } else {
            $route = route('funcionario.cadastrar');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de funcionarios</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf<!-- cria um hash de segurança -->
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700" role="alert">Erro!
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif


                {{-- @if (!empty($produto->id))
                    @method('PUT')
                @endif --}}

                <input type="hidden" name="id"
                    value="@if (!empty($funcionario->id)) {{ $funcionario->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">



                <label class="block">
                    <span class="text-gray-700">Nome da funcionaria</span>
                    <input type="text" name="nome"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($funcionario->nome)) {{ $funcionario->nome }}@elseif(!empty(old('nome'))) {{ old('nome') }} @else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">CPF</span>
                    <input type="text" name="cpf"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($funcionario->cpf)) {{ $funcionario->cpf }}@elseif(!empty(old('cpf'))) {{ old('cpf') }} @else{{ '' }} @endif"><br><br>
                </label>
                <label class="block">
                    <span class="text-gray-700">Cargo</span>
                    <input type="text" name="cargo"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($funcionario->cargo)) {{ $funcionario->cargo }}@elseif(!empty(old('cargo'))) {{ old('cargo') }} @else{{ '' }} @endif"><br><br>
                </label>
                <input
                        class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-green-50 file:text-green-700
                                hover:file:bg-green-100"
                        type="file" name="image"><br>
        </div>
        <br>
        <br>
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">Salvar</button>

        <button><a class="rounded-full text-neutral-100 bg-blue-700 px-4 py-2 w-40 font-bold hover:bg-blue-300"
                href="{{ route('funcionario.listFuncionario') }}">Voltar</a></button>
        </form>
    </div>
    </div>
@endsection
