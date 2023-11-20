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
                        <th><?php echo e(__('Wallet')); ?></th>
                        <th><?php echo e(__('Invest Amount')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                        <th><?php echo e(__('Next Payment Date')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $interestLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($log->type == 'business_pack_wallets'): ?>
                            <tr>
                                <td data-caption="<?php echo e(__('Plan Name')); ?>"><?php echo e($log->business_pack_payment->plan->plan_name); ?>

                                </td>

                                <td data-caption="<?php echo e(__('Interest')); ?>"><?php echo e(number_format($log->interest_amount, 3)); ?>

                                    <?php echo e(@$general->site_currency); ?></td>
                                <td>Business Pack Wallet</td>
                                <td data-caption="<?php echo e(__('Invest Amount')); ?>">
                                    <?php echo e(number_format($log->business_pack_payment->amount ?? 0, 3)); ?>

                                    <?php echo e(@$general->site_currency); ?></td>
                                <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($log->created_at); ?></td>
                                <td data-caption="<?php echo e(__('Next Payment Date')); ?>">
                                    <?php echo e(isset($log->business_pack_payment->next_payment_time) ? $log->business_pack_payment->next_payment_time : 'Plan Expired'); ?>

                                </td>
                            </tr>
                        <?php elseif($log->type == 'business_value_wallets'): ?>
                            <tr>
                                <td data-caption="<?php echo e(__('Plan Name')); ?>">
                                    <?php echo e($log->business_value_payment->plan->plan_name); ?></td>
                                <td data-caption="<?php echo e(__('Interest')); ?>"><?php echo e(number_format($log->interest_amount, 3)); ?>

                                    <?php echo e(@$general->site_currency); ?></td>
                                <td>Business Value Wallet</td>
                                <td data-caption="<?php echo e(__('Invest Amount')); ?>">
                                    <?php echo e(number_format($log->business_value_payment->amount ?? 0, 3)); ?>

                                    <?php echo e(@$general->site_currency); ?></td>
                                <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($log->created_at); ?></td>
                                <td data-caption="<?php echo e(__('Next Payment Date')); ?>">
                                    <?php echo e(isset($log->business_value_payment->next_payment_time) ? $log->business_value_payment->next_payment_time : 'Plan Expired'); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
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

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/interest_log.blade.php ENDPATH**/ ?>