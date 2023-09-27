<?php $__env->startSection('title', __('admin.news')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <!-- Default box -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Post::class)): ?>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <a class="btn btn-primary" href="<?php echo e(route('admin.posts.create')); ?>"><?php echo app('translator')->get('admin.add_record'); ?></a>
        </nav>
    <?php endif; ?>

    <div class="card card-info">
        <form action="<?php echo e(route('admin.posts.index')); ?>" method="get" class="form-horizontal" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="status"><?php echo app('translator')->get('admin.type'); ?></label>
                            <select class="form-control custom-select" name="status" id="status">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <option value="publicated" <?php if(request()->query('status') === 'publicated'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.published'); ?></option>
                                <option value="draft" <?php if(request()->query('status') === 'draft'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.draft'); ?></option>
                                <option value="deleted" <?php if(request()->query('status') === 'deleted'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.deleted'); ?></option>
                                <option value="external" <?php if(request()->query('status') === 'external'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.is_external'); ?></option>
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
                                <option value="updated_new" <?php if(request()->query('sort') === 'updated_new'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.first_new_updates'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><?php echo app('translator')->get('admin.apply'); ?></button>
                <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-warning float-right mr-2"><?php echo app('translator')->get('admin.reset'); ?></a>
            </div>

        </form>
    </div>
    <?php if($posts->total() < 1): ?>
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
                    <th style="width: 50%">
                        <?php echo app('translator')->get('admin.name'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.image'); ?>
                    </th>
                    <th style="width: 20%">
                        <?php echo app('translator')->get('admin.published_at'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.updated_at'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.status'); ?>
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php /** @var \App\Models\Post $post */  ?>
                    <tr>
                        <td>
                            <?php echo e($post->id); ?>

                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $post)): ?>
                                <a href="<?php echo e(route('admin.posts.show', $post)); ?>">
                                    <?php echo e($post->title); ?>

                                </a>
                            <?php else: ?>
                                <?php echo e($post->title); ?>

                            <?php endif; ?>
                            <br>
                            <small>
                                <?php echo app('translator')->get('admin.created_at'); ?> <?php echo e($post->created_at); ?>

                            </small>
                        </td>
                        <td>
                            <img height="50px" src="<?php echo e(Storage::url('images/' .$post->image)); ?>" alt="">
                        </td>
                        <td>
                            <?php if(isset($post->published_at)): ?>
                                <?php echo e($post->published_at); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(isset($post->updated_at)): ?>
                                <?php echo e($post->updated_at); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                        <span class="badge badge-<?php echo e($post->getStatusAttribute(true)->class); ?>">
                            <?php echo e(__('admin.' . $post->getStatusAttribute(true)->value)); ?>

                        </span>
                        </td>
                        <td class="project-actions text-right">
                            <div class="d-flex flex-row justify-content-md-center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                    <a class="btn btn-info btn-sm ml-2" href="<?php echo e(route('admin.posts.edit', $post)); ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                                    <form action="<?php echo e(route('admin.posts.destroy', $post)); ?>" method="POST">
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
                <?php echo e($posts->withQueryString()->links()); ?>

            </div>
        </div>
            <!-- /.card-body -->
        </div>
    <?php endif; ?>
    <!-- /.card -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/newsposts/index.blade.php ENDPATH**/ ?>