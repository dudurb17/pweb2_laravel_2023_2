@extends('base.app')

@section('titulo', 'Formulário de produto')

@section('content')
    @php
        // dd($produto); // é igual ao var_dump()
        if (!empty($produto->id)) {
            $route = route('produto.update', $produto->id);
        } else {
            $route = route('produto.cadastrar');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de roupas</h3>
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
                    value="@if (!empty($produto->id)) {{ $produto->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">



                <label class="block">
                    <span class="text-gray-700">Nome peça</span>
                    <input type="text" name="nome_peca"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($produto->nome_peca)) {{ $produto->nome_peca }}@elseif(!empty(old('nome_peca'))) {{ old('nome_peca') }} @else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">Codigo da peça</span>
                    <input type="text" name="codigo"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($produto->codigo)) {{ $produto->codigo }}@elseif(!empty(old('codigo'))) {{ old('codigo') }} @else{{ '' }} @endif"><br><br>
                </label>
                <label class="block">
                    <span class="text-gray-700">Tamanho da peça</span>
                    <input type="text" name="tamanho"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($produto->tamanho)) {{ $produto->tamanho }}@elseif(!empty(old('tamanho'))) {{ old('tamanho') }} @else{{ '' }} @endif"><br><br>
                </label>
        </div>
        <br>
        <br>
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">Salvar</button>

        <button><a class="rounded-full text-neutral-100 bg-blue-700 px-4 py-2 w-40 font-bold hover:bg-blue-300"
                href="{{ route('produto.list') }}">Voltar</a></button>
        </form>
    </div>
    </div>
@endsection
