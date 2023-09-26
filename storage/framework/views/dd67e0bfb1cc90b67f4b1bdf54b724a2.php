<?php $__env->startSection('title', __('admin.logs')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $log->id)); ?>

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
                            <?php /** @var \App\Models\Log $log */  ?>
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
                                    <td><?php echo e($log->id); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.importance'); ?></td>
                                    <td><?php echo __('admin.imp_label_' . $log->level_name); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.message'); ?></td>
                                    <td><?php echo e($log->message); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-muted">
                        <p class="text-sm"><?php echo app('translator')->get('admin.created_at'); ?>
                            <b class="d-block"><?php echo e($log->created_at); ?></b>
                        </p>
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <form action="<?php echo e(route('admin.logs.destroy', $log->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input class="btn btn-danger btn-sm" type="submit" value="<?php echo app('translator')->get('admin.delete'); ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/logs/show.blade.php ENDPATH**/ ?>