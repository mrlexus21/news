<?php $__env->startSection('title', __('admin.logs')); ?>


<?php $__env->startSection('content'); ?>

<section class="content">
    <div class="card card-info">
        <form action="<?php echo e(route('admin.logs.index')); ?>" method="get" class="form-horizontal" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                            <label for="type"><?php echo app('translator')->get('admin.type'); ?></label>
                            <select class="form-control custom-select" name="type" id="type">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <option value="CRITICAL" <?php if(request()->query('type') === 'CRITICAL'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.important'); ?></option>
                                <option value="WARNING" <?php if(request()->query('type') === 'WARNING'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.warning'); ?></option>
                                <option value="INFO" <?php if(request()->query('type') === 'INFO'): ?> selected <?php endif; ?>><?php echo app('translator')->get('admin.informational'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><?php echo app('translator')->get('admin.apply'); ?></button>
                <a href="<?php echo e(route('admin.logs.index')); ?>" class="btn btn-warning float-right mr-2"><?php echo app('translator')->get('admin.reset'); ?></a>
            </div>

        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo app('translator')->get('admin.logs'); ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 5%">
                        <?php echo app('translator')->get('admin.importance'); ?>
                    </th>
                    <th style="width: 50%">
                        <?php echo app('translator')->get('admin.message'); ?>
                    </th>
                    <th style="width: 20%">
                        <?php echo app('translator')->get('admin.created_at'); ?>
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($log->id); ?>

                        </td>
                        <td>
                            <?php echo __('admin.imp_label_' . $log->level_name); ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.logs.show', $log)); ?>">
                                <?php echo e(Str::limit($log->message, 120)); ?>

                            </a>
                        </td>
                        <td>
                            <?php echo e($log->datetime); ?>

                        </td>
                        <td class="project-actions text-right">
                            <form action="<?php echo e(route('admin.logs.destroy', $log)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input class="btn btn-danger btn-sm" type="submit" value="<?php echo app('translator')->get('admin.delete'); ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-2">
                <?php echo e($logs->withQueryString()->links()); ?>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/logs/index.blade.php ENDPATH**/ ?>