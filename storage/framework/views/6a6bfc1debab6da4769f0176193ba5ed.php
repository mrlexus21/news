<h2>Добрый день!</h2>
<p>
    <?php echo e($data->message); ?>

</p>
<?php $__empty_1 = true; $__currentLoopData = $data->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <a href="<?php echo e($linkItem->href); ?>"><?php echo e($linkItem->title); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/emails/chiefeditor.blade.php ENDPATH**/ ?>