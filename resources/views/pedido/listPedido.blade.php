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

        <button
            class="rounded-full text-neutral-100 bg-yellow-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">
            Buscar
        </button>
        <div class="grid grid-cols-2 gap-4">
            <!--First name input-->
            <div class="relative mb-6" data-te-input-wrapper-init>
                <select name="tipo"
                    class="peer block min-h-[auto] w-full rounded border-0 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder data-[te-input-state-active]:placeholder motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-1">
                    <option value="cnpj">CNPJ</option>
                    <option value="data_pedido">Data pedido</option>


                </select>

            </div>
            <div class="relative mb-6" data-te-input-wrapper-init>
                <input
                    class="peer block min-h-[auto] w-full rounded border-0 bg px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear  motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]"
                    type="text" name="valor" placeholder="Pesquisar">
            </div>
        </div>
    </form>




    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
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
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->user->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->product->nome_peca }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->cnpj }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->data_pedido }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->Quantidade }}</td>
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
