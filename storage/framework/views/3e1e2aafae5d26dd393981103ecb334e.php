<?php if (! ($breadcrumbs->isEmpty())): ?>
    <ol class="breadcrumb float-sm-right">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($breadcrumb->url && !$loop->last): ?>
                <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
            <?php else: ?>
                <li class="breadcrumb-item active"><?php echo e($breadcrumb->title); ?></li>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php endif; ?>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/partials/blocks/admin-breadcrumbs.blade.php ENDPATH**/ ?>