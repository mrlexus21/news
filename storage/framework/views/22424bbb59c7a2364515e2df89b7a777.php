<?php /** @var \App\Models\Post $post */  ?>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="single-breaking-news-widget">
        <?php if($post->getImageSrc() !== null): ?>
            <img src="<?php echo e($post->getImageSrc()); ?>" alt="">
        <?php endif; ?>
        <div class="breakingnews-title">
            <p><?php echo e($post->category->name); ?></p>
        </div>
        <div class="breaking-news-heading gradient-background-overlay">
            <h5 class="font-pt"><?php echo e($post->title); ?></h5>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/sidebar-small.blade.php ENDPATH**/ ?>