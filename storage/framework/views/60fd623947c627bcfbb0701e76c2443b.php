<div class="top-header">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <!-- Breaking News Area -->
            <div class="col-12 col-md-6">
                <div class="breaking-news-area">
                    <h5 class="breaking-news-title"><?php echo app('translator')->get('main.breaking_news'); ?></h5>
                    <div id="breakingNewsTicker" class="ticker">
                        <ul>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('newspost', [$post->category, $post])); ?>"><?php echo e($post->title); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- Stock News Area -->
            <div class="col-12 col-md-6">
                <div class="stock-news-area">
                    <div id="stockNewsTicker" class="ticker">
                        <ul>
                            <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stockLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <?php $__currentLoopData = $stockLine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stockItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span><?php echo e($stockItem->title); ?></span>
                                                <span><?php echo e($stockItem->value); ?></span>
                                            </div>
                                            <?php if(isset($stockItem->trend)): ?>
                                                <div class="stock-index <?php echo e($stockItem->trend); ?>-index">
                                                    <h4><?php echo e($stockItem->trend_diff); ?></h4>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/top-header.blade.php ENDPATH**/ ?>