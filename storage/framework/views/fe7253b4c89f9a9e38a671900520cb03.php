<?php $__env->startSection('title', __('admin.newsposts')); ?>
<?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $post)); ?>

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
                            <?php /** @var \App\Models\Post $post */  ?>
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
                                    <td><?php echo e($post->id); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.title'); ?></td>
                                    <td><?php echo e($post->title); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.code'); ?></td>
                                    <td><?php echo e($post->slug); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.category'); ?></td>
                                    <td><?php echo e($post->category->name); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.show_popular'); ?></td>
                                    <td><?php echo $post->isPopular() ? __('admin.label_true') : __('admin.label_false'); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.show_in_main_slider'); ?></td>
                                    <td><?php echo $post->isShowInMainSlider() ? __('admin.label_true') : __('admin.label_false'); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.image'); ?></td>
                                    <td>
                                        <?php if($post->getImageSrc() !== null): ?>
                                            <img height="250px" src="<?php echo e($post->getImageSrc()); ?>" alt="">
                                        <?php else: ?>
                                            <?php echo __('admin.label_not_uploaded'); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.excerpt'); ?></td>
                                    <td><?php echo e($post->getExcerpt()); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->get('admin.text'); ?></td>
                                    <td><?php echo e($post->getContent()); ?></td>
                                </tr>

                                <?php if($post->isExternal()): ?>
                                    <tr>
                                        <td><?php echo app('translator')->get('admin.news_source_name'); ?></td>
                                        <td><?php echo e($post->source_name); ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo app('translator')->get('admin.news_source_link'); ?></td>
                                        <td><?php echo e($post->source_link); ?></td>
                                    </tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-muted">
                        <p class="text-sm"><?php echo app('translator')->get('admin.created_at'); ?>
                            <b class="d-block"><?php echo e($post->created_at); ?></b>
                        </p>
                        <p class="text-sm"><?php echo app('translator')->get('admin.updated_at'); ?>
                            <b class="d-block">
                            <?php if(isset($post->updated_at)): ?>
                                    <?php echo e($post->updated_at); ?>

                                <?php else: ?>
                                    -
                            <?php endif; ?>
                            </b>
                        </p>
                        <p class="text-sm"><?php echo app('translator')->get('admin.author'); ?>
                            <b class="d-block">
                                <?php if(isset($post->user_id)): ?>
                                    <?php echo e($post->user->name); ?>

                                <?php else: ?>
                                    <?php echo __('admin.label_not_setted'); ?>

                                <?php endif; ?>
                            </b>
                        </p>
                        <p class="text-sm"><?php echo app('translator')->get('admin.status'); ?>
                            <b class="d-block">
                                <span class="badge badge-<?php echo e($post->getStatusAttribute(true)->class); ?>">
                                    <?php echo e(__('admin.' . $post->getStatusAttribute(true)->value)); ?>

                                </span>
                            </b>
                        </p>
                        <?php if($post->isExternal()): ?>
                            <p class="text-sm"><?php echo app('translator')->get('admin.is_external'); ?>
                                <b class="d-block">
                                    <?php echo __('admin.label_true'); ?>

                                </b>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="text-center mt-5 mb-3">
                        <div class="d-flex flex-row justify-content-md-start">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                <a class="btn btn-info btn-sm ml-2" href="<?php echo e(route('admin.posts.edit', $post)); ?>">
                                    <i class="fas fa-pencil-alt"></i>
                                    
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
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/newsposts/show.blade.php ENDPATH**/ ?>