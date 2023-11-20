<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header pl-0">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-1">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Balance')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($user->balance, 2) . ' ' . @$general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-2">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Refferal')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalRef); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-3">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Return Interest')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($userInterest, 2) . ' ' . $general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-4">
                            <i class="fas fa-funnel-dollar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Commission')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($userCommission, 2) . ' ' . $general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-5">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Withdraw')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($withdrawTotal, 2) . ' ' . $general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-6">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Deposit')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-7">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Invest amount')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(number_format($totalInvest, 2) . ' ' . $general->site_currency); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card card-statistic-1 style-two mb-0">
                        <div class="card-icon bg-8">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4><?php echo e(__('Total Ticket')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e($totalTicket); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="custom-xxl-3 col-xl-4 col-lg-5">
                            <img src="<?php echo e(getFile('user', $user->image)); ?>" class="w-100">
                            <div class="d-flex flex-wrap justify-content-between mt-3 p-1">
                                <h5><?php echo e($user->full_name); ?></h5>
                                <p><?php echo e($user->email); ?></p>
                            </div>
                            <form action="<?php echo e(route('admin.user.balance.update', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo e($user->id); ?>">
                                    <input type="hidden" class="form-control" name="type" value="add">
                                    <input type="number" class="form-control" name="balance" min="1"
                                        placeholder="add Balance">
                                    <button class="btn btn-outline-success px-4" type="submit" id="button-addon2"> <i
                                            class="fa fa-plus"></i> <?php echo e(__('Add Balance')); ?></button>
                                </div>
                            </form>
                            <form action="<?php echo e(route('admin.user.balance.update', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo e($user->id); ?>">
                                    <input type="hidden" class="form-control" name="type" value="minus">
                                    <input type="number" class="form-control" name="balance" min="1"
                                        placeholder="Subtract Balance">
                                    <button class="btn btn-outline-danger px-2" type="submit" id="button-addon2"> <i
                                            class="fa fa-minus mr-1"></i> <?php echo e(__('Subtruct Balance')); ?></button>
                                </div>
                            </form>
                        </div>
                        <div class="custom-xxl-9 col-xl-8 col-lg-7">
                            <ul class="user-action-list">
                                <li>
                                    <a href="#" class="btn btn-sm btn-outline-primary sendMail"><i
                                            class="fas fa-link mr-1"></i> <?php echo e('Send Email'); ?> </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin.login.user', $user->id)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Login As User'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.commision', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Commission Log'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.user.interestlog', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Interest Log'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.deposit.log', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Deposit Log'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.payment.report', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Investment Log'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.withdraw.report', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('Withdraw Log'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.ticket.index', ['user' => $user->id])); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('User Ticket'); ?></a>
                                </li>

                                <li>
                                    <a href="<?php echo e(route('admin.transaction', $user)); ?>"
                                        class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                        <?php echo e('User Transactions'); ?></a>
                                </li>
                            </ul>

                            <hr>

                            <form action="<?php echo e(route('admin.user.update', $user->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label><?php echo e(__('First Name')); ?></label>
                                        <input type="text" name="fname" class="form-control"
                                            value="<?php echo e($user->fname); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <label><?php echo e(__('Last Name')); ?></label>
                                        <input type="text" name="lname" class="form-control"
                                            value="<?php echo e($user->lname); ?>">
                                    </div>

                                    <div class="form-group col-md-6 mb-3 ">
                                        <label><?php echo e(__('Phone')); ?></label>
                                        <input type="text" name="phone" class="form-control"
                                            value="<?php echo e(@$user->phone); ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 ">
                                        <label><?php echo e(__('Country')); ?></label>
                                        <input type="text" name="country" class="form-control"
                                            value="<?php echo e(@$user->address->country); ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label><?php echo e(__('city')); ?></label>
                                        <input type="text" name="city" class="form-control form_control"
                                            value="<?php echo e(@$user->address->city); ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label><?php echo e(__('zip')); ?></label>
                                        <input type="text" name="zip" class="form-control form_control"
                                            value="<?php echo e(@$user->address->zip); ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label><?php echo e(__('state')); ?></label>
                                        <input type="text" name="state" class="form-control form_control"
                                            value="<?php echo e(@$user->address->state); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label><?php echo e(__('Password')); ?></label>
                                        <input type="password" name="password" class="form-control form_control"
                                            placeholder="Change Password">
                                    </div>
                                    <div class="col-md-12">
                                        <label><?php echo e(__('Confirm Password')); ?></label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form_control" placeholder="Confirm Change Password">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p for=""><?php echo e(__('Email Verified')); ?></p>
                                                <input type="checkbox" <?php echo e($user->ev ? 'checked' : ''); ?>

                                                    name="email_status" data-toggle="toggle" data-on="Verified"
                                                    data-off="Not Verified" data-onstyle="success" data-offstyle="danger"
                                                    data-height="46px" data-width="100%">
                                            </div>
                                            <div class="col-md-3">
                                                <p for=""><?php echo e(__('SMS Verified')); ?></p>
                                                <input type="checkbox" name="sms_status" <?php echo e($user->sv ? 'checked' : ''); ?>

                                                    data-toggle="toggle" data-on="Verified" data-off="Not Verified"
                                                    data-onstyle="success" data-offstyle="danger" data-width="100%"
                                                    data-height="46px">
                                            </div>
                                            <div class="col-md-3">
                                                <p for=""><?php echo e(__('KYC Verified')); ?></p>
                                                <input type="checkbox" name="kyc_status"
                                                    <?php echo e($user->kyc ? 'checked' : ''); ?> data-toggle="toggle"
                                                    data-on="Verified" data-off="Not Verified" data-onstyle="success"
                                                    data-offstyle="danger" data-width="100%" data-height="46px">
                                            </div>
                                            <div class="col-md-3">
                                                <p for=""><?php echo e(__('Status')); ?></p>
                                                <input type="checkbox" name="status"
                                                    <?php echo e($user->status ? 'checked' : ''); ?> data-toggle="toggle"
                                                    data-on="Active" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger" data-width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100"><?php echo e('Update User'); ?></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $reference = $user->refferals;
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
                                            <img src="<?php echo e(getFile('user', $user->image)); ?>">
                                            <span class="mb-0"><?php echo e($user->full_name); ?></span>
                                        </p>
                                        <ul class="sub-child-list step-2">
                                            <?php $__currentLoopData = $reference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="single-child">
                                                    <p>
                                                        <img src="<?php echo e(getFile('user', $user->image)); ?>">
                                                        <span class="mb-0"><?php echo e($user->full_name); ?></span>
                                                    </p>

                                                    <ul class="sub-child-list step-3">
                                                        <?php $__currentLoopData = $user->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="single-child">
                                                                <p>
                                                                    <img src="<?php echo e(getFile('user', $ref->image)); ?>">
                                                                    <span class="mb-0"><?php echo e($ref->full_name); ?></span>
                                                                </p>

                                                                <ul class="sub-child-list step-4">
                                                                    <?php $__currentLoopData = $ref->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="single-child">
                                                                            <p>
                                                                                <img
                                                                                    src="<?php echo e(getFile('user', $ref2->image)); ?>">
                                                                                <span
                                                                                    class="mb-0"><?php echo e($ref2->full_name); ?></span>
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
        </section>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog modal-lg" role="document">
            <form action="<?php echo e(route('admin.user.mail', $user->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Send Mail to user')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <label for=""><?php echo e(__('Subject')); ?></label>

                            <input type="text" name="subject" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for=""><?php echo e(__('Message')); ?></label>

                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Send Mail')); ?></button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-plugin'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/toogle.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-plugin'); ?>
    <script src="<?php echo e(asset('asset/admin/js/toogle.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .user-action-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: -4px;
        }

        .user-action-list li {
            padding: 4px;
        }

        .sp-referral {
            padding: 0;
            margin: 0;
            list-style: none;
        }

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
            border: 2px solid #e5e5e5;
        }

        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
            list-style: none;
            margin-bottom: 0
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .sp-referral>.single-child.root-child>p img {
            border: 2px solid #5463ff;
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
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
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
        'use strict'
        $(function() {
            $('.sendMail').on('click', function(e) {
                e.preventDefault();
                const modal = $('#mail');
                modal.modal('show');
            })
            $('#country option').each(function(index) {
                let country = "<?php echo e(@$user->address->country); ?>"
                if ($(this).val() == country) {
                    $(this).attr('selected', 'selected')
                }
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/backend/users/details.blade.php ENDPATH**/ ?>