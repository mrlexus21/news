<?php if(session()->has('success')): ?>
    <p class="alert alert-success"><?php echo e(session()->get('success')); ?></p>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
    <p class="alert alert-warning"><?php echo e(session()->get('warning')); ?></p>
<?php endif; ?>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/partials/blocks/messages-action.blade.php ENDPATH**/ ?>