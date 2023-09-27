<?php /** @var \App\Models\Post $post */  ?>
<div class="editorial-post-single-slide">
    <div class="row">
        <div class="col-12 col-md-5">
            <?php if($post->getImageSrc() !== null): ?>
                <div class="editorial-post-thumb">
                    <img src="<?php echo e($post->getImageSrc()); ?>" alt="">
                </div>
           <?php endif; ?>
        </div>
        <div class="col-12 col-md-7">
            <div class="editorial-post-content">
                <!-- Post Tag -->
                <div class="gazette-post-tag">
                    <a href="<?php echo e(route('category', $post->category)); ?>"><?php echo e($post->category->name); ?></a>
                </div>
                <h2><a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt mb-15"><?php echo e($post->title); ?></a></h2>
                <p class="editorial-post-date mb-15"><?php echo e($post->middleFormatDate); ?></p>
                <p><?php echo $post->excerpt; ?></p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/owl-carousel-black.blade.php ENDPATH**/ ?>