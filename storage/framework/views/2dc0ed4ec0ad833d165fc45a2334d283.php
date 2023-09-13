<?php /** @var \App\Models\Post $post */  ?>

<div class="gazette-single-catagory-post">
    <h5><a href="<?php echo e(route('newspost', [$post->category, $post])); ?>" class="font-pt"><?php echo e($post->title); ?></a></h5>
    <span><?php echo e($post->fullShortTimeFormat); ?></span>
</div>



<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/news-card/inline.blade.php ENDPATH**/ ?>