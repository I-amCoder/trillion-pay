<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th scope="col"><?php echo e(__('Plan Name')); ?></th>
                        <th scope="col"><?php echo e(__('Get Paid')); ?></th>
                        <th scope="col"><?php echo e(__('Interest')); ?></th>
                        <th scope="col"><?php echo e(__('Invest Amount')); ?></th>
                        <th scope="col"><?php echo e(__('Invest Date')); ?></th>
                        <th scope="col"><?php echo e(__('Next Payment Date')); ?></th>
                        <th scope="col"><?php echo e(__('Payment Status')); ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-caption="Plan Name"><?php echo e(@$plan->plan->plan_name); ?></td>
                            <td data-caption="Get Paid">
                                <?php if($plan->plan->return_for == 1): ?>
                                    <?php echo e(isset($plan->pay_count) ? $plan->pay_count : $plan->plan->how_many_time); ?>

                                    <?php echo e(__(' Out of ')); ?>

                                    <?php echo e($plan->plan->how_many_time); ?> <?php echo e(__('Times')); ?>

                                <?php else: ?>
                                    <?php echo e(__('Lifetime')); ?>

                                <?php endif; ?>
                            </td>
                            <td data-caption="Interest"><?php echo e(number_format($plan->interest_amount, 2)); ?>

                                <?php echo e(@$general->site_currency); ?></td>
                            <td data-caption="Invest Amount"><?php echo e(number_format($plan->amount, 2)); ?> <?php echo e(@$general->site_currency); ?></td>
                            <td data-caption="Invest Date"><?php echo e($plan->created_at); ?></td>
                            <td data-caption="Next Payment Date">
                                <?php if($plan->payment_status == 1): ?>
                                    <?php echo e(@$plan->next_payment_date); ?>

                                <?php else: ?>
                                    <?php echo e('N/A'); ?>

                                <?php endif; ?>
                            </td>
                            <td data-caption="Payment Status">

                                <?php if($plan->payment_status == 1): ?>
                                    <span class="badge badge-success"><?php echo e(__('Success')); ?></span>
                                <?php elseif($plan->payment_status == 2): ?>
                                    <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                                <?php elseif($plan->payment_status == 3): ?>
                                    <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td data-caption="Not Found" class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>

                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/pending_invest.blade.php ENDPATH**/ ?>