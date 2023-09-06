<?php $__env->startSection('title', __('admin.users')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <!-- Default box -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\User::class)): ?>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <a class="btn btn-primary" id="add_record" href="<?php echo e(route('admin.users.create')); ?>"><?php echo app('translator')->get('admin.add_record'); ?></a>
        </nav>
    <?php endif; ?>

    <div class="card card-info">
        <form action="<?php echo e(route('admin.users.index')); ?>" method="get" class="form-horizontal" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="role"><?php echo app('translator')->get('admin.role'); ?></label>
                            <select class="form-control custom-select" name="role" id="role">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php if(request()->query('role') == $role->id): ?> selected <?php endif; ?>>
                                        <?php echo e($role->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('admin.name'); ?></label>
                            <input type="text" class="form-control" value="<?php echo e(request()->name); ?>" name="name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?php echo e(request()->email); ?>" name="email">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><?php echo app('translator')->get('admin.apply'); ?></button>
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-warning float-right mr-2"><?php echo app('translator')->get('admin.reset'); ?></a>
            </div>

        </form>
    </div>
<?php if($users->isEmpty()): ?>
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
                        Email
                    </th>
                    <th style="width: 20%">
                        <?php echo app('translator')->get('admin.created_at'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.updated_at'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.role'); ?>
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php /** @var \App\Models\Post $user */  ?>
                    <tr>
                        <td>
                            <?php echo e($user->id); ?>

                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?>
                                <a href="<?php echo e(route('admin.users.show', $user)); ?>">
                                    <?php echo e($user->name); ?>

                                </a>
                            <?php else: ?>
                                <?php echo e($user->name); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($user->email); ?>

                        </td>
                        <td>
                            <?php echo e($user->created_at); ?>

                        </td>
                        <td>
                            <?php if(isset($user->updated_at)): ?>
                                <?php echo e($user->updated_at); ?>

                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($user->role->name); ?>

                        </td>
                        <td class="project-actions text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.users.edit', $user)); ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    <?php echo app('translator')->get('admin.edit'); ?>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="mt-2">
            <?php echo e($users->withQueryString()->links()); ?>

        </div>
    </div>
        <!-- /.card-body -->
    </div>
    <?php endif; ?>

    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/users/index.blade.php ENDPATH**/ ?>