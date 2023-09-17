<?php $__env->startSection('title', __('admin.admin_space_panel')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php if (isset($component)) { $__componentOriginal6b58f30aba167acf84ab12b0a38b064d = $component; } ?>
<?php $component = App\View\Components\AdminNewsWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-news-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminNewsWidget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b58f30aba167acf84ab12b0a38b064d)): ?>
<?php $component = $__componentOriginal6b58f30aba167acf84ab12b0a38b064d; ?>
<?php unset($__componentOriginal6b58f30aba167acf84ab12b0a38b064d); ?>
<?php endif; ?>
            <!-- ./col -->
            <?php if (isset($component)) { $__componentOriginalb8489ba49e1762b4d62e942dd931bb0f = $component; } ?>
<?php $component = App\View\Components\AdminAdWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-ad-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminAdWidget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8489ba49e1762b4d62e942dd931bb0f)): ?>
<?php $component = $__componentOriginalb8489ba49e1762b4d62e942dd931bb0f; ?>
<?php unset($__componentOriginalb8489ba49e1762b4d62e942dd931bb0f); ?>
<?php endif; ?>
            <!-- ./col -->
            <?php if (isset($component)) { $__componentOriginal865bd15ac9a1579178aa5f49b106d124 = $component; } ?>
<?php $component = App\View\Components\AdminNewUserWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-new-user-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminNewUserWidget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal865bd15ac9a1579178aa5f49b106d124)): ?>
<?php $component = $__componentOriginal865bd15ac9a1579178aa5f49b106d124; ?>
<?php unset($__componentOriginal865bd15ac9a1579178aa5f49b106d124); ?>
<?php endif; ?>
            <!-- ./col -->
            <?php if (isset($component)) { $__componentOriginala0b409cbdec0d5931fe5ed1316b239f5 = $component; } ?>
<?php $component = App\View\Components\AdminLogWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-log-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLogWidget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0b409cbdec0d5931fe5ed1316b239f5)): ?>
<?php $component = $__componentOriginala0b409cbdec0d5931fe5ed1316b239f5; ?>
<?php unset($__componentOriginala0b409cbdec0d5931fe5ed1316b239f5); ?>
<?php endif; ?>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/index.blade.php ENDPATH**/ ?>