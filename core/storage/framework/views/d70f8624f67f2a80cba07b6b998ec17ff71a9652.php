<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.plan.index')); ?>" class="btn btn-primary"><i
                                    class="fa fa-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('admin.plan.update', $plan->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Plan Name')); ?>

                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo e($plan->plan_name); ?>">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                                <span />
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Wallet')); ?> <span
                                                class="text-danger">*</span></label></label>
                                        <select name="wallet" class="form-control selectric" id="wallet">
                                            <option value="0" <?php echo e($plan->plan_wallet == "business_pack_wallets"?"selected":""); ?>><?php echo e(__('Business Pack Wallet')); ?></option>
                                            <option value="1" <?php echo e($plan->plan_wallet == "business_value_wallets"?"selected":""); ?>><?php echo e(__('Business Value Wallet')); ?></option>
                                        </select>

                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Amount Type')); ?> <span
                                                class="text-danger">*</span></label></label>
                                        <select name="amount_type" class="form-control selectric" id="amount_type">
                                            <option <?php echo e($plan->amount_type == 0 ? 'selected' : ''); ?> value="0">
                                                <?php echo e(__('Range')); ?></option>
                                            <option <?php echo e($plan->amount_type == 1 ? 'selected' : ''); ?> value="1">
                                                <?php echo e(__('Fixed')); ?></option>
                                        </select>

                                    </div>


                                    <div class="form-group offman col-md-3" id="minimum">
                                        <label class="font-weight-bold"><?php echo e(__('Minimum Amount')); ?><span
                                                class="text-danger">*</span></label></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="minimum" id="minimum_a"
                                                value="<?php echo e($plan->minimum_amount ? $plan->minimum_amount : 0); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group offman col-md-3" id="maximum">
                                        <label class="font-weight-bold"><?php echo e(__('Maximum Amount')); ?></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control maximum_a" name="maximum"
                                                id="maximum_a"
                                                value="<?php echo e($plan->maximum_amount ? $plan->maximum_amount : 0); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group onman col-md-3 amount">
                                        <label class="font-weight-bold"> <?php echo e(__('Amount')); ?></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="amount" id="amount"
                                                value="<?php echo e($plan->amount ? $plan->amount : 0); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Return / Interest (Every Time)')); ?>

                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="interest"
                                                value="<?php echo e($plan->return_interest ? $plan->return_interest : 0); ?>">
                                            <div class="input-group-append">
                                                <div class="input-group">
                                                    <select name="interest_status" class="form-control selectric">
                                                        <option
                                                            <?php echo e($plan->interest_status == 'percentage' ? 'selected' : 'Percentage'); ?>

                                                            value="percentage"><?php echo e(__('Percentage')); ?></option>
                                                        <option
                                                            <?php echo e($plan->interest_status == 'fixed' ? 'selected' : 'Fixed'); ?>

                                                            value="fixed"><?php echo e(__('Fixed')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Every')); ?></label>
                                        <select class="form-control selectric" name="times">
                                            <?php $__empty_1 = true; $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option <?php echo e($plan->every_time == $item->id ? 'selected' : ''); ?>

                                                    value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>


                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Return For')); ?></label>
                                        <select name="return_for" class="form-control selectric" id="return_for">
                                            <option <?php echo e($plan->return_for == '0' ? 'selected' : ''); ?> value="0">
                                                <?php echo e(__('Lifetime')); ?></option>

                                            <option <?php echo e($plan->return_for == '1' ? 'selected' : ''); ?> value="1">
                                                <?php echo e(__('Period')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group return col-md-3 how_many_times">
                                        <label class="font-weight-bold"><?php echo e(__('How Many Times')); ?></label>
                                        <input type="text" class="form-control" name="repeat_time"
                                            value="<?php echo e($plan->how_many_time ? $plan->how_many_time : 0); ?>">
                                    </div>


                                    <div class="form-group col-md-3" id="capitalBack">
                                        <label class="font-weight-bold"><?php echo e(__('Capital Back')); ?></label>
                                        <select name="capital_back" class="form-control selectric">

                                            <option <?php echo e($plan->capital_back == '0' ? 'selected' : ''); ?> value="0">
                                                <?php echo e(__('No')); ?></option>

                                            <option <?php echo e($plan->capital_back == '1' ? 'selected' : ''); ?> value="1">
                                                <?php echo e(__('Yes')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">User Subscription Limit</label>
                                        <input type="text" class="form-control" name="limit" value="<?php echo e($plan->invest_limit); ?>">
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold"><?php echo e(__('Status')); ?></label>
                                        <select name="status" class="form-control selectric">
                                            <option <?php echo e($plan->status == '0' ? 'selected' : ''); ?> value="0">
                                                <?php echo e(__('Disable')); ?></option>

                                            <option <?php echo e($plan->status == '1' ? 'selected' : ''); ?> value="1">
                                                <?php echo e(__('Active')); ?></option>
                                        </select>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        'use strict'


        $(function() {

            $('.how_many_times').hide();
            var amount_type = $('#amount_type').val();
            var return_period = $('#return_for').val();


            if (amount_type == 1) {
                $('#minimum').hide();
                $('#maximum').hide();

            }

            if (amount_type == 0) {
                $('#minimum').show();
                $('#maximum').show();
                $('.amount').hide();


            }

            if (return_period == 1) {
                $('.how_many_times').show();
                $('#capitalBack').show();

            } else {
                $('.how_many_times').hide();
                $('#capitalBack').hide();

            }


            $('#amount_type').on('change', function() {
                var value = $('#amount_type').val();

                if (value == 1) {
                    $('.amount').show();
                    $('#minimum').hide();
                    $('#maximum').hide();
                    $('#minimum_a').val('');
                    $('#maximum_a').val('');

                } else {
                    $('.amount').hide();
                    $('#minimum').show();
                    $('#maximum').show();
                    $('#amount').val('');

                }

            })

            $('#return_for').on('change', function() {

                var value = $('#return_for').val();

                if (value == 1) {
                    $('.how_many_times').show();
                    $('#capitalBack').show();

                } else {
                    $('.how_many_times').hide();
                    $('#capitalBack').hide();

                }

            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/plan/edit.blade.php ENDPATH**/ ?>