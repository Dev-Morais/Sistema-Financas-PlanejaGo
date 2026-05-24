<?php $__env->startSection('content'); ?>

    <?php if(session()->has('success')): ?>
        <?php echo e(session()->get('success')); ?> 
    <?php endif; ?>

    <?php if(auth()->check()): ?>
        already logged in  <?php echo e(auth()->user()->name); ?> 
        
        <form action="<?php echo e(route('login.destroy')); ?> " method='POST'>
            <?php echo csrf_field(); ?>
            <a href=<?php echo e(route('login.destroy')); ?> >logout </a>
        </form>
        
        <?php else: ?> 

        
<div class="flex-1 flex flex-col justify-center  items-center w-full">
    <form action="<?php echo e(route('login.store')); ?> " method='POST' >
        
        <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span><?php echo e($message); ?></span> 
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="flex flex-col w-fit border rounded-sm p-4 gap-4">
            <?php echo csrf_field(); ?>    
            <p>Email </p>
            <input type="text" name="email" value="" class="border rounded" >
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
            <p>Senha </p>
            <input type="password" name="password" value="" class="border rounded" >
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-purple-300 p-2 border rounded-sm">submit</button>
            </div>
        
        </div>
    
    </form>
</div>    
        
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Projetos\Sistema-Financas-PlanejaGo\sistema-planejago\resources\views/auth/login.blade.php ENDPATH**/ ?>