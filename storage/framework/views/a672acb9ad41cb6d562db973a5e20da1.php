<?php $__env->startSection('title', __('main.subscribe_authors')); ?>
<?php $__env->startSection('h1', __('main.subscribe_authors')); ?>
<?php $__env->startSection('personal_layout_head',view('partials.blocks.personal_layout_head')); ?>
<?php $__env->startSection('personal_layout_footer',view('partials.blocks.personal_layout_footer')); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginale8714c3ea5683a29f34758260d960994 = $component; } ?>
<?php $component = App\View\Components\UserSubscribeList::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-subscribe-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserSubscribeList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8714c3ea5683a29f34758260d960994)): ?>
<?php $component = $__componentOriginale8714c3ea5683a29f34758260d960994; ?>
<?php unset($__componentOriginale8714c3ea5683a29f34758260d960994); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/personal/subscribes.blade.php ENDPATH**/ ?>