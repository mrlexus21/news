<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php $__empty_1 = true; $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keySectionName => $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if(!empty($menuItem)): ?>
                <li class="nav-header"><?php echo e(__($keySectionName)); ?></li>
            <?php endif; ?>
            <?php $__empty_2 = true; $__currentLoopData = $menuItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemLv1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <li class="nav-item <?php echo e($menuItemLv1['active'] ? 'menu-open' : ''); ?>">
                    <a href="<?php echo e($menuItemLv1['link']); ?>" class="nav-link <?php echo e($menuItemLv1['active'] ? 'active' : ''); ?>">
                        <i class="nav-icon <?php echo e($menuItemLv1['icon']); ?>"></i>
                        <p>
                            <?php echo e($menuItemLv1['text']); ?>

                            <?php if($menuItemLv1['angle_left']): ?>
                                <i class="right fas fa-angle-left"></i>
                            <?php endif; ?>
                        </p>
                    </a>
                    <?php if(isset($menuItemLv1['child'])): ?>
                        <ul class="nav nav-treeview">
                            <?php $__empty_3 = true; $__currentLoopData = $menuItemLv1['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItemLv2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                                <li class="nav-item">
                                    <a
                                        href="<?php echo e($menuItemLv2['link']); ?>"
                                        class="nav-link <?php echo e($menuItemLv2['active'] ? 'active' : ''); ?>">
                                        <i class="<?php echo e($menuItemLv2['icon']); ?> nav-icon"></i>
                                        <p><?php echo e($menuItemLv2['text']); ?></p>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/components/admin-menu.blade.php ENDPATH**/ ?>