<?php if(isset($adSidebar)): ?>
    <div class="advert-widget">
        <div class="widget-title">
            <h5><?php echo app('translator')->get('main.advert'); ?></h5>
        </div>
        <div class="advert-thumb mb-30">
            <a href="<?php echo e($adSidebar->link); ?>">
                <img src="<?php echo e(Storage::url($adSidebar->image)); ?>" alt="<?php echo e($adSidebar->name); ?>">
            </a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/ad-sidebar.blade.php ENDPATH**/ ?>