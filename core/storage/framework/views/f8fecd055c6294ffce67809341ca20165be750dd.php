


<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <div class="row withdraw-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <button class="btn btn-primary add"><i class="fa fa-plus"></i>
                                <?php echo e(__('Add Withdraw Method')); ?></button>
                        </h4>
                        <div class="card-header-form">
                            <form method="GET" action="<?php echo e(route('admin.withdraw.search')); ?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Sl')); ?></th>
                                        <th><?php echo e(__('Name')); ?></th>
                                        <th><?php echo e(__('Charge')); ?></th>
                                        <th><?php echo e(__('Charge Type')); ?></th>
                                        <th><?php echo e(__('Min Withdraw')); ?></th>
                                        <th><?php echo e(__('Max Withdraw')); ?></th>
                                        <th><?php echo e(__('status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($key + $withdraws->firstItem()); ?></td>
                                            <td><?php echo e($withdraw->name); ?></td>
                                            <td><?php echo e(number_format($withdraw->charge, 2) . ' ' . @$general->site_currency); ?></td>
                                            <td><?php echo e(ucwords($withdraw->charge_type)); ?></td>
                                            <td><?php echo e(number_format($withdraw->min_amount, 2) . ' ' . @$general->site_currency); ?>

                                            </td>
                                            <td><?php echo e(number_format($withdraw->max_amount, 2) . ' ' . @$general->site_currency); ?>

                                            </td>
                                            <td>
                                                <?php if($withdraw->status): ?>
                                                    <div class="badge badge-success"><?php echo e(__('Active')); ?></div>
                                                <?php else: ?>
                                                    <div class="badge badge-danger"><?php echo e(__('Inactive')); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button data-href="<?php echo e(route('admin.withdraw.update', $withdraw)); ?>"
                                                    data-withdraw="<?php echo e($withdraw); ?>"
                                                    class="btn btn-md btn-primary update"><i class="fa fa-pen"></i></button>
                                                <button data-url="<?php echo e(route('admin.withdraw.delete', $withdraw)); ?>"
                                                    class="btn btn-md btn-danger delete"><i
                                                        class="fa fa-trash"></i></button>
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
                        <?php if($withdraws->hasPages()): ?>
                            <div class="card-footer">
                                <?php echo e($withdraws->links('backend.partial.paginate')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Method Name')); ?> <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control">

                            </div>

                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Method charge Type')); ?></label>
                                <select name="charge_type" class="form-control">
                                    <option value="fixed"><?php echo e(__('Fixed')); ?></option>
                                    <option value="percent"><?php echo e(__('Percent')); ?></option>
                                </select>

                            </div>

                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Method charge')); ?></label>

                                <div class="input-group">
                                    
                                    <input type="text" name="charge" class="form-control" required>

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <?php echo e(@$general->site_currency); ?>

                                        </div>
                                    </div>
                                </div>

                               

                            </div>


                          


                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Min Amount')); ?></label>
                                <input type="text" name="min_amount" class="form-control">

                            </div>

                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Max Amount')); ?></label>
                                <input type="text" name="max_amount" class="form-control">

                            </div>

                            <div class="form-group col-md-6 col-12">

                                <label for=""><?php echo e(__('Withdraw Method status')); ?></label>
                                <select name="status" class="form-control">
                                    <option value="0"><?php echo e(__('Inactive')); ?></option>
                                    <option value="1"><?php echo e(__('Active')); ?></option>
                                </select>

                            </div>

                            <div class="form-group col-md-12">

                                <label for=""><?php echo e(__('Withdraw Instruction')); ?></label>
                                <textarea name="withdraw_instruction" id="" cols="30" rows="10" class="form-control summernote"><?php echo e(old('withdraw_instruction')); ?></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Delete Withdraw Method')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p><?php echo e(__('Are you sure to delete this method')); ?>?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
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

            $('.add').on('click', function() {
                const modal = $('#modelId');
                modal.find('.modal-title').text("<?php echo e(__('Create Withdraw Method')); ?>")
                modal.find('input[name=name]').val('')
                modal.find('input[name=charge]').val('')
                modal.find('input[name=min_amount]').val('')
                modal.find('input[name=max_amount]').val('')
                modal.find('textarea[name=withdraw_instruction]').val('')
                modal.find('form').attr('action', '');


                modal.modal('show');
            })


            $('.site-currency').on('keyup', function() {
                $('.append_currency').text($(this).val())
            })

            $('.append_currency').text($('.site-currency').val())


            $('.update').on('click', function() {
                const modal = $('#modelId');



                modal.find('.modal-title').text("<?php echo e(__('Update Withdraw Method')); ?>")
                modal.find('input[name=name]').val($(this).data('withdraw').name)
                modal.find('input[name=charge]').val($(this).data('withdraw').charge)
                modal.find('input[name=min_amount]').val($(this).data('withdraw').min_amount)
                modal.find('input[name=max_amount]').val($(this).data('withdraw').max_amount)
                modal.find('select[name=status]').val($(this).data('withdraw').status)
                modal.find('select[name=charge_type]').val($(this).data('withdraw').charge_type)
                modal.find('textarea[name=withdraw_instruction]').val($(this).data('withdraw')
                    .withdraw_instruction)
                modal.find('form').attr('action', $(this).data('href'));

                $('.summernote').summernote('code', $(this).data('withdraw').withdraw_instruction)
                modal.modal('show');
            })

            $('.delete').on('click', function() {
                const modal = $('#delete');
                modal.find('form').attr('action', $(this).data('url'));

                modal.modal('show');
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/withdraw/index.blade.php ENDPATH**/ ?>