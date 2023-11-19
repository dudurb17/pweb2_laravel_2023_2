@extends('base.app')

@section('titulo', 'Listagem de Usuarios')

@section('content')
    <h3 class="pt-4 text-2xl font-medium">Listagem de funcionarios</h3>

    <form action="{{ route('funcionario.search') }}" method="post">
        @csrf
        <!-- cria um hash de segurança -->
        <button
            class="rounded-full text-neutral-100 bg-green-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit"><a href="{{ route('funcionario.create') }}">Cadastrar</a></button>

        <button
            class="rounded-full text-neutral-100 bg-yellow-700 px-4 py-2 w-40 font-bold hover:bg-green-900 hover:text-neutro-700"
            type="submit">
            Buscar
        </button>
        <div class="grid grid-cols-2 gap-4">
            <!--First name input-->
            <div class="relative mb-6" data-te-input-wrapper-init>
                <select name="tipo"
                    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="Cargo">Cargo</option>


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
                                <th scope="col" class="px-6 py-4">Image</th>
                                <th scope="col" class="px-6 py-4">Nome</th>
                                <th scope="col" class="px-6 py-4">CPF</th>
                                <th scope="col" class="px-6 py-4">Cargo</th>


                                <th scope="col" class="px-6 py-4">Ações</th>
                                <th scope="col" class="px-6 py-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionario as $item)
                            @php
                                $nome_imagem = !empty($item->image) ? $item->image : 'img/events/sem_imagem.png';
                            @endphp
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="py-2 px-4 border">{{ $item->id }}</td>
                                    <td class="py-2 px-4 border"><img src="/storage/{{$nome_imagem}}" width="100px"
                                        alt="imagem"></td>
                                    <td class="py-2 px-4 border">{{ $item->nome }}</td>
                                    <td class="py-2 px-4 border">{{ $item->cpf }}</td>
                                    <td class="py-2 px-4 border">{{ $item->cargo }}</td>
                                    <td class="py-2 px-4 border"><a
                                            href="{{ route('funcionario.edit', $item->id) }}">Editar</a></td>
                                    <td class="py-2 px-4 border"><a
                                            href="{{ route('funcionario.destroy', $item->id) }}"
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
