<?php /** @var \App\Models\Post $post */  ?>
<?php if(isset($post)): ?>
    <?php $__env->startSection('title', __('admin.edit_record', ['name' => $post->name])); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName(), $post)); ?>
<?php else: ?>
    <?php $__env->startSection('title', __('admin.create_record')); ?>
    <?php $__env->startSection('breadcrumbs', Breadcrumbs::view('partials.blocks.admin-breadcrumbs', \Request::route()->getName())); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<section class="content">

    <div class="card card-primary">
        <!-- form start -->
            <form method="POST" enctype="multipart/form-data"
                  <?php if(isset($post)): ?>
                  action="<?php echo e(route('admin.posts.update', $post)); ?>"
                  <?php else: ?>
                  action="<?php echo e(route('admin.posts.store')); ?>"
                <?php endif; ?>
            >
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <?php if(isset($post)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->get('admin.title'); ?></label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="<?php echo e(old('title', isset($post) ? $post->title : null)); ?>">
                    <?php if($errors->has('title')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('title')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="slug"><?php echo app('translator')->get('admin.code'); ?></label>
                    <input type="text" class="form-control" id="slug" name="slug"
                           value="<?php echo e(old('slug', isset($post) ? $post->slug : null)); ?>">
                    <?php if($errors->has('slug')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('slug')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label"><?php echo app('translator')->get('admin.category'); ?>: </label>
                    <div class="col-sm-12">
                        <select name="category_id" id="category_id" class="form-control custom-select">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"
                                    <?php if(isset($post)): ?>
                                        <?php if($post->category_id == $category->id): ?>
                                            selected
                                        <?php endif; ?>
                                    <?php endif; ?>
                                ><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <br>
                <?php $__currentLoopData = [
                        'is_published' => __('admin.published'),
                        'popular' => __('admin.show_popular'),
                        'main_slider' => __('admin.show_in_main_slider'),
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-group row">
                        <label class="col-sm-6 col-form-label" for="flexCheckDefault <?php echo e($field); ?>">
                            <?php echo e($title); ?>

                        </label>
                        <div class="col-sm-6">
                            <input name="<?php echo e($field); ?>"
                                   type="hidden"
                                   value="0">
                            <input class="form-check-input"
                                   name="<?php echo e($field); ?>"
                                   type="checkbox"
                                   id="flexCheckDefault <?php echo e($field); ?>"
                                   value="1"
                                   <?php if(isset($post) && $post->$field === true): ?> checked <?php endif; ?>
                            >
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <label><?php echo app('translator')->get('admin.image'); ?></label><br>
                    <img id='img-upload' height="250px" src='<?php echo e(isset($post->image) ? Storage::url('images/' . $post->image) : ''); ?>'/>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file btn-border">
                               <?php echo e(isset($post->image) ? __('admin.download_new_image') : __('admin.download_image')); ?>

                                <input type="file" class="custom-file-input" name="image" id="imgInp">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description"><?php echo app('translator')->get('admin.description'); ?></label><br>
                    <textarea rows="10" class="editor" name="excerpt">
                        <?php echo e(old('excerpt', isset($post) ? $post->excerpt : null)); ?>

                    </textarea>
                    <?php if($errors->has('excerpt')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('excerpt')); ?>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="content"><?php echo app('translator')->get('admin.content'); ?></label><br>
                    <textarea rows="20" class="editor" name="content">
                        <?php echo e(old('content', isset($post) ? $post->content : null)); ?>

                    </textarea>
                    <?php if($errors->has('content')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($errors->first('content')); ?>

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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/admin/newsposts/form.blade.php ENDPATH**/ ?>