<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Cadastrar tag</title>
</head>
<body class="container bg-light">
    <h1>Criar Tag</h1>
    <form method="POST" action="{{ route('tag.store') }}">
        @csrf
        <div class="row mt-1">
            <span class="form-label">Nome</span>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="row mt-4">
            <button type="submit" class="btn btn-lg btn-success">Adicionar tag</button>
        </div>
    </form>

</body>
</html>