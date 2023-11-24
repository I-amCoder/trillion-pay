<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-2">

                                <table class="table table-striped table-md" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('Commison From')); ?></th>
                                            <th scope="col"><?php echo e(__('Commison To')); ?></th>
                                            <th scope="col"><?php echo e(__('Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('Commision Date')); ?></th>
                                            <th scope="col"><?php echo e(__('Action')); ?></th>
                                        </tr>

                                    </thead>
                                    <tbody id="appendFilter">

                                        <?php $__empty_1 = true; $__currentLoopData = $commison; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td data-caption="From"><?php echo e(@$item->parent->username); ?></td>
                                                <td data-caption="From"><?php echo e(@$item->child->username); ?></td>
                                                <td data-caption="To"><?php echo e(number_format($item->amount, 2)); ?>

                                                    <?php echo e(@$general->site_currency); ?></td>
                                                <td data-caption="<?php echo e(__('date')); ?>">
                                                    <?php echo e($item->created_at->format('y-m-d')); ?></td>
                                                    <td>
                                                        <form action="<?php echo e(route('admin.commision.delete',$item->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                                        </form>
                                                    </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td data-caption="Data" class="text-center" colspan="100%">
                                                    <?php echo e(__('No Data Found')); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>




                                </table>

                            </div>

                            <div class="card-footer">
                                <?php echo e($commison->links('backend.partial.paginate')); ?>

                            </div>
                        </div>
                    </div>
                </div>
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

         th,td{
            text-align: center !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'
            $('#myTable').DataTable({
                paging: false,
                info: false
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/report/commission.blade.php ENDPATH**/ ?>