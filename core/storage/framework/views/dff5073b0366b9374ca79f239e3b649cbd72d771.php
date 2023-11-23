<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="card-body text-end">
            <form action="" method="get" class="d-inline-flex">
                <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">
                <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                <button type="submit" class="cmn-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Trx')); ?></th>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Gateway')); ?></th>
                        <th><?php echo e(__('Amount')); ?></th>
                        <th><?php echo e(__('Currency')); ?></th>
                        <th><?php echo e(__('Charge')); ?></th>
                        <th><?php echo e(__('Details')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($transaction->trx); ?></td>
                            <td data-caption="<?php echo e(__('User')); ?>"><?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                            <td data-caption="<?php echo e(__('Gateway')); ?>"><?php echo e(@$transaction->gateway->gateway_name ?? 'Account Transfer'); ?></td>
                            <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e($transaction->amount); ?></td>
                            <td data-caption="<?php echo e(__('Currency')); ?>"><?php echo e($transaction->currency); ?></td>
                            <td data-caption="<?php echo e(__('Charge')); ?>"><?php echo e($transaction->charge . ' ' . $transaction->currency); ?></td>
                            <td data-caption="<?php echo e(__('Details')); ?>"><?php echo e($transaction->details); ?></td>
                            <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
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
                <?php if($transactions->hasPages()): ?>
                    <?php echo e($transactions->links()); ?>

                <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/transaction.blade.php ENDPATH**/ ?>