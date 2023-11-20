
@extends('base.app')

@section('titulo', 'Listagem de Produto')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de Produtos</h3>


    <form action="{{ route('produto.search') }}" method="post">
        @csrf
        <!-- cria um hash de segurança -->
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit"><a href="{{ route('loja.create') }}">Cadastrar</a></button>

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
                    <option value="nome_peca">Nome</option>
                    <option value="codigo">Codigo</option>
                    <option value="tamanho">Tamanho</option>

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
                                <th scope="col" class="px-6 py-4">endereço</th>
                                <th scope="col" class="px-6 py-4">Numero</th>
                                <th scope="col" class="px-6 py-4">cidade</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loja as $item)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="py-2 px-4 border">{{ $item->id }}</td>
                                    <td class="py-2 px-4 border">{{ $item->endereco }}</td>
                                    <td class="py-2 px-4 border">{{ $item->numero }}</td>
                                    <td class="py-2 px-4 border">{{ $item->cidade }}</td>
                                    <td class="py-2 px-4 border"><a class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('loja.edit', $item->id) }}">Editar</a></td>
                                    <td class="py-2 px-4 border"><a class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            href="{{ route('loja.destroy', $item->id) }}"
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
