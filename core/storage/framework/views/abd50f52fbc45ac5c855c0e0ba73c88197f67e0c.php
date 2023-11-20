

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.gateway.create')); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> <?php echo e(__('Create Gateway')); ?></a>
                        </div>
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Currency')); ?></th>
                                        <th><?php echo e(__('Rate')); ?></th>
                                        <th><?php echo e(__('status')); ?></th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php $__empty_1 = true; $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($gateway->gateway_name); ?></td>
                                            <td><?php echo e($gateway->gateway_parameters->gateway_currency); ?></td>
                                            <td><?php echo e($gateway->rate); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.gateway.edit', $gateway)); ?>" class="btn btn-primary btn-sm"><?php echo e(__('Edit')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                    <tr>
                                        <td colspan="100%" class="text-center"><?php echo e(__('No Gateways Found')); ?></td>
                                    </tr>
                                    <?php endif; ?>

                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/gateways/index.blade.php ENDPATH**/ ?>