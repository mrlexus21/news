<?php /** @var \App\Models\Ad $ad */  ?>
<?php if(isset($ad)): ?>
    <?php $__env->startSection('title', __('admin.edit_record', ['name' => $ad->name])); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $ad)); ?>
<?php else: ?>
    <?php $__env->startSection('title', __('admin.create_record')); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <div class="card card-primary">
        <!-- form start -->
            <form method="POST" enctype="multipart/form-data"
                  <?php if(isset($ad)): ?>
                  action="<?php echo e(route('admin.ads.update', $ad)); ?>"
                  <?php else: ?>
                  action="<?php echo e(route('admin.ads.store')); ?>"
                <?php endif; ?>
            >
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <?php if(isset($ad)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->get('admin.name'); ?></label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?php echo e(old('name', isset($ad) ? $ad->name : null)); ?>">
                    <?php if($errors->has('name')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('name')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="link"><?php echo app('translator')->get('admin.link'); ?></label>
                    <input type="text" class="form-control" id="link" name="link"
                           value="<?php echo e(old('link', isset($ad) ? $ad->link : null)); ?>">
                    <?php if($errors->has('link')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('link')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label"><?php echo app('translator')->get('admin.type'); ?>: </label>
                    <div class="col-sm-12">
                        <select name="type" id="type" class="form-control custom-select">
                            <?php $__currentLoopData = \App\Models\Ad::TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>"
                                        <?php if(isset($ad)): ?>
                                        <?php if($ad->type == $type): ?>
                                        selected
                                    <?php endif; ?>
                                    <?php endif; ?>
                                ><?php echo e($type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php if($errors->has('type')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('type')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label><?php echo app('translator')->get('admin.show_start_date'); ?>:</label>
                    <div class="input-group date" data-target-input="nearest">
                        <input type="text" id="showdate_start" <?php if(isset($ad)): ?> value="<?php echo e(old('showdate_start', isset($ad) ? $ad->showdate_start : null)); ?>" <?php endif; ?> name="showdate_start" class="form-control datetimepicker-input" data-target="#showdate_start">
                        <div class="input-group-append" data-target="#showdate_start" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php if($errors->has('showdate_start')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('showdate_start')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label><?php echo app('translator')->get('admin.show_end_date'); ?>:</label>
                    <div class="input-group date" data-target-input="nearest">
                        <input type="text" id="showdate_end" <?php if(isset($ad)): ?> value="<?php echo e(old('showdate_end', isset($ad) ? $ad->showdate_end : null)); ?>" <?php endif; ?> name="showdate_end" class="form-control datetimepicker-input" data-target="#showdate_end">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php if($errors->has('showdate_end')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('showdate_end')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label><?php echo app('translator')->get('admin.image'); ?></label><br>
                    <img id="img-upload" src="<?php echo e(isset($ad->image) ? Storage::url(config('filesystems.local_paths.news_images') . $ad->image) : ''); ?>"/>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btn-border">
                               <?php echo e(isset($ad->image) ? __('admin.download_new_image') : __('admin.download_image')); ?>

                                <input type="file" class="custom-file-input" name="image" id="imgInp">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <?php if($errors->has('image')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('image')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('admin.save'); ?></button>
            </div>
        </form>
    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/ads/form.blade.php ENDPATH**/ ?>