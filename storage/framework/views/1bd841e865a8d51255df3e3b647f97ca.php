
<section class="welcome-blog-post-slide owl-carousel">
    <!-- Single Blog Post -->
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php /** @var \App\Models\Post $post */  ?>
        <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url(<?php echo e(Storage::url('images/' . $post->image)); ?>);">
            <!-- Single Blog Post Content -->
            <div class="single-blog-post-content">
                <div class="tags">
                    <a href="<?php echo e(route('category', $post->category)); ?>"><?php echo e($post->category->name); ?></a>
                </div>
                <h3><a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt"><?php echo e($post->title); ?></a></h3>
                <div class="date">
                    <a href="javascript:void(0)"><?php echo e($post->middleFormatDate); ?></a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>

<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/index-main-slider.blade.php ENDPATH**/ ?>