<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="h4 section-title text-capitalize"><?php echo e(str_replace('_', ' ', Request('wallet'))); ?> Transfers</div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Arrival Date</th>
                        <th>Request Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($transfer->amount); ?></td>
                            <td><?php echo e($transfer->status == 1 ? 'Completed' : 'Pending'); ?></td>
                            <td><?php echo e($transfer->time->format('d M, Y')); ?></td>
                            <td><?php echo e($transfer->created_at->format('d M, Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100%">
                                <?php echo e(__('No users Found')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($transfers->hasPages()): ?>
                <?php echo e($transfers->links()); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/wallet_transfer_log.blade.php ENDPATH**/ ?>