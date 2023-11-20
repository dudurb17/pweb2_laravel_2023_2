@extends('base.app')

@section('titulo', 'Listagem de Usuarios')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de categorias dos produtos</h3>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-4">id</th>
                                <th scope="col" class="px-6 py-4">Nome Produto</th>
                                <th scope="col" class="px-6 py-4">Nome da categoria</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pedido as $item)
                                {{-- @dd($item) --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="py-2 px-4 border">{{ $item->id }}</td>
                                    <td class="py-2 px-4 border">{{ $item->produtos->nome_peca }}</td>
                                    <td class="py-2 px-4 border">{{ $item->categorias->name }}</td>

                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
