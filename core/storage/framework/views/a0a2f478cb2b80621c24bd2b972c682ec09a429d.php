<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="row gy-4">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><?php echo e(__('Bank Payment Information')); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Bank Name')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->name); ?></span>
                            </li>

                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Account Number')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->account_number); ?></span>
                            </li>

                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Routing Number')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->routing_number); ?></span>
                            </li>

                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Branch Name')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->branch_name); ?></span>
                            </li>

                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Method Currency')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->gateway_currency); ?></span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><?php echo e(__('Payment Information')); ?></h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Gateway Name')); ?>:</span>

                                <span><?php echo e($deposit->gateway->gateway_name); ?></span>

                            </li>
                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->amount, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>

                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Charge')); ?>:</span>
                                <span><?php echo e(number_format($deposit->charge, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>

                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Conversion Rate')); ?>:</span>
                                <span><?php echo e('1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2)); ?></span>
                            </li>

                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Total Payable Amount')); ?>:</span>
                                <span><?php echo e(number_format($deposit->final_amount, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><?php echo e(__('Payment Proof')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php $__currentLoopData = $gateway->user_proof_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($proof['type'] == 'text'): ?>
                                        <div class="form-group col-md-12">
                                            <label for=""
                                                class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                            <input type="text"
                                                name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>"
                                                class="form-control bg-dark"
                                                <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($proof['type'] == 'textarea'): ?>
                                        <div class="form-group col-md-12">
                                            <label for=""
                                                class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                            <textarea name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>" class="form-control bg-dark"
                                                <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>></textarea>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($proof['type'] == 'file'): ?>
                                        <div class="form-group col-md-12">
                                            <label for=""
                                                class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                            <input type="file"
                                                name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>"
                                                class="form-control bg-dark"
                                                <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <div class="form-group">
                                    <button class="cmn-btn mt-4"
                                        type="submit"><?php echo e(__('Send Proof For Payment ')); ?></button>

                                </div>


                            </div>



                        </form>



                    </div>

                </div>




            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/gateway/bank.blade.php ENDPATH**/ ?>