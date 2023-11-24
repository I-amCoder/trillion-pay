<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e($pageTitle); ?></h1>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form method="post" action="<?php echo e(route('admin.login.message.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-header">

                                <h6><?php echo e(__('Enter all information below:')); ?></h6>
                                <br>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label><?php echo e(__('Message')); ?></label>
                                        <input type="text" class="form-control" value="<?php echo e($msg->message); ?>"
                                            name="message" required>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-8 col-sm-12 mb-3">
                                        <label class="col-form-label"><?php echo e(__('Profile Image')); ?></label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('admins', $msg->picture)); ?>);">
                                            <label for="image-upload" id="image-label"><?php echo e(__('Choose File')); ?></label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check ">
                                            <input name="status" <?php echo e($msg->status == 1 ? 'checked' : ''); ?>

                                                class="form-check-input" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Show on Frontend
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer mb-3">
                                <button class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        'use strict'

        $(function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Update Image')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/userLoginMessage.blade.php ENDPATH**/ ?>