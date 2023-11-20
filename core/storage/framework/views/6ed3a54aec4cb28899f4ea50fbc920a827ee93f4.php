<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                        <h4 class="mb-0"><?php echo e(__('Transfer Money')); ?></h4>
                        <p class="mb-0">Current Balance :
                            <?php echo e(number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency); ?></p>
                    </div>
                    <div class="card-body">

                        <div class="d-flex flex-wrap justify-content-between">

                            <p class="text-info">Min Transfer Amount :
                                <?php echo e($general->min_amount . ' ' . $general->site_currency); ?></p>
                            <p class="text-info">Max Transfer Amount :
                                <?php echo e($general->max_amount . ' ' . $general->site_currency); ?></p>
                            <p class="text-info">Transfer Charge :
                                <?php echo e($general->trans_charge . ' ' . ($general->trans_type === 'fixed' ? $general->site_currency : '%')); ?>

                            </p>
                        </div>


                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for=""><?php echo e(__('Receiver Email')); ?></label>
                                <input type="text" name="email" id="refer-link" class="form-control"
                                    placeholder="Transfer account email" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for=""><?php echo e(__('Amount')); ?></label>
                                <input type="text" name="amount" id="amount" class="form-control"
                                    placeholder="Transfer Amount" data-type="<?php echo e($general->trans_type); ?>"
                                    data-charge="<?php echo e($general->trans_charge); ?>" required>

                                <p id="totalAmount" class="text-warning mt-3"></p>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="cmn-btn w-100"
                                    id="basic-addon2"><?php echo e(__('Transfer Money')); ?></button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            let commission = 0;
            let total = 0;

            $('#amount').on('keyup', function() {

                if($(this).val() == ''){
                    $('#totalAmount').text('')
                    return
                }

                if (/\D/g.test(this.value)) {

                    this.value = this.value.replace(/\D/g, '');

                    return
                }

                let charge = $(this).data('charge');

                if ($(this).data('type') === 'percent') {
                    commission = (parseFloat($(this).val()) * parseFloat(charge)) / 100;
                } else {
                    commission = parseFloat(charge)
                }

                total = parseFloat($(this).val()) + commission;


                $('#totalAmount').text('Total Amount with Charge - ' + total)



            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/transfer_money.blade.php ENDPATH**/ ?>