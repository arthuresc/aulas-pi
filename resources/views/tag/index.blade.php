<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer>
        function remover(route){
            return confirm('Você deseja remover a tag?');
        }
    </script>
</head>
<body class="container">    
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <h1>Lista de Tags</h1>    
    <a href="{{ Route('tag.create') }}" class="btn btn-lg btn-primary">Criar tag</a>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="# " class="btn btn-sm btn-outline-primary">Ver</a>
                        <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-sm btn-outline-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{ route('tag.destroy', $tag->id) }}" onsubmit="return remover()">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>