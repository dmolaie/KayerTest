<!DOCTYPE html>
<html class="min:h-full" lang="<?php echo e(app()->getLocale()); ?>">
<?php echo $__env->make('fa.template.part-theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="min:h-full overflow-x-hidden">
<?php echo $__env->make('fa.template.part-theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="min:h-full">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('fa.template.part-theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/site/runtime.js')); ?>" defer ></script>
<script src="<?php echo e(asset('js/site/master.js')); ?>" defer ></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /var/www/resources/views/fa/template/master.blade.php ENDPATH**/ ?>