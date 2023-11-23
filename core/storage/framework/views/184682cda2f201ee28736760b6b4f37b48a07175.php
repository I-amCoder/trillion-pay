

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h5><?php echo e(__('Variables Meaning')); ?></h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th><?php echo e(__('Variable')); ?></th>
                                        <th><?php echo e(__('Meaning')); ?></th>
                                    </tr>

                                    <?php $__currentLoopData = $template->meaning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                            <td><?php echo e('{' . $key . '}'); ?></td>
                                            <td><?php echo e($temp); ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="" method="post">

                                <?php echo csrf_field(); ?>

                                <div class="row">


                                    <div class="form-group col-md-12">

                                        <label for=""><?php echo e(__('Subject')); ?></label>
                                        <input type="text" name="subject" class="form-control"
                                            value="<?php echo e($template->subject); ?>">


                                    </div>

                                    <div class="form-group col-md-12">

                                        <label for=""><?php echo e(__('Template')); ?></label>
                                        <textarea name="template" class="form-control summernote"><?php echo e(clean($template->template)); ?></textarea>

                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary float-right"><?php echo e(__('Update Email Template')); ?></button>
                                    </div>


                                </div>



                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'
            $('.summernote').summernote();
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/email/edit.blade.php ENDPATH**/ ?>