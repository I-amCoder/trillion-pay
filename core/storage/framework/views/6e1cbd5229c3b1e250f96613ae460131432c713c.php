<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e($pageTitle); ?></h1>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form method="post" action="<?php echo e(route('admin.sponser.commision.update')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="card-header">

                                <h6><?php echo e(__('Enter all information below:')); ?></h6>
                                <br>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label><?php echo e(__('Enter number of percent')); ?></label>
                                        <input type="number" name="percent" class="form-control" value="<?php echo e(@$commision_data->percent); ?>" id="commision"
                                            required>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer mb-3">
                                <button class="btn btn-primary"><?php echo e(@$commision_data ?  __('Update') : __('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(isset($commision_data)): ?>


                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('percent')); ?></th>

                                            <th><?php echo e(__('status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                         <td><?php echo e(1); ?></td>
                                         <td><?php echo e($commision_data->percent); ?></td>
                                         <td>
                                            <?php if($commision_data->status): ?>
                                            <div class="badge badge-success"><?php echo e(__('Active')); ?></div>
                                        <?php else: ?>
                                            <div class="badge badge-danger"><?php echo e(__('Inactive')); ?></div>
                                        <?php endif; ?>
                                         </td>

                                                <td>
                                                    <a href="<?php echo e(route('admin.sponser.commision.delete', $commision_data->id)); ?>"><button
                                                    class="btn btn-md btn-danger delete"><i
                                                        class="fa fa-trash"></i></button></a>
                                                    
                                                </td>
                                            </tr>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </section>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script>

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/commision/commision_create.blade.php ENDPATH**/ ?>