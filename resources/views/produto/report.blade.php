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
                    <th scope="col">Image</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">tamanho</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produto ?? '' as $item)
                @php
                   $nome_imagem = !empty($item->image) ? $item->image : 'img/events/sem_imagem.png';
                   $srcImagem = public_path()."/storage/".$nome_imagem;
                @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td class="h-32 w-32 object-cover rounded-full"><img src="{{$srcImagem}}" width="100px"
                        alt="imagem"></td>
                    <td>{{ $item->nome_peca }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->tamanho }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
