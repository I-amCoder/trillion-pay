


<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sl')); ?></th>
                                            <th><?php echo e(__('User')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                            <th><?php echo e(__('Charge')); ?></th>
                                            <th><?php echo e(__('status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $manuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($key + $manuals->firstItem()); ?></td>
                                                <td><?php echo e($manual->user->fullname); ?></td>
                                                <td><?php echo e(number_format($manual->amount,2).' '.@$general->site_currency); ?></td>
                                                <td>
                                                    <?php echo e(number_format($manual->charge, 2).' '.@$general->site_currency); ?>

                                                </td>
                                                <td>
                                                    <?php if($manual->payment_status == 2): ?>

                                                        <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>

                                                    <?php elseif($manual->payment_status == 1): ?>
                                                        <span
                                                            class="badge badge-success"><?php echo e(__('Approved')); ?></span>


                                                    <?php elseif($manual->payment_status == 3): ?>
                                                        <span
                                                            class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-md btn-info details"
                                                        href="<?php echo e(route('admin.manual.trx', $manual->transaction_id)); ?>"><?php echo e(__('Details')); ?></a>

                                                    <?php if($manual->payment_status == 2): ?>

                                                        <a class="btn text-white btn-md btn-primary accept"
                                                            data-url="<?php echo e(route('admin.manual.accept', $manual->transaction_id)); ?>"><?php echo e(__('Accept')); ?></a>
                                                        <a class="btn text-white btn-md btn-danger reject"
                                                            data-url="<?php echo e(route('admin.manual.reject', $manual->transaction_id)); ?>"><?php echo e(__('Reject')); ?></a>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?>

                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($manuals->hasPages()): ?>
                            <?php echo e($manuals->links('backend.partial.paginate')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Payment Accept')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to Accept this Payment request')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Accept')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Payment Reject')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to reject this payment')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Reject')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        $(function() {
            'use strict'


            $('.accept').on('click', function() {
                const modal = $('#accept');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

            $('.reject').on('click', function() {
                const modal = $('#reject');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/manual_payments/index.blade.php ENDPATH**/ ?>