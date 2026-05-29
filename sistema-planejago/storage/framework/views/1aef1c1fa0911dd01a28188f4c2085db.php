<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlanejaGo</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen flex flex-col">

    <?php echo $__env->make('shared._navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="flex-1 flex flex-col w-full">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
</body>
</html><?php /**PATH C:\Projetos\Sistema-Financas-PlanejaGo\sistema-planejago\resources\views/shared/layout.blade.php ENDPATH**/ ?>