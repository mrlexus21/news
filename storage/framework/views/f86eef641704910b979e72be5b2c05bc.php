<?php $__env->startSection('title', __('admin.ads')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <!-- Default box -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Ad::class)): ?>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <a class="btn btn-primary" id="add_record" href="<?php echo e(route('admin.ads.create')); ?>"><?php echo app('translator')->get('admin.add_record'); ?></a>
        </nav>
    <?php endif; ?>

    <div class="card card-info">
        <form action="<?php echo e(route('admin.ads.index')); ?>" method="get" class="form-horizontal" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="type"><?php echo app('translator')->get('admin.type'); ?></label>
                            <select class="form-control custom-select" name="type" id="type">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>" <?php if(request()->query('type') === $type): ?> selected <?php endif; ?>>
                                        <?php echo e($type); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="sort"><?php echo app('translator')->get('admin.sort'); ?></label>
                            <select class="form-control custom-select" name="sort" id="sort">
                                <option value=""><?php echo app('translator')->get('admin.default'); ?></option>
                                <option value="new" <?php if(request()->query('sort') === 'new'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.first_new'); ?></option>
                                <option value="old" <?php if(request()->query('sort') === 'old'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.first_old'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="activity"><?php echo app('translator')->get('admin.activity'); ?></label>
                            <select class="form-control custom-select" name="activity" id="activity">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <option value="active" <?php if(request()->query('activity') === 'active'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.active'); ?></option>
                                <option value="noactive" <?php if(request()->query('activity') === 'noactive'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.noactive'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><?php echo app('translator')->get('admin.apply'); ?></button>
                <a href="<?php echo e(route('admin.ads.index')); ?>" class="btn btn-warning float-right mr-2"><?php echo app('translator')->get('admin.reset'); ?></a>
            </div>

        </form>
    </div>
<?php if($ads->isEmpty()): ?>
    <div class="card card-info">
        <div class="row">
            <h2><?php echo app('translator')->get('admin.empty_list'); ?></h2>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th style="width: 1%">
                    ID
                </th>
                <th style="width: 20%">
                    <?php echo app('translator')->get('admin.name'); ?>
                </th>
                <th style="width: 10%">
                    <?php echo app('translator')->get('admin.type'); ?>
                </th>
                <th style="width: 10%">
                    <?php echo app('translator')->get('admin.image'); ?>
                </th>
                <th style="width: 20%">
                    <?php echo app('translator')->get('admin.show_start_date'); ?>
                </th>
                <th style="width: 20%">
                    <?php echo app('translator')->get('admin.show_end_date'); ?>
                </th>
                <th style="width: 10%">
                    <?php echo app('translator')->get('admin.status'); ?>
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php /** @var \App\Models\Ad $ad */  ?>
                <tr>
                    <td>
                        <?php echo e($ad->id); ?>

                    </td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $ad)): ?>
                            <a href="<?php echo e(route('admin.ads.show', $ad)); ?>">
                                <?php echo e($ad->name); ?>

                            </a>
                        <?php else: ?>
                            <?php echo e($ad->name); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($ad->type); ?>

                    </td>
                    <td>
                        <?php if(isset($ad->image)): ?>
                            <img width="50px" height="auto" src="<?php echo e(Storage::url(config('filesystems.local_paths.news_images') . $ad->image)); ?>" alt="">
                        <?php else: ?>
                            <?php echo __('admin.label_not_uploaded'); ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($ad->showdate_start); ?>

                    </td>
                    <td>
                        <?php echo e($ad->showdate_end); ?>

                    </td>
                    <td>
                        <?php if($ad->isActive()): ?>
                            <span class="badge bg-success"><?php echo e(__('admin.active')); ?></span>
                        <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e(__('admin.noactive')); ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="project-actions text-right">
                        <div class="d-flex flex-row justify-content-md-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ad)): ?>
                                <a class="btn btn-info btn-sm ml-2" href="<?php echo e(route('admin.ads.edit', $ad)); ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                    
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $ad)): ?>
                                <form action="<?php echo e(route('admin.ads.destroy', $ad)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <a class="btn btn-danger btn-sm ml-2" href="#" onclick="this.closest('form').submit()">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    
                                </form>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="mt-2">
            <?php echo e($ads->withQueryString()->links()); ?>

        </div>
    </div>
        <!-- /.card-body -->
    </div>
    <?php endif; ?>

    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/ads/index.blade.php ENDPATH**/ ?>