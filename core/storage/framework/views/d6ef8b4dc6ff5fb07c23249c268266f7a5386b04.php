<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="row gy-4">

            <div class="col-xxl-4 col-md-6">
                <div class="d-box-one">
                    <span class="caption-title"><?php echo e(__('Account Balance')); ?></span>
                    <h3 class="d-box-one-amount">
                        <?php echo e(number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency); ?></h3>
                    <div class="d-box-one-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="d-box-one">
                    <span class="caption-title"><?php echo e(__('Total Withdraw')); ?></span>
                    <h3 class="d-box-one-amount">
                        <?php echo e(number_format($withdraw, 2) . ' ' . $general->site_currency); ?></h3>
                    <div class="d-box-one-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="d-box-one">
                    <span class="caption-title"><?php echo e(__('Total Deposit')); ?></span>
                    <h3 class="d-box-one-amount">
                        <?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?></h3>
                    <div class="d-box-one-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-4 mt-2">
            <?php if(isset($currentPlan->plan->plan_name)): ?>
                <div class="col-xl-4 col-sm-6">
                    <div class="d-box-two">
                        <?php if($currentPlan->next_payment_date <= now()): ?>
                            <span class="caption-title"><?php echo e(__('Profit is ready')); ?></span>
                            <br>
                            <form action="<?php echo e(route('user.claiminterest', encrypt(auth()->user()->id))); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-sm btn-primary">Clain Now</button>
                            </form>
                        <?php else: ?>
                            <span class="caption-title"><?php echo e(__('Next Payment in')); ?></span>
                            <h3 class="d-box-two-amount">
                                <span id="time">00:00:00</span>
                            </h3>
                        <?php endif; ?>
                        <div class="d-box-two-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="<?php echo e(route('user.invest.all')); ?>" class="link-btn"></a>
                    <h3 class="d-box-two-amount">
                        <?php echo e(number_format($totalInvest, 2) . ' ' . $general->site_currency); ?></h3>
                    <span class="caption-title"><?php echo e(__('Total Invest')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="#0" class="link-btn"></a>
                    <h3 class="d-box-two-amount">
                        <?php echo e(isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0); ?>

                        <?php echo e(@$general->site_currency); ?></h3>
                    <span class="caption-title"><?php echo e(__('Current Invest')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="#0" class="link-btn"></a>
                    <h3 class="d-box-two-amount">
                        <?php echo e(isset($currentPlan->plan->plan_name) ? $currentPlan->plan->plan_name : 'N/A'); ?>

                    </h3>
                    <span class="caption-title"><?php echo e(__('Current Plan')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="<?php echo e(route('user.invest.pending')); ?>" class="link-btn"></a>
                    <h3 class="d-box-two-amount">
                        <?php echo e(number_format($pendingInvest, 2) . ' ' . $general->site_currency); ?></h3>
                    <span class="caption-title"><?php echo e(__('Pending Invest')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="<?php echo e(route('user.withdraw.pending')); ?>" class="link-btn"></a>
                    <h3 class="d-box-two-amount">
                        <?php echo e(number_format($pendingWithdraw, 2) . ' ' . $general->site_currency); ?></h3>
                    <span class="caption-title"><?php echo e(__('Pending Withdraw')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="d-box-two">
                    <a href="<?php echo e(route('user.commision')); ?>" class="link-btn"></a>
                    <h3 class="d-box-two-amount"><?php echo e(number_format($commison, 2)); ?>

                        <?php echo e(@$general->site_currency); ?></h3>
                    <span class="caption-title"><?php echo e(__('Refferal Earn')); ?></span>
                    <div class="d-box-two-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label><?php echo e(__('Your refferal link')); ?></label>
            <div class="input-group mb-3">
                <input type="text" id="refer-link" class="form-control copy-text"
                    value="<?php echo e(route('user.register', @Auth::user()->username)); ?>" placeholder="referallink.com/refer"
                    aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                <button type="button" class="input-group-text copy cmn-btn" id="basic-addon2"><?php echo e(__('Copy')); ?></button>
            </div>
        </div>


        <?php
            $reference = auth()->user()->refferals;

        ?>

        <?php
            $reference = auth()->user()->refferals;
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(__('Reference Tree')); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php if($reference->count() > 0): ?>
                            <ul class="sp-referral">
                                <li class="single-child root-child">
                                    <p>
                                        <img src="<?php echo e(getFile('user', auth()->user()->image)); ?>">
                                        <span
                                            class="mb-0"><?php echo e(auth()->user()->full_name . ' - ' . currentPlan(auth()->user())); ?></span>
                                    </p>
                                    <ul class="sub-child-list step-2">
                                        <?php $__currentLoopData = $reference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="single-child">
                                                <p>
                                                    <img src="<?php echo e(getFile('user', $user->image)); ?>">
                                                    <span
                                                        class="mb-0"><?php echo e($user->full_name . ' - ' . currentPlan($user)); ?></span>
                                                </p>

                                                <ul class="sub-child-list step-3">
                                                    <?php $__currentLoopData = $user->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="single-child">
                                                            <p>
                                                                <img src="<?php echo e(getFile('user', $ref->image)); ?>">
                                                                <span
                                                                    class="mb-0"><?php echo e($ref->full_name . ' - ' . currentPlan($ref)); ?></span>
                                                            </p>

                                                            <ul class="sub-child-list step-4">
                                                                <?php $__currentLoopData = $ref->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="single-child">
                                                                        <p>
                                                                            <img
                                                                                src="<?php echo e(getFile('user', $ref2->image)); ?>">
                                                                            <span
                                                                                class="mb-0"><?php echo e($ref2->full_name . ' - ' . currentPlan($ref2)); ?></span>
                                                                        </p>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>

                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </li>
                            </ul>
                        <?php else: ?>
                            <div class="col-md-12 text-center mt-5">
                                <i class="far fa-sad-tear display-1"></i>
                                <p class="mt-2">
                                    <?php echo e(__('No Reference User Found')); ?>

                                </p>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .sp-referral .single-child {
            padding: 6px 10px;
            border-radius: 5px;
        }

        .sp-referral .single-child+.single-child {
            margin-top: 15px;
        }

        .sp-referral .single-child p {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .sp-referral .single-child p img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover;
        }

        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sp-referral>.single-child.root-child>p img {
            border: 2px solid #5463ff;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sp-referral>.single-child.root-child>.sub-child-list::before {
            background-color: var(--main-color);
        }

        .sub-child-list>.single-child {
            position: relative;
        }

        .sub-child-list>.single-child::before {
            position: absolute;
            content: '';
            left: -18px;
            top: 21px;
            width: 30px;
            height: 5px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0 0 0 5px;
        }

        .sub-child-list.step-2>.single-child>p img {
            border: 2px solid #0aa27c;
        }

        .sub-child-list.step-3>.single-child>p img {
            border: 2px solid #a20a0a;
        }

        .sub-child-list.step-4>.single-child>p img {
            border: 2px solid #f562e6;
        }

        .sub-child-list.step-5>.single-child>p img {
            border: 2px solid #a20a0a;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        var copyButton = document.querySelector('.copy');
        var copyInput = document.querySelector('.copy-text');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });
        copyInput.addEventListener('click', function() {
            this.select();
        });

        function startCountdown(seconds) {

            var interval = setInterval(function() {
                var hours = parseInt(seconds / 3600, 10);
                var minutes = parseInt((seconds % 3600) / 60, 10);
                var secondsLeft = seconds % 60;
                $("#time").text(hours + ":" + (minutes < 10 ? "0" : "") + minutes + ":" + (secondsLeft < 10 ? "0" :
                    "") + secondsLeft)
                if (--seconds < 0) {
                    clearInterval(interval);
                    window.location.reload();

                }
            }, 1000);
        }
        <?php if(isset($currentPlan->plan->plan_name)): ?>
            $(document).ready(function() {
                let seconds = <?php echo e(now()->diffInSeconds($currentPlan->next_payment_date, false)); ?>;

                if (seconds > 0) {
                    startCountdown(seconds);
                }
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/user/dashboard.blade.php ENDPATH**/ ?>