<?php $__env->startSection('title', __('main.personal_area')); ?>
<?php $__env->startSection('h1', __('main.my_tape')); ?>
<?php $__env->startSection('personal_layout_head',view('partials.blocks.personal_layout_head')); ?>
<?php $__env->startSection('personal_layout_footer',view('partials.blocks.personal_layout_footer')); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginale8bc193f99817f8ddd5921693dad9248 = $component; } ?>
<?php $component = App\View\Components\SubscribeNewsList::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('subscribe-news-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SubscribeNewsList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8bc193f99817f8ddd5921693dad9248)): ?>
<?php $component = $__componentOriginale8bc193f99817f8ddd5921693dad9248; ?>
<?php unset($__componentOriginale8bc193f99817f8ddd5921693dad9248); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/personal/index.blade.php ENDPATH**/ ?>