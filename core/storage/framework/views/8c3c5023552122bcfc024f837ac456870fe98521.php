<?php
    $content = content('plan.content');
    $plans = App\Models\Plan::where('status', 1)
        ->latest()
        ->get();
?>

<section class="s-pt-100 s-pb-100 section-bg">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2 class="section-title"><?php echo e(__(@$content->data->title)); ?></h2>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
                        ->where('user_id', Auth::id())
                        ->where('next_payment_date', '!=', null)
                        ->where('payment_status', 1)
                        ->count();

                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="invest-plan">
                        <div class="invest-plan-shape"></div>
                        <div class="invest-plan-top">
                            <h4 class="invest-plan-name"><?php echo e($plan->plan_name); ?></h4>
                            <h5 class="invest-plan-amount"><?php echo e(number_format($plan->return_interest, 2)); ?> <?php if($plan->interest_status == 'percentage'): ?>
                                    <?php echo e('%'); ?>

                                <?php else: ?>
                                    <?php echo e(@$general->site_currency); ?>

                                <?php endif; ?>
                            </h5>
                            <p class="mb-0"><?php echo e(__('Every')); ?> <?php echo e($plan->time->name); ?></p>
                        </div>

                        <div class="invest-plan-middle">
                            <h5 class="invest-plan-min-max">
                                <?php if($plan->amount_type == 0): ?>
                                    <?php echo e(__('Min')); ?>

                                    <?php echo e(number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency); ?>

                                    <p class="mb-0">-</p>
                                    <?php echo e(__('Max')); ?>

                                    <?php echo e(number_format($plan->maximum_amount, 2) . ' ' . @$general->site_currency); ?>

                                <?php else: ?>
                                    <?php echo e(number_format($plan->amount, 2) . ' ' . @$general->site_currency); ?>

                                <?php endif; ?>
                            </h5>
                            <ul class="invest-plan-features">
                                <li>

                                    <?php if($plan->return_for == 1): ?>
                                        <?php echo e(__('For')); ?> <?php echo e($plan->how_many_time); ?>

                                        <?php echo e(__('Times')); ?>

                                    <?php else: ?>
                                        <?php echo e(__('Lifetime')); ?>

                                    <?php endif; ?>

                                </li>



                                <?php if($plan->capital_back == 1): ?>
                                    <li><?php echo e(__('Capital Back')); ?> <?php echo e(__('YES')); ?></li>
                                <?php else: ?>
                                    <li><?php echo e(__('Capital Back')); ?> <?php echo e(__('NO')); ?></li>
                                <?php endif; ?>

                                <li>Total Earning
                                    <?php echo e(number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency); ?></li>
                                <li>Daily Earning
                                    <?php echo e(number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency); ?></li>
                            </ul>
                        </div>
                        <div class="invest-plan-action mt-3">
                            <?php if($plan_exist >= $plan->invest_limit): ?>
                                <a class="cmn-btn w-100" href="#"><?php echo e(__('Max Invest Limit exceeded')); ?></a>
                            <?php else: ?>
                                <a class="cmn-btn w-100 mb-3"
                                    href="<?php echo e(route('user.gateways', $plan->id)); ?>"><?php echo e(__('Invest Now')); ?></a>

                                <?php if(auth()->guard()->check()): ?>

                                    <button class="cmn-btn w-100 balance" data-plan="<?php echo e($plan); ?>"
                                        data-url=""><?php echo e(__('Invest Using Balance')); ?></button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo e(route('user.investmentplan.submit')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Invest Now')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for=""><?php echo e(__('Invest Amount')); ?></label>
                            <input type="text" name="amount" class="form-control">
                            <input type="hidden" name="plan_id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn cmn-btn"><?php echo e(__('Invest Now')); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.balance').on('click', function() {
                const modal = $('#invest');
                modal.find('input[name=plan_id]').val($(this).data('plan').id);
                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/sections/plan.blade.php ENDPATH**/ ?>