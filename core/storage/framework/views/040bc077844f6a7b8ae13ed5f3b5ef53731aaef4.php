<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="row gy-4">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><?php echo e(__('Payment Information')); ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-light d-flex justify-content-between">
                                <span><?php echo e(__('Method Currency')); ?></span>
                                <span><?php echo e($gateway->gateway_parameters->gateway_currency); ?></span>
                            </li>
                            <li class="list-group-item text-light">
                                <span class="w-100"><?= clean($gateway->gateway_parameters->instruction) ?></span>
                                <span class="w-100">
                                    <img src="<?php echo e(getFile('gateways', @$gateway->gateway_parameters->qr_code)); ?>"
                                        alt="">
                                </span>
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

                                <span><?php echo e(str_replace('_', ' ', $deposit->gateway->gateway_name)); ?></span>

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
                                <span><?php echo e('1 ' . @$general->site_currency . ' = ' . $deposit->rate); ?></span>
                            </li>

                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Total Payable Amount')); ?>:</span>
                                <span><?php echo e($deposit->final_amount . ' ' . @$deposit->gateway->gateway_parameters->gateway_currency); ?></span>
                            </li>

                            <li class="list-group-item  text-light d-flex justify-content-between">
                                <span><?php echo e(__('Reciept Wallet')); ?>:</span>
                                <span
                                    class="text-uppercase"><?php echo e(rtrim(str_replace('_', ' ', $deposit->wallet_type), 's')); ?></span>
                            </li>
                            <?php if($deposit->plan_id): ?>
                                <li class="list-group-item  text-light d-flex justify-content-between">
                                    <span><?php echo e(__('Plan')); ?>:</span>
                                    <span class="text-uppercase"><?php echo e($deposit->plan->plan_name); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><?php echo e(__('Requirments')); ?></h4>
                    </div>

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group mb-2 col-md-12">
                                    <?php if(
                                        $deposit->plan &&
                                            $deposit->plan->interest_status == 'percentage' &&
                                            $deposit->plan->plan_wallet == 'business_value_wallets'): ?>
                                        <h5>Total Profit: <span
                                                class="text-danger"><?php echo e(number_format($deposit->plan->return_interest, 3)); ?>%</span>
                                        </h5>
                                        <div class="form-group col-md-12">
                                            <label for="" class="mb-2 mt-2"><?php echo e(__('Sponser Profit')); ?></label>
                                            <input placeholder="Your sponser will get." name="sponser_profit" type="number"
                                                step="any" required value="<?php echo e(old('sponser_profit')); ?>"
                                                class="form-control <?php $__errorArgs = ['sponser_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['sponser_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if($gateway->user_proof_param != null): ?>
                                    <?php $__currentLoopData = $gateway->user_proof_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($proof['type'] == 'text'): ?>
                                            <div class="form-group col-md-12">
                                                <label for=""
                                                    class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                                <input type="text"
                                                    name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>"
                                                    class="form-control"
                                                    <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($proof['type'] == 'textarea'): ?>
                                            <div class="form-group col-md-12">
                                                <label for=""
                                                    class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                                <textarea name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>" class="form-control"
                                                    <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>></textarea>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($proof['type'] == 'file'): ?>
                                            <div class="form-group col-md-12">
                                                <label for=""
                                                    class="mb-2 mt-2"><?php echo e(__($proof['field_name'])); ?></label>
                                                <input type="file"
                                                    name="<?php echo e(strtolower(str_replace(' ', '_', $proof['field_name']))); ?>"
                                                    class="form-control"
                                                    <?php echo e($proof['validation'] == 'required' ? 'required' : ''); ?>>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>


                                <div class="form-group">
                                    <button class="cmn-btn mt-4" type="submit"><?php echo e(__('Deposit Now')); ?></button>

                                </div>


                            </div>



                        </form>



                    </div>

                </div>




            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/gateway/gateway_manual.blade.php ENDPATH**/ ?>