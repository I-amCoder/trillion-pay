


<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="card">

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
                            <th><?php echo e(__('Sender')); ?></th>
                            <th><?php echo e(__('Receiver')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Currency')); ?></th>
                            <th><?php echo e(__('Charge')); ?></th>
                            <th><?php echo e(__('Details')); ?></th>
                            <th><?php echo e(__('Payment Date')); ?></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($transaction->transaction_id); ?></td>
    
                                <td data-caption="<?php echo e(__('Sender')); ?>">
                                    <p class="p-0 m-0">
                                       Name : <?php echo e($transaction->sender->full_name); ?>

                                    </p>
                                    <p class="p-0 m-0">
                                      Email : <?php echo e($transaction->sender->email); ?>

                                    </p>
                                </td>
    
                                <td data-caption="<?php echo e(__('Receiver')); ?>">
                                    <p class="p-0 m-0">
                                        Name : <?php echo e($transaction->receiver->full_name); ?>

                                    </p>
                                    <p class="p-0 m-0">
                                       Email : <?php echo e($transaction->receiver->email); ?>

                                    </p>
                                </td>
    
                                <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e(number_format($transaction->amount,2)); ?></td>
                                <td data-caption="<?php echo e(__('Currency')); ?>"><?php echo e($general->site_currency); ?></td>
                                <td data-caption="<?php echo e(__('Charge')); ?>">
                                    <?php echo e(number_format($transaction->charge,2) . ' ' . $general->site_currency); ?></td>
                                <td data-caption="<?php echo e(__('Details')); ?>"><?php echo e($transaction->details); ?></td>
                                <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="100%">
                                    <?php echo e(__('No Transaction Found')); ?>

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

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/transfer_log.blade.php ENDPATH**/ ?>