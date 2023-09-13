<?php $__env->startSection('title', 'Главная'); ?>

<?php $__env->startSection('content'); ?>

<!-- Welcome Blog Slide Area Start -->
<?php if (isset($component)) { $__componentOriginale346f3ef0517030e393512e1294a925f = $component; } ?>
<?php $component = App\View\Components\IndexMainSlider::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('index-main-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\IndexMainSlider::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale346f3ef0517030e393512e1294a925f)): ?>
<?php $component = $__componentOriginale346f3ef0517030e393512e1294a925f; ?>
<?php unset($__componentOriginale346f3ef0517030e393512e1294a925f); ?>
<?php endif; ?>
<!-- Welcome Blog Slide Area End -->

<!-- Latest News Marquee Area Start -->
<?php if (isset($component)) { $__componentOriginal9569dfd3facd8660302afd0f3bf3cb28 = $component; } ?>
<?php $component = App\View\Components\LatestNewsRibbon::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('latest-news-ribbon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LatestNewsRibbon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9569dfd3facd8660302afd0f3bf3cb28)): ?>
<?php $component = $__componentOriginal9569dfd3facd8660302afd0f3bf3cb28; ?>
<?php unset($__componentOriginal9569dfd3facd8660302afd0f3bf3cb28); ?>
<?php endif; ?>
<!-- Latest News Marquee Area End -->

<!-- Main Content Area Start -->
<section class="main-content-wrapper section_padding_100">

    <div class="container">
        <div class="row">

            <?php if (isset($component)) { $__componentOriginal4dc3984336c5fdbf35b71dfc625159d8 = $component; } ?>
<?php $component = App\View\Components\PopularNewsIndex::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popular-news-index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PopularNewsIndex::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4dc3984336c5fdbf35b71dfc625159d8)): ?>
<?php $component = $__componentOriginal4dc3984336c5fdbf35b71dfc625159d8; ?>
<?php unset($__componentOriginal4dc3984336c5fdbf35b71dfc625159d8); ?>
<?php endif; ?>

            <div class="col-12 col-lg-3 col-md-6">
                <div class="sidebar-area">

                    <?php if (isset($component)) { $__componentOriginale2590abae30bff34eaed221f0a53d098 = $component; } ?>
<?php $component = App\View\Components\NewsWidget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('news-widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NewsWidget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2590abae30bff34eaed221f0a53d098)): ?>
<?php $component = $__componentOriginale2590abae30bff34eaed221f0a53d098; ?>
<?php unset($__componentOriginale2590abae30bff34eaed221f0a53d098); ?>
<?php endif; ?>

                    <!-- Advert Widget -->
                    <?php if (isset($component)) { $__componentOriginala57cfd65bd5a3d568f489543dde6a485 = $component; } ?>
<?php $component = App\View\Components\AdSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('ad-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala57cfd65bd5a3d568f489543dde6a485)): ?>
<?php $component = $__componentOriginala57cfd65bd5a3d568f489543dde6a485; ?>
<?php unset($__componentOriginala57cfd65bd5a3d568f489543dde6a485); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Area End -->

    <!-- Catagory Posts Area Start -->
    <?php if (isset($component)) { $__componentOriginal5e973fc8c5f4353787a83d10c0f04c74 = $component; } ?>
<?php $component = App\View\Components\NewsListPaginate::resolve(['perPage' => 25] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    <!-- Catagory Posts Area End -->
</section>

<?php if (isset($component)) { $__componentOriginal2d8a274d3b26a6ef0d3637e804d9bd49 = $component; } ?>
<?php $component = App\View\Components\PopularNewsCarousel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/index.blade.php ENDPATH**/ ?>