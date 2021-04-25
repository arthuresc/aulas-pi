<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="container bg-light">
    <h1>Criar Produto</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="row mt-1">
            <span class="form-label">Nome</span>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="row mt-1">
            <span class="form-label">Descrição</span>
            <textarea name="description" class="form-control" value="{{ $product->description }}"></textarea>
        </div>
        <div class="row mt-1">
            <span class="form-label">Preco</span>
            <input type="number" name="price" min="0.00" max="10000.00" step="1" class="form-control">
        </div>
        <div class="row mt-1">
            <span class="form-label">Categoria</span>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}} "> {{$category->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="row mt-4">
            <button type="submit" class="btn btn-lg btn-success">Adicionar produto</button>
        </div>
    </form>

</body>
</html>