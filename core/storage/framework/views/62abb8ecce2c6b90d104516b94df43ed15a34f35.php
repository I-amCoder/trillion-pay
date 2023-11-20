<?php $__env->startSection('content2'); ?>

    <div class="dashboard-body-part">
        <div class="row gy-4 justify-content-center">
            <?php $__empty_1 = true; $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="payment-box text-center">
                        <div class="payment-box-thumb">
                            <img src="<?php echo e(getFile('gateways', $gateway->gateway_image)); ?>" alt="Lights" class="trans-img">
                        </div>
                        <div class="payment-box-content">
                            <h4 class="title"><?php echo e(ucwords(str_replace('_',' ',$gateway->gateway_name))); ?></h4>
                            <button data-href="<?php echo e(route('user.paynow', $gateway->id)); ?>" data-id="<?php echo e($gateway->id); ?>" class="cmn-btn w-100 paynow mt-3"><?php echo e(__('Pay Now')); ?></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php echo e(__('Not Found')); ?>

            <?php endif; ?>

        </div>
    </div>

    <?php if(isset($type) && $type == 'deposit'): ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="paynow">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content bg-body">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Deposit Amount')); ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label for=""><?php echo e(__('Amount')); ?></label>
                                <input type="text" name="amount" class="form-control"
                                    placeholder="<?php echo e(__('Enter Amount')); ?>">

                                <input type="hidden" name="user_id" class="form-control" value="<?php echo e(auth()->id()); ?>">
                                <input type="hidden" name="type" class="form-control" value="deposit">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="cmn-btn"><?php echo e(__('Deposit Now')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php else: ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="paynow">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content bg-body">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Invest Amount')); ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" value="">
                            <div class="form-group">
                                <label for=""><?php echo e(__('Amount')); ?></label>
                                <input type="text" name="amount" class="form-control"
                                    placeholder="<?php echo e(__('Enter Amount')); ?>">

                                <input type="text" name="plan_id" class="form-control" value="<?php echo e($plan->id); ?>"
                                    hidden>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="cmn-btn"><?php echo e(__('Invest Now')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $(function() {
            'use strict'

            $('.paynow').on('click', function() {
                const modal = $('#paynow')

                modal.find('form').attr('action', $(this).data('href'))
                modal.find('input[name=id]').val($(this).data('id'))

                modal.modal('show')
            })
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/frontend/user/gateway/gateways.blade.php ENDPATH**/ ?>