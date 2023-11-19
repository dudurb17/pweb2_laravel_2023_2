@extends('base.app')

@section('titulo', 'Listagem de Usuarios')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de Pedidos por usuario</h3>






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
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
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
