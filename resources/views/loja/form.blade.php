@extends('base.app')

@section('titulo', 'Formulário de funcionarios')

@section('content')
    @php
        // dd($produto); // é igual ao var_dump()
        if (!empty($loja->id)) {
            $route = route('loja.update', $loja->id);
        } else {
            $route = route('loja.store');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de lojas</h3>
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
                    value="@if (!empty($loja->id)) {{ $loja->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">



                <label class="block">
                    <span class="text-gray-700">Endereço</span>
                    <input type="text" name="endereco" required
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($loja->endereco)) {{ $loja->endereco }}@elseif(!empty(old('endereco'))) {{ old('endereco') }} @else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">Numero</span>
                    <input type="text" name="numero" required
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($loja->numero)) {{ $loja->numero }}@elseif(!empty(old('numero'))) {{ old('numero') }} @else{{ '' }} @endif"><br><br>
                </label>
                <label class="block">
                    <span class="text-gray-700">Cidade</span>
                    <input type="text" name="cidade" required
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($loja->cidade)) {{ $loja->cidade }}@elseif(!empty(old('cidade'))) {{ old('cidade') }} @else{{ '' }} @endif"><br><br>
                </label>

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
