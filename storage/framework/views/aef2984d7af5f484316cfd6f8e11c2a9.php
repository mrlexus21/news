<?php $__env->startSection('title', __('admin.subscribers')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <!-- Default box -->

    <div class="card card-info">
        <form action="<?php echo e(route('admin.subscribes.index')); ?>" method="get" class="form-horizontal" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- select -->
                        <div class="form-group">
                            <label for="author"><?php echo app('translator')->get('admin.author'); ?></label>
                            <select class="form-control custom-select" name="author" id="author">
                                <option value=""><?php echo app('translator')->get('admin.all'); ?></option>
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($author->id); ?>" <?php if(request()->query('author') == $author->id): ?> selected <?php endif; ?>><?php echo e($author->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right"><?php echo app('translator')->get('admin.apply'); ?></button>
                <a href="<?php echo e(route('admin.subscribes.index')); ?>" class="btn btn-warning float-right mr-2"><?php echo app('translator')->get('admin.reset'); ?></a>
            </div>

        </form>
    </div>
<?php if($subscribers->isEmpty()): ?>
    <div class="card card-info">
        <div class="row">
            <h2>Список пуст</h2>
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
                        <?php echo app('translator')->get('admin.user_name'); ?>
                    </th>
                    <th style="width: 20%">
                        E-mail
                    </th>
                    <th style="width: 20%">
                        <?php echo app('translator')->get('admin.author'); ?>
                    </th>
                    <th style="width: 10%">
                        <?php echo app('translator')->get('admin.create_date'); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php /** @var \App\Models\Subscriber $subscriber */  ?>
                <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($subscriber->id); ?>

                        </td>
                        <td>
                            <?php echo e($subscriber->user->name); ?>

                        </td>
                        <td>
                            <?php echo e($subscriber->user->email); ?>

                        </td>
                        <td>
                            <?php echo e($subscriber->author->name); ?>

                        </td>
                        <td>
                            <?php echo e($subscriber->created_at); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="mt-2">
            <?php echo e($subscribers->withQueryString()->links()); ?>

        </div>
    </div>
        <!-- /.card-body -->
    </div>
    <?php endif; ?>

    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/subscribes/index.blade.php ENDPATH**/ ?>