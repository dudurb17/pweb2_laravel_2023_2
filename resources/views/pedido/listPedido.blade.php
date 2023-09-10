@extends('base.app')

@section('titulo', 'Listagem de Usuarios')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de Pedidos</h3>
    <button
        class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
        type="submit"><a href="{{ route('user.formUser') }}">Cadastrar</a></button>



    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">id</th>
                                <th scope="col" class="px-6 py-4">User Id</th>
                                <th scope="col" class="px-6 py-4">CNPJ</th>
                                <th scope="col" class="px-6 py-4">Data</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Quantidade</th>
                                <th scope="col" class="px-6 py-4">Nome</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $item)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->user_id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->cnpj }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->data_pedido }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->Quantidade }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->nome_peca }}</td>

                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->users_id }}</td>

                                    <td class="whitespace-nowrap px-6 py-4"><a
                                            href="{{ route('pedido.edit', $item->id) }}">Editar</a></td>
                                    <td class="whitespace-nowrap px-6 py-4"><a
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
