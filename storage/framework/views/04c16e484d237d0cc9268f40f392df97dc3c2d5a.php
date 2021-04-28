<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
    <script defer>
        function remover(){
            return confirm('Você deseja remover a categoria?')
        }
    </script>
</head>
<body >    
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="mx-3">
        <?php if(session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session()->get('success')); ?>

        </div>
        <?php endif; ?>
        
        <h1>Lista de Categorias</h1>    
        <a href="<?php echo e(Route('category.create')); ?>" class="btn btn-lg btn-primary">Criar Categoria</a>    
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th> 
                        <th scope="col">Qtd de Produtos</th> 
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($category->id); ?> 
                        </td>
                        <td>
                            <?php echo e($category->name); ?>

                        </td>
                        <td>
                            <?php echo e($category->products->count()); ?> 
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="<?php echo e(route('category.edit', $category->id)); ?> " class="btn btn-sm btn-warning">Editar</a>
                            <form class="d-inline" method="POST" action="<?php echo e(route('category.destroy', $category->id)); ?>" onsubmit="return remover()">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                            
                        </td>
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html><?php /**PATH /home/amebl44jn/estudos/aulas-pi/resources/views/category/index.blade.php ENDPATH**/ ?>