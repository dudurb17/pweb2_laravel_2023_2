@extends('base.app')

@section('titulo', 'Listagem de Usuarios')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de Pedidos</h3>

    <form action="{{ route('pedido.search') }}" method="post">
        @csrf
        <!-- cria um hash de segurança -->
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit"><a href="{{ route('pedido.create') }}">Cadastrar</a></button>
            <a  class="rounded-full text-neutral-100 bg-orange-500 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            href="{{ route('pedido.report') }}" target="_blank">Relatório</a>
        <button
            class="rounded-full text-neutral-100 bg-yellow-500 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">
            Buscar
        </button>
        <div class="grid grid-cols-2 gap-4">
            <!--First name input-->
            <div class="relative mb-6" data-te-input-wrapper-init>
                <select name="tipo"
                    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="cnpj">CNPJ</option>
                    <option value="data_pedido">Data pedido</option>


                </select>

            </div>
            <div class="relative mb-6" data-te-input-wrapper-init>
                <input
                    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    type="text" name="valor" placeholder="Pesquisar">
            </div>
        </div>
    </form>




    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-4">id</th>
                                <th scope="col" class="px-6 py-4">User Id</th>
                                <th scope="col" class="px-6 py-4">Nome do produto</th>
                                <th scope="col" class="px-6 py-4">Cnpj</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Data pedido</th>
                                <th scope="col" class="px-6 py-4">Quantidade</th>

                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido as $item)
                                {{-- @dd($item) --}}
                                <tr
                                class="py-2 px-4 border">
                                    <td class="py-2 px-4 border">{{ $item->id }}</td>
                                    <td class="py-2 px-4 border">{{ $item->user->name }}</td>
                                    <td class="py-2 px-4 border">{{ $item->product->nome_peca }}</td>
                                    <td class="py-2 px-4 border">{{ $item->cnpj }}</td>
                                    <td class="py-2 px-4 border">{{ $item->email }}</td>
                                    <td class="py-2 px-4 border">{{ $item->data_pedido }}</td>
                                    <td class="py-2 px-4 border">{{ $item->Quantidade }}</td>
                                    <td class="py-2 px-4 border"><a class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('pedido.edit', $item->id) }}">Editar</a></td>
                                    <td class="py-2 px-4 border"><a class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('pedido.destroy', $item->id) }}"
                                            onclick="return confirm('Deseja Excluir?')">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
