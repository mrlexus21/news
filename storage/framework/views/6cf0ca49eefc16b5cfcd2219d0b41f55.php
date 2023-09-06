<?php /** @var \App\Models\User $user */  ?>
<?php if(isset($user)): ?>
    <?php $__env->startSection('title', __('admin.edit_record', ['name' => $user->name])); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $user)); ?>
<?php else: ?>
    <?php $__env->startSection('title', __('admin.create_record')); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<section class="content">
    <div class="card card-primary">
        <!-- form start -->
            <form method="POST" enctype="multipart/form-data"
                  <?php if(isset($user)): ?>
                  action="<?php echo e(route('admin.users.update', $user)); ?>"
                  <?php else: ?>
                  action="<?php echo e(route('admin.users.store')); ?>"
                <?php endif; ?>
            >
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <?php if(isset($user)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->get('admin.name'); ?></label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?php echo e(old('name', isset($user) ? $user->name : null)); ?>">
                    <?php if($errors->has('name')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('name')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?php echo e(old('email', isset($user) ? $user->email : null)); ?>" autocomplete="off">
                    <?php if($errors->has('email')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('email')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password"><?php echo app('translator')->get('admin.password'); ?></label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                    <?php if($errors->has('password')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('password')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-sm-2 col-form-label"><?php echo app('translator')->get('admin.role'); ?>: </label>
                    <div class="col-sm-12">
                        <select name="role_id" id="role_id" class="form-control custom-select">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"
                                    <?php if(isset($user)): ?>
                                        <?php if($user->role_id === $role->id): ?>
                                            selected
                                        <?php endif; ?>
                                    <?php endif; ?>
                                ><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('role')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($errors->first('role')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label><?php echo app('translator')->get('admin.image'); ?></label><br>
                    <img id='img-upload' src='<?php echo e(isset($user->image) ? Storage::url('userimages/' . $user->image) : ''); ?>'/>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btn-border">
                               <?php echo e(isset($user->image) ? __('admin.download_new_image') : __('admin.download_image')); ?>

                                <input type="file" class="custom-file-input" name="image" id="imgInp">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/users/form.blade.php ENDPATH**/ ?>