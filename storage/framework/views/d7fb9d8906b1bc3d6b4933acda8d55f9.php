<?php $__env->startSection('title', $post->title . __('admin.news')); ?>
<?php /** @var \App\Models\Post $post */  ?>

<?php $__env->startSection('content'); ?>

    <section class="single-post-area">
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay" style="background-image: url(<?php echo e($post->getImageSrc()); ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="<?php echo e(route('category', $post->category)); ?>"><?php echo e($post->category->name); ?></a>
                            </div>
                            <h2 class="font-pt"><?php echo e($post->title); ?></h2>
                            <p><?php echo e($post->middleFormatDate); ?></p>

                            <?php if (isset($component)) { $__componentOriginal9d9098c91eb2c1d449349c43730712df = $component; } ?>
<?php $component = App\View\Components\SubscribeButton::resolve(['post' => $post] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('subscribe-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SubscribeButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d9098c91eb2c1d449349c43730712df)): ?>
<?php $component = $__componentOriginal9d9098c91eb2c1d449349c43730712df; ?>
<?php unset($__componentOriginal9d9098c91eb2c1d449349c43730712df); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 single-post-text">
                        <?php echo e($post->getContent()); ?>

                    </div>
                </div>
                <?php if($post->isExternal()): ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="breacumb-content d-flex align-items-center justify-content-between align-left">
                                <p class="editorial-post-date text-dark my-3">
                                    <a href="<?php echo e($post->source_link); ?>"><?php echo app('translator')->get('admin.source'); ?> <?php echo e($post->source_name); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/newspost.blade.php ENDPATH**/ ?>