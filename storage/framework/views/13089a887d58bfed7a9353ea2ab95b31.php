<div class="container">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar sidebar-personal">
            <div class="position-sticky pt-3 pb-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo Route::currentRouteNamed('personal.index') ? 'active' : '' ?>" aria-current="page" href="<?php echo e(route('personal.index')); ?>">
                            <?php echo app('translator')->get('main.personal_area'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo Route::currentRouteNamed('personal.authors') ? 'active' : '' ?>" aria-current="page" href="<?php echo e(route('personal.authors')); ?>">
                            <?php echo app('translator')->get('main.subscribe_authors'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo e(route('logout')); ?>">
                            <?php echo app('translator')->get('admin.logout'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row pt-3 pb-5 mb-3 border-bottom">

                <h1 class="h2 mb-5 h2-personal ml-3"><?php echo $__env->yieldContent('h1'); ?></h1><br>
                <div class="btn-toolbar mb-2 pb-5">
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/partials/blocks/personal_layout_head.blade.php ENDPATH**/ ?>