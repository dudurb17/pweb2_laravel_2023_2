<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-2">
        <h2 class="text-center mb-2">{{$title}}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">nome da peça</th>
                    <th scope="col">cnpj</th>
                    <th scope="col">email</th>
                    <th scope="col">Data do pedido</th>
                    <th scope="col">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido ?? '' as $item)
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{$item->user->name }}</td>
                    <td>{{ $item->product->nome_peca  }}</td>
                    <td>{{ $item->cnpj }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->data_pedido }}</td>
                    <td>{{ $item->Quantidade }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
