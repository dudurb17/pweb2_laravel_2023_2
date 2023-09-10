@extends('base.app')

@section('titulo', 'Formulário de Pedido')

@section('content')
    @php
        // dd($pedido); // é igual ao var_dump()
        if (!empty($pedido->id)) {
            $route = route('pedido.update', $pedido->id);
        } else {
            $route = route('pedido.cadastrar');
        }
    @endphp
    <div class="mx-auto py-12 divide-y md:max-w-4xl">
        <div class="grid grid-cols 2 gap-4">
            <h3 class="pt-4 text-2xl font-medium">Formulário de roupas</h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data"
                class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
                @csrf
                <!-- cria um hash de segurança -->

                @if (!empty($aluno->id))
                    @method('PUT')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($pedido->id)) {{ $pedido->id }}@elseif (!empty(old('id'))){{ old('id') }}@else{{ '' }} @endif">

                <label class="block">
                    <span class="text-gray-700">Nome da peça</span>
                    <input type="text" name="name"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty($pedido->name)) {{ $pedido->name }} @elseif(!empty(old('name'))) {{ old('name') }} @else {{ '' }} @endif">
                </label>
                <div class="mb-4 md:flex grid grid-rows-2">
                    <div class="relative mb-6">
                        <label class="block">
                            <span class="text-gray-700">Data da entrega</span>
                            <input type="date" name="data_pedido"
                                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                                value="@if (!empty($pedido->data_pedido)) {{ $pedido->data_pedido }} @elseif (!empty(old('data_pedido'))){{ old('data_pedido') }}@else{{ '' }} @endif">
                        </label>
                    </div>
                    <div class="md-4 md:mr-2 md:mb-0 col-span-2">
                        <label class="block">
                            <span class="text-gray-700">CNPJ</span>
                            <input type="text" name="cnpj"
                                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                        focus:ring-0 focus:border-black"
                                value=" @if (!empty($pedido->cpf)) {{ $pedido->cpf }}@elseif(!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br><br>
                        </label>
                    </div>
                </div>
                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" name="email"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black"
                        value="@if (!empty($pedido->email)) {{ $pedido->email }}@elseif(!empty(old('email'))) {{ old('email') }} @else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">Quantidade</span>
                    <input type="text" name="Quantidade"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                    focus:ring-0 focus:border-black"
                        value="@if (!empty(old('Quantidade'))) {{ old('Quantidade') }}@elseif(!empty($pedido->Quantidade)){{ $pedido->Quantidade }}@else{{ '' }} @endif"><br><br>
                </label>

                <label class="block">
                    <span class="text-gray-700">Usuario</span>
                    <select name="user_id"
                        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200
                focus:ring-0 focus:border-black">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </label>


        </div>
        <br>
        <br>
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">Salvar</button>

        <button><a class="rounded-full text-neutral-100 bg-blue-700 px-4 py-2 w-40 font-bold hover:bg-blue-300"
                href="{{ route('pedido.list') }}">Voltar</a></button>
        </form>
    </div>
    </div>
@endsection
