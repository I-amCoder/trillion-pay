<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="row withdraw-all-row">
            <?php if(isset($pending) && $pending): ?>
            <div class="col-12 my-3">
                <button class="btn btn-success checkall">Check All</button>
                <button class="btn btn-danger uncheckall">Uncheck All</button>
                <button class="btn btn-success mx-2 float-right approve-selected">Approve Selected</button>
                <button class="btn btn-danger float-right reject-selected">Reject Selected</button>
            </div>
            <?php endif; ?>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php if(isset($pending) && $pending): ?>
                                        <th><?php echo e(__('Select')); ?></th>
                                        <?php endif; ?>
                                        <th><?php echo e(__('User')); ?></th>
                                        <th><?php echo e(__('Withdraw Amount')); ?></th>
                                        <th><?php echo e(__('User Will Get')); ?></th>
                                        <th><?php echo e(__('Charge Type')); ?></th>
                                        <th><?php echo e(__('Charge')); ?></th>
                                        <th><?php echo e(__('status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $withdrawlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <?php if(isset($pending) && $pending): ?>
                                            <td class="text-center">
                                                <input type="checkbox" name="bulkAction[]" value="<?php echo e($withdrawlog->id); ?>"
                                                    class="form-check-input  bulk-select"
                                                    id="exampleCheck<?php echo e($withdrawlog->id); ?>">
                                            </td>
                                            <?php endif; ?>
                                            <td>

                                                <a href="<?php echo e(route('admin.user.details', $withdrawlog->user->id)); ?>">

                                                    <span class="ml-2">
                                                        <?php echo e($withdrawlog->user->username); ?>

                                                    </span>
                                                </a>

                                            </td>

                                            <td><?php echo e($general->currency_icon .
                                                '  ' .
                                                $withdrawlog->withdraw_amount +
                                                ($withdrawlog->withdrawMethod->charge_type === 'percent'
                                                    ? ($withdrawlog->withdraw_amount * $withdrawlog->withdraw_charge) / 100
                                                    : $withdrawlog->withdraw_amount)); ?>

                                            </td>
                                            <td>


                                                <?php echo e($withdrawlog->withdraw_amount); ?>


                                            </td>
                                            <td>
                                                <?php echo e(ucwords($withdrawlog->withdrawMethod->charge_type)); ?>

                                            </td>
                                            <td>
                                                <?php echo e(number_format($withdrawlog->withdraw_charge, 2)); ?>

                                            </td>
                                            <td>
                                                <?php if($withdrawlog->status == 1): ?>
                                                    <span class="badge badge-success"><?php echo e(__('Success')); ?></span>
                                                <?php elseif($withdrawlog->status == 2): ?>
                                                    <span class="badge badge-danger"><?php echo e(__('Rejected')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-md btn-info details"
                                                    data-user_data="<?php echo e(json_encode($withdrawlog->user_withdraw_prof)); ?>"
                                                    data-transaction="<?php echo e($withdrawlog->transaction_id); ?>"
                                                    data-provider="<?php echo e($withdrawlog->user->fullname); ?>"
                                                    data-email="<?php echo e($withdrawlog->user->email); ?>"
                                                    data-method_name="<?php echo e($withdrawlog->withdrawMethod->name); ?>"
                                                    data-date="<?php echo e(__($withdrawlog->created_at->format('d F Y'))); ?>"><?php echo e(__('Details')); ?></button>
                                                <?php if($withdrawlog->status == 0): ?>
                                                    <button class="btn btn-md btn-primary accept"
                                                        data-url="<?php echo e(route('admin.withdraw.accept', $withdrawlog)); ?>"><?php echo e(__('Accept')); ?></button>
                                                    <button class="btn btn-md btn-danger reject"
                                                        data-url="<?php echo e(route('admin.withdraw.reject', $withdrawlog)); ?>"><?php echo e(__('Reject')); ?></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($withdrawlogs->hasPages()): ?>
                        <?php echo e($withdrawlogs->links('backend.partial.paginate')); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Withdraw Details')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid withdraw-details">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>

                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Withdraw Accept')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to Accept this withdraw request')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Accept')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Withdraw Reject')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group col-md-12">

                                <label for=""><?php echo e(__('Reason Of Reject')); ?></label>
                                <textarea name="reason_of_reject" id="" cols="30" rows="10" class="form-control"> </textarea>

                            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="bulk_accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="bulk_ids">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Withdraw Accept')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to Accept this withdraw request')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Accept')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bulk_reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Withdraw Reject')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group col-md-12">

                                <label for=""><?php echo e(__('Reason Of Reject')); ?></label>
                                <textarea name="reason_of_reject" id="" cols="30" rows="10" class="form-control"> </textarea>
                                <input type="hidden" name="bulk_ids">
                            </div>
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


<?php $__env->startPush('style'); ?>
    <style>
        .image-rounded {
            width: 50px;
            height: 50px;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.details').on('click', function() {
                const modal = $('#details');

                let html = `

                    <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               <?php echo e(__('Withdraw Method Email')); ?>

                                <span>${$(this).data('user_data').email}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('Withdraw Account Information')); ?>

                                <span>${$(this).data('user_data').account_information}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('Transaction Id')); ?>

                                <span>${$(this).data('transaction')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('User Name')); ?>

                                <span>${$(this).data('provider')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('User Email')); ?>

                                <span>${$(this).data('email')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('Withdraw Method')); ?>

                                <span>${$(this).data('method_name')}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('Withdraw Date')); ?>

                                <span>${$(this).data('date')}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e(__('Note For Withdraw')); ?>

                                <span>${$(this).data('user_data').note}</span>
                            </li>

                        </ul>


                `;

                modal.find('.withdraw-details').html(html);

                modal.modal('show');
            })

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

            $(".uncheckall").click(function(e) {
                e.preventDefault();
                $('.bulk-select').prop('checked', false);
            });

            $(".checkall").click(function(e) {
                e.preventDefault();
                $('.bulk-select').prop('checked', true);
            });

            // Function to handle bulk action submission
            function handleBulkAction(action) {
                const selectedIds = $('input[name="bulkAction[]"]:checked').map(function() {
                    return this.value;
                }).get();

                console.log(selectedIds);

                // Check if any row is selected
                if (selectedIds.length > 0) {
                    // Perform bulk action based on the selected action
                    if (action === 'approve') {
                        const modal = $('#bulk_accept');
                        modal.find('form').attr('action', '<?php echo e(route('admin.withdraw.bulk.accept')); ?>');
                        modal.find('input[name=bulk_ids]').val(JSON.stringify(selectedIds));
                        modal.modal('show');
                    } else if (action === 'reject') {
                        const modal = $('#bulk_reject');
                        modal.find('form').attr('action', '<?php echo e(route('admin.withdraw.bulk.reject')); ?>');
                        modal.find('input[name=bulk_ids]').val(JSON.stringify(selectedIds));
                        modal.modal('show');
                    }

                    // Set the selected IDs as hidden input value
                    $('#selectedIds').val(selectedIds.join(','));

                    // Submit the form
                    $('#bulkActionForm').submit();
                } else {
                    alert('Please select at least one item.');
                }
            }

            // Click event for "Approve Selected" button
            $('.approve-selected').on('click', function() {
                handleBulkAction('approve');
            });

            // Click event for "Reject Selected" button
            $('.reject-selected').on('click', function() {
                handleBulkAction('reject');
            });


        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/withdraw/withdraw_all.blade.php ENDPATH**/ ?>