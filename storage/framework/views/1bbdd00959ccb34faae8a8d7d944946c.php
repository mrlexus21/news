<?php $__env->startSection('title', __('admin.user_detail')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $user)); ?>

<?php $__env->startSection('content'); ?>

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo app('translator')->get('admin.element_detail'); ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12">
                            <h4><?php echo app('translator')->get('admin.main_data'); ?></h4>
                            <?php /** @var \App\Models\User $user */  ?>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        <?php echo app('translator')->get('admin.field'); ?>
                                    </th>
                                    <th>
                                        <?php echo app('translator')->get('admin.value'); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>ID</td>
                                    <td><?php echo e($user->id); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.name'); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.role'); ?></td>
                                    <td><?php echo e($user->role->name); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.image'); ?></td>
                                    <td>
                                        <?php if(isset($user->image)): ?>
                                            <img width="250px" src="<?php echo e(Storage::url('userimages/' . $user->image)); ?>" alt="">
                                        <?php else: ?>
                                            <?php echo __('admin.label_not_uploaded'); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-muted">
                        <p class="text-sm"><?php echo app('translator')->get('admin.created_at'); ?>
                            <b class="d-block"><?php echo e($user->created_at); ?></b>
                        </p>
                        <p class="text-sm"><?php echo app('translator')->get('admin.updated_at'); ?>
                            <b class="d-block">
                            <?php if(isset($user->updated_at)): ?>
                                    <?php echo e($user->updated_at); ?>

                                <?php else: ?>
                                    -
                            <?php endif; ?>
                            </b>
                        </p>
                        <p class="text-sm">Email <?php echo app('translator')->get('admin.verified_at'); ?>
                            <b class="d-block">
                            <?php if(isset($user->email_verified_at)): ?>
                                    <?php echo e($user->email_verified_at); ?>

                                <?php else: ?>
                                    -
                            <?php endif; ?>
                            </b>
                        </p>
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                            <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.users.edit', $user)); ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                <?php echo app('translator')->get('admin.edit'); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $user)): ?>
                            <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input class="btn btn-danger btn-sm" id="delete" type="submit" value="<?php echo app('translator')->get('admin.delete'); ?>">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/users/show.blade.php ENDPATH**/ ?>