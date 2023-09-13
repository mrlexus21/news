<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Title  -->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/public/app.css')); ?>">
</head>

<body class="<?php echo $__env->yieldContent('body_class'); ?>">
<!-- Header Area Start -->
<header class="header-area">
    <?php if (isset($component)) { $__componentOriginalf78b4ff5594ea941c02dd717b48b3eab = $component; } ?>
<?php $component = App\View\Components\TopHeader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('top-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TopHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78b4ff5594ea941c02dd717b48b3eab)): ?>
<?php $component = $__componentOriginalf78b4ff5594ea941c02dd717b48b3eab; ?>
<?php unset($__componentOriginalf78b4ff5594ea941c02dd717b48b3eab); ?>
<?php endif; ?>
    <!-- Middle Header Area -->
    <div class="middle-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Logo Area -->
                <div class="col-12 col-md-4">
                    <div class="logo-area">
                        <a href="<?php echo e(route('home')); ?>"><img src="/img/logo.png" alt="logo"></a>
                    </div>
                </div>
                <!-- Header Advert Area -->
                <div class="col-12 col-md-8">
                    <?php if (isset($component)) { $__componentOriginalddf97c7964298946a0665c3b02b0427a = $component; } ?>
<?php $component = App\View\Components\AdHeader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('ad-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalddf97c7964298946a0665c3b02b0427a)): ?>
<?php $component = $__componentOriginalddf97c7964298946a0665c3b02b0427a; ?>
<?php unset($__componentOriginalddf97c7964298946a0665c3b02b0427a); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($categories)): ?>
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item <?php echo Route::currentRouteNamed('home') ? 'active' : '' ?>">
                                            <a class="nav-link" href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('main.today'); ?></a>
                                        </li>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item <?php echo e(Helper::classActiveSegment(2, $category->slug)); ?>">
                                                <a class="nav-link" href="<?php echo e(route('category', $category)); ?>"><?php echo e($category->name); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form mr-auto">
                                        <form action="#">
                                            <input type="search" placeholder="<?php echo app('translator')->get('main.search_placeholder'); ?>" id="search" name="search">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div id="userhbtn">
                                        <a href="<?php echo e(route($personalRoute)); ?>">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>
<!-- Header Area End -->
<?php echo $__env->yieldContent('personal_layout_head'); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->yieldContent('personal_layout_footer'); ?>
<!-- Footer Area Start -->
<footer class="footer-area bg-img background-overlay">
    <?php if(isset($categories)): ?>
        <!-- Top Footer Area -->
        <div class="top-footer-area section_padding_100_70">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="single-footer-widget">
                                <div class="footer-widget-title">
                                    <a class="nav-link" href="<?php echo e(route('category', $category)); ?>">
                                        <h4 class="font-pt"><?php echo e($category->name); ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Single Footer Widget -->
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy;<script>document.write(new Date().getFullYear());</script> <?php echo app('translator')->get('main.all_rights_received'); ?> | <?php echo app('translator')->get('main.template_made_with_by'); ?> <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<script src="<?php echo e(asset('/js/public/app.js')); ?>"></script>

</body>

</html>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/layouts/master.blade.php ENDPATH**/ ?>