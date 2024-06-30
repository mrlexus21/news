<div class="row">
    <div class="col-md-12 ml-3">
        <?php $__empty_1 = true; $__currentLoopData = $listAuthors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                <?php if(isset($author->image)): ?>
                    <div class="todays-post-thumb">
                        <img src="<?php echo e(Storage::url('userimages/' . $author->image)); ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="todays-post-content">
                    <!-- Post Tag -->
                    <h3><span class="font-pt mb-2"><?php echo e($author->name); ?></span></h3>
                    <span class="gazette-post-date mb-2"><?php echo app('translator')->get('main.subscribe_date'); ?> <?php echo e(getMiddleFormatDateAttribute($author->created_at)); ?></span>
                    <button type="button" id="unsubscribe_btn" data-author-id="<?php echo e($author->author_id); ?>" class="btn btn-warning float-left"><?php echo app('translator')->get('main.unsubscribe'); ?></button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <span><?php echo app('translator')->get('admin.empty_list_authors'); ?></span>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/user-subscribe-list.blade.php ENDPATH**/ ?>