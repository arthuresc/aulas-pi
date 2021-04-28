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
        function remover(){
            confirm('Você deseja remover o produto?')
        }
    </script>
</head>
<body>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="mx-5">
        <?php if(session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session()->get('success')); ?>

        </div>
        <?php endif; ?>
        <h1>Lista de Produtos</h1>    
        <a href="<?php echo e(Route('product.create')); ?>" class="btn btn-lg btn-primary">Criar produto</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagem</th>                        
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th> 
                        <th scope="col">Categoria N</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($product->id); ?></th>
                        <th scope="col">
                            <p><?php echo e($product->image); ?></p>
                            <img src="<?php echo e($product->image); ?>" class="img-thumbnail"  alt="<?php echo e('Imagem principal do '.$product->name); ?> "> 
                        </th>
                        <td><?php echo e($product->name); ?></td>
                        <td> <?php echo e($product->price); ?> </td>
                        <td> <?php echo e($product->category_id); ?> </td>
                        <td>
                            <a href="# " class="btn btn-sm btn-outline-primary">Ver</a>
                            <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('product.destroy', $product->id)); ?>" onsubmit="return remover()">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                
                                <button type="submit" class="btn btn-sm btn-outline-danger">Apagar123</button>
                            </form>
                            <a href="#" onclick="remover('<?php echo e(route('product.destroy', $product->id)); ?>')" class="btn btn-sm btn-outline-danger">Apagar</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </main>    
    
</body>
</html><?php /**PATH /home/amebl44jn/estudos/aulas-pi/resources/views/product/index.blade.php ENDPATH**/ ?>