<?php $__env->startSection('title', __('admin.category') . ' ' . $category->name); ?>

<?php $__env->startSection('content'); ?>

<?php /** @var \App\Models\Category $category */  ?>

<!-- Breadcumb Area Start -->
<div class="breadcumb-area section_padding_50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breacumb-content d-flex align-items-center justify-content-between">
                    <!-- Post Tag -->
                    <div class="gazette-post-tag">
                        <a href="javascript:void();"><?php echo e($category->name); ?></a>
                    </div>
                    <p class="editorial-post-date text-dark mb-0"><?php echo e(Helper::getCurrentDate()); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area End -->

<!-- Editorial Area Start -->
<?php if (isset($component)) { $__componentOriginal2d8a274d3b26a6ef0d3637e804d9bd49 = $component; } ?>
<?php $component = App\View\Components\PopularNewsCarousel::resolve(['categoryId' => $category->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popular-news-carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PopularNewsCarousel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d8a274d3b26a6ef0d3637e804d9bd49)): ?>
<?php $component = $__componentOriginal2d8a274d3b26a6ef0d3637e804d9bd49; ?>
<?php unset($__componentOriginal2d8a274d3b26a6ef0d3637e804d9bd49); ?>
<?php endif; ?>
<!-- Editorial Area End -->

<section class="catagory-welcome-post-area section_padding_100">
    <div class="container">
        <?php if (isset($component)) { $__componentOriginala35367f3468773e645029c2d589b934d = $component; } ?>
<?php $component = App\View\Components\PopularCategoryPosts::resolve(['categoryId' => $category->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popular-category-posts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PopularCategoryPosts::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala35367f3468773e645029c2d589b934d)): ?>
<?php $component = $__componentOriginala35367f3468773e645029c2d589b934d; ?>
<?php unset($__componentOriginala35367f3468773e645029c2d589b934d); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal5e973fc8c5f4353787a83d10c0f04c74 = $component; } ?>
<?php $component = App\View\Components\NewsListPaginate::resolve(['perPage' => 25,'category' => $category->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news-list-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NewsListPaginate::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e973fc8c5f4353787a83d10c0f04c74)): ?>
<?php $component = $__componentOriginal5e973fc8c5f4353787a83d10c0f04c74; ?>
<?php unset($__componentOriginal5e973fc8c5f4353787a83d10c0f04c74); ?>
<?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/category.blade.php ENDPATH**/ ?>