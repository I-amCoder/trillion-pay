


<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="<?php echo e(route('admin.plan.create')); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                <?php echo e(__('Add Plan')); ?></a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th><?php echo e(__('SL')); ?>.</th>
                                            <th><?php echo e(__('Plan Name')); ?></th>
                                            <th><?php echo e(__('Invest Limit')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($plan->plan_name); ?></td>
                                                <td>
                                                    <?php if($plan->amount_type == 0): ?>
                                                        <?php echo e(number_format($plan->minimum_amount, 0) . ' ' . @$general->site_currency); ?>

                                                        -
                                                        <?php echo e(number_format($plan->maximum_amount, 0) . ' ' . @$general->site_currency); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format($plan->amount, 0) . ' ' . @$general->site_currency); ?>

                                                    <?php endif; ?>

                                                </td>

                                                <td>
                                                    <div class="custom-switch custom-switch-label-onoff">
                                                        <input class="custom-switch-input status"
                                                            id="test-<?php echo e($plan->id); ?>"
                                                            data-status="<?php echo e($plan->status); ?>"
                                                            data-url="<?php echo e(route('admin.plan.changestatus', $plan->id)); ?>"
                                                            type="checkbox" name="status"
                                                            <?php echo e($plan->status ? 'checked' : ''); ?>>
                                                        <label class="custom-switch-btn"
                                                            for="test-<?php echo e($plan->id); ?>"></label>
                                                    </div>

                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.plan.edit', $plan->id)); ?>"
                                                        class="btn btn-md btn-primary"><i class="fa fa-pen mr-2"></i
                                                            class="fa fa-pen mr-2"></i><?php echo e(__('Edit')); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>
                                                <td class="text-center" colspan="100%">
                                                    <?php echo e(__('No Plan Created Yet')); ?></td>
                                            </tr>
                                        <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php if($plans->hasPages()): ?>
                            <div class="card-footer">
                                <?php echo e($plans->links('backend.partial.paginate')); ?>

                            </div>
                        <?php endif; ?>


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

            $('.status').on('change', function() {

                let status = $(this).data('status');
                let url = $(this).data('url');

                $.ajax({

                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },

                    url: url,

                    data: {
                        status: status
                    },

                    method: "POST",

                    success: function(response) {
                        iziToast.success({

                            message: response.success,
                            position: 'topRight'
                        });
                    }
                })
            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/backend/plan/index.blade.php ENDPATH**/ ?>