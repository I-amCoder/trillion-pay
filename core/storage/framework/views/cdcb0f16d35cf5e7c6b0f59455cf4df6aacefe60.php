<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>
            <div class="card">
                <div class="card-body p-2">

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Sl')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Plan Name')); ?></th>
                                <th><?php echo e(__('Interest Amount')); ?></th>
                                <th><?php echo e(__('How Many Time get Paid')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $interestLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interestLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e(@$interestLog->user->fname); ?> <?php echo e(@$interestLog->user->lname); ?></td>
                                    <td><?php echo e(@$interestLog->payment->plan->plan_name); ?></td>
                                    <td><?php echo e(number_format($interestLog->interest_amount, 2) . ' ' . @$general->site_currency); ?>

                                    </td>
                                    <td><?php echo e(@$interestLog->payment->pay_count); ?> <?php echo e(__(' Out of ')); ?>

                                        <?php echo e(@$interestLog->payment->plan->how_many_time); ?> <?php echo e(__('Times')); ?>

                                    </td>
                                    <td><?php echo e($interestLog->created_at); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <tr>

                                    <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>

                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>

                </div>

                <?php if($interestLogs->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($interestLogs->links('backend.partial.paginate')); ?>

                    </div>
                <?php endif; ?>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('style-plugin'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/bs4-datatable.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-plugin'); ?>
    <script src="<?php echo e(asset('asset/admin/js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/bs4-datatable.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .pagination .page-item.active .page-link {
            background-color: rgb(95, 116, 235);
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: transparent;
            border-color: transparent;
        }

        .pagination .page-item.active .page-link:hover {
            background-color: rgb(95, 116, 235);
        }

        th,
        td {
            text-align: center !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'
            $('#myTable').DataTable();
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/backend/userinterestlog.blade.php ENDPATH**/ ?>