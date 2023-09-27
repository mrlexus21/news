<?php /** @var \App\Models\Post $mainPost */  ?>
<!-- Gazette Welcome Post -->
<div class="gazette-welcome-post">
    <!-- Post Tag -->
    <div class="gazette-post-tag">
        <a href="<?php echo e(route('category', $mainPost->category)); ?>"><?php echo e($mainPost->category->name); ?></a>
    </div>
    <h2 class="font-pt"><?php echo e($mainPost->title); ?></h2>
    <p class="gazette-post-date"><?php echo e($mainPost->middleFormatDate); ?></p>
    <!-- Post Thumbnail -->
    <div class="blog-post-thumbnail my-5">
        <img src="<?php echo e($mainPost->getImageSrc()); ?>" alt="post-thumb">
    </div>
    <!-- Post Excerpt -->
    <p><?php echo $mainPost->excerpt; ?></p>
    <!-- Reading More -->
    <div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
        <div class="post-continue-btn">
            <a href="<?php echo e(route('newspost', [$mainPost->category, $mainPost])); ?>" class="font-pt"><?php echo app('translator')->get('main.continue_reading'); ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </div>
    </div>
</div>


<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/index.blade.php ENDPATH**/ ?>