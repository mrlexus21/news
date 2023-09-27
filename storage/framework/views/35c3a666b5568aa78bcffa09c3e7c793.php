<?php /** @var \App\Models\Post $post */  ?>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-dont-miss-post d-flex mb-30">
        <?php if($post->getImageSrc() !== null): ?>
            <div class="dont-miss-post-thumb">
                <img src="<?php echo e($post->getImageSrc()); ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="dont-miss-post-content">
            <a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt"><?php echo e($post->title); ?></a>
            <span><?php echo e($post->middleShortMonthFormatDate); ?></span>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/sidebar-inline.blade.php ENDPATH**/ ?>