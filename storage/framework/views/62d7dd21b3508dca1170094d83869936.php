<?php /** @var \App\Models\Post $post */  ?>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Single Today Post -->
    <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
        <div class="todays-post-thumb">
            <img src="<?php echo e(Storage::url('images/' . $post->image)); ?>" alt="">
        </div>
        <div class="todays-post-content">
            <!-- Post Tag -->
            <div class="gazette-post-tag">
                <a href="<?php echo e(route('category', $post->category)); ?>"><?php echo e($post->category->name); ?></a>
            </div>
            <h3><a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt mb-2"><?php echo e($post->title); ?></a></h3>
            <span class="gazette-post-date mb-2"><?php echo e($post->middleFormatDate); ?></span>
            
            <p><?php echo e($post->excerpt); ?></p>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/medium.blade.php ENDPATH**/ ?>