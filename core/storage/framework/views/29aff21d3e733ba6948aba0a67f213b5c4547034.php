<?php $__env->startSection('content2'); ?>
    
    <section class="s-pt-100 s-pb-100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card bg-second">
                        <div class="card-header text-center">
                            <h5><?php echo e(__('Payment Preview')); ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php if(!(session('type') == 'deposit')): ?>
                                <li class="list-group-item text-light  d-flex justify-content-between">
                                    <span><?php echo e(__('Plan Name')); ?>:</span>

                                    <span><?php echo e($deposit->plan->plan_name); ?></span>

                                </li>
                                <?php endif; ?>
                                <li class="list-group-item   text-white d-flex justify-content-between">
                                    <span><?php echo e(__('Gateway Name')); ?>:</span>

                                    <span><?php echo e($deposit->gateway->gateway_name); ?></span>

                                </li>
                                <li class="list-group-item   text-white d-flex justify-content-between">
                                    <span><?php echo e(__('Amount')); ?>:</span>
                                    <span><?php echo e(number_format($deposit->amount, 2)); ?></span>
                                </li>

                                <li class="list-group-item  text-white  d-flex justify-content-between">
                                    <span><?php echo e(__('Charge')); ?>:</span>
                                    <span><?php echo e(number_format($deposit->charge, 2)); ?></span>
                                </li>


                                <li class="list-group-item  text-white  d-flex justify-content-between">
                                    <span><?php echo e(__('Conversion Rate')); ?>:</span>
                                    <span><?php echo e('1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2)); ?></span>
                                </li>



                                <li class="list-group-item   text-white d-flex justify-content-between">
                                    <span><?php echo e(__('Total Payable Amount')); ?>:</span>
                                    <span><?php echo e(number_format($deposit->final_amount, 2)); ?></span>
                                </li>


                                <li class="list-group-item  text-white">
                                    <form action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="amount"
                                            value="<?php echo e(number_format($deposit->final_amount, 2)); ?>">
                                        <button type="submit" class="cmn-btn"><?php echo e(__('Pay With PayTm')); ?></button>

                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/frontend/user/gateway/paytm.blade.php ENDPATH**/ ?>