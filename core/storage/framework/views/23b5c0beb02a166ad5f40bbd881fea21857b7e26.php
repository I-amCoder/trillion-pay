<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="card-body text-end">
            <form action="" method="get" class="d-inline-flex">
               
                <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                <button type="submit" class="cmn-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr class="bg-yellow">
                        <th><?php echo e(__('Plan Name')); ?></th>
                        <th><?php echo e(__('Interest')); ?></th>
                        <th><?php echo e(__('Invest Amount')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                        <th><?php echo e(__('Next Payment Date')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $interestLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-caption="<?php echo e(__('Plan Name')); ?>"><?php echo e($log->payment->plan->plan_name); ?></td>
                            <td data-caption="<?php echo e(__('Interest')); ?>"><?php echo e(number_format($log->interest_amount, 2)); ?>

                                <?php echo e(@$general->site_currency); ?></td>
                            <td data-caption="<?php echo e(__('Invest Amount')); ?>"><?php echo e(number_format($log->payment->amount, 2)); ?>

                                <?php echo e(@$general->site_currency); ?></td>
                            <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($log->created_at); ?></td>
                            <td data-caption="<?php echo e(__('Next Payment Date')); ?>">
                                <?php echo e(isset($log->payment->next_payment_date) ? $log->payment->next_payment_date : 'Plan Expired'); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/frontend/user/interest_log.blade.php ENDPATH**/ ?>