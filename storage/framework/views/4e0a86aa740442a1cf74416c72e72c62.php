<div class="row">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-<?php echo e($loop->iteration > 3 ? 6 : 4); ?>">
            <!-- Gazette Welcome Post -->
            <div class="gazette-welcome-post">
                <!-- Post Tag -->
                <div class="gazette-post-tag">
                    <a href="<?php echo e(route('category', $post->category)); ?>"><?php echo e($post->category->name); ?></a>
                </div>
                <h2 class="font-pt"><?php echo e($post->title); ?></h2>
                <p class="gazette-post-date"><?php echo e($post->middleFormatDate); ?></p>
                <!-- Post Thumbnail -->
                <div class="blog-post-thumbnail my-5">
                    <img src="<?php echo e(Storage::url('images/' . $post->image)); ?>" alt="post-thumb">
                </div>
                <!-- Post Excerpt -->
                <p><?php echo e($post->excerpt); ?></p>
                <!-- Reading More -->
                <div class="post-continue-reading-share mt-30">
                    <div class="post-continue-btn">
                        <a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt"><?php echo app('translator')->get('main.continue_reading'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/popular-category-posts.blade.php ENDPATH**/ ?>