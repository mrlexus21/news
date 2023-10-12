<?php /** @var \App\Models\Post $post */  ?>
<?php if(isset($post->user)): ?>
    <div class="row article-author">
        <?php if(isset($post->user->image)): ?>
            <div class="col-md-1">
                <div class="comment-author">
                    <img src="<?php echo e(Storage::url('userimages/' . $post->user->image)); ?>" alt="">
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-5 ml-4">
            <h5><?php echo e($post->user->name); ?></h5>
            <?php if(auth()->guard()->check()): ?>
                <?php if($isSubscribed): ?>
                    <button type="button" class="btn btn-primary float-left" disabled><?php echo app('translator')->get('main.subscribed'); ?></button>
                <?php else: ?>
                    <button type="button" id="subscribe_btn" data-post-id="<?php echo e($post->id); ?>" class="btn btn-primary float-left"><?php echo app('translator')->get('main.to_subscribe'); ?></button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/subscribe-button.blade.php ENDPATH**/ ?>