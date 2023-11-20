<?php $__env->startSection('content2'); ?>
    <script>
        'use strict'

        function getCountDown(elementId, seconds) {
            var times = seconds;
            var x = setInterval(function() {
                var distance = times * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "COMPLETE";
                }
                times--;
            }, 1000);
        }
    </script>

    <div class="dashboard-body-part">

        <div class="card-body d-flex justify-content-between flex-wrap">
            <h3>Busines Pack Investments</h3>
            <form action="" method="get" class=" d-inline-flex">
                <input type="date" class="form-control me-3" placeholder="Search User" name="pack_date">
                <button type="submit" class="cmn-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Plan')); ?></th>

                        <th><?php echo e(__('Gateway')); ?></th>
                        <th><?php echo e(__('Amount')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                        <th><?php echo e(__('Upcoming Payment')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $business_pack_invests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>

                            <td data-caption="<?php echo e(__('User')); ?>"><?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                            <td><?php echo e($transaction->plan->plan_name??""); ?></td>

                            <td data-caption="<?php echo e(__('Gateway')); ?>">
                                <?php if($transaction->deposit->gateway_id == 0): ?>
                                    <?php echo e(__('Invest Using Balance')); ?>

                                <?php else: ?>
                                    <?php echo e(@$transaction->deposit->gateway->gateway_name ?? 'Account Transfer'); ?>

                                <?php endif; ?>
                            </td>
                            <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e(number_format($transaction->amount,3)); ?></td>

                            <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
                            <td data-caption="<?php echo e(__('Upcoming Payment')); ?>">
                                <p id="pack_count_<?php echo e($loop->iteration); ?>" class="mb-2"></p>
                                <script>
                                    getCountDown("pack_count_<?php echo e($loop->iteration); ?>", "<?php echo e(now()->diffInSeconds($transaction->next_payment_time)); ?>")
                                </script>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100%">
                                <?php echo e(__('No data Found')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($business_pack_invests->hasPages()): ?>
                <?php echo e($business_pack_invests->links()); ?>

            <?php endif; ?>

        </div>
        <hr>
        <div class="card-body d-flex justify-content-between flex-wrap">
            <h3>Busines Value Investments</h3>
            <form action="" method="get" class=" d-inline-flex">
                <input type="date" class="form-control me-3" placeholder="Search User" name="value_date">
                <button type="submit" class="cmn-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Plan')); ?></th>
                        <th><?php echo e(__('Self Profit')); ?></th>
                        <th><?php echo e(__('Sponser Profit')); ?></th>
                        <th><?php echo e(__('Gateway')); ?></th>
                        <th><?php echo e(__('Amount')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                        <th><?php echo e(__('Upcoming Payment')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $business_value_invests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>

                            <td data-caption="<?php echo e(__('User')); ?>"><?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                            <td><?php echo e($transaction->plan->plan_name??""); ?></td>
                            <td><?php echo e(number_format($transaction->self_profit,3)); ?>%</td>
                            <td><?php echo e(number_format($transaction->sponser_profit,3)); ?>%</td>
                            <td data-caption="<?php echo e(__('Gateway')); ?>">
                                <?php if($transaction->deposit->gateway_id == 0): ?>
                                    <?php echo e(__('Invest Using Balance')); ?>

                                <?php else: ?>
                                    <?php echo e(@$transaction->deposit->gateway->gateway_name ?? 'Account Transfer'); ?>

                                <?php endif; ?>
                            </td>
                            <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e(number_format($transaction->amount,3)); ?></td>

                            <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
                            <td data-caption="<?php echo e(__('Upcoming Payment')); ?>">
                                <p id="value_count_<?php echo e($loop->iteration); ?>" class="mb-2"></p>
                                <script>
                                    getCountDown("value_count_<?php echo e($loop->iteration); ?>", "<?php echo e(now()->diffInSeconds($transaction->next_payment_time)); ?>")
                                </script>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100%">
                                <?php echo e(__('No data Found')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($business_value_invests->hasPages()): ?>
                <?php echo e($business_value_invests->links()); ?>

            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/invest_log.blade.php ENDPATH**/ ?>