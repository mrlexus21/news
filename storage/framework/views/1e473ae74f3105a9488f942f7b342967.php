<div class="header-advert-area">
    <?php if(isset($adHeader)): ?>
        <a href="<?php echo e($adHeader->link); ?>">
            <img src="<?php echo e(Storage::url($adHeader->image)); ?>" alt="<?php echo e($adHeader->name); ?>">
        </a>
    <?php endif; ?>
</div>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/ad-header.blade.php ENDPATH**/ ?>