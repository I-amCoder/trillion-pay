


<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">

                            <div class="d-flex flex-wrap">

                                <?= filterByVariousType([
                                        'model' => 'Role',
                                        'text' => [
                                            'placeholder' => 'Search Name',
                                            'name' => 'search',
                                            'id' => 'search_text',
                                            'filter_colum' => 'name'
                                        ],
                                        
                                    ]) ?>

                            </div>

                            <button data-href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-primary add"> <i
                                    class="fa fa-plus"></i>
                                <?php echo e(__('Add Role')); ?></button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th><?php echo e(__('SL')); ?>.</th>
                                            <th><?php echo e(__('Role Name')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="filter_data">

                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($role->name); ?></td>
                                                <td>

                                                    <button class="btn btn-primary btn-sm edit"
                                                        data-name="<?php echo e($role->name); ?>"
                                                        data-href="<?php echo e(route('admin.roles.update', $role)); ?>"
                                                        data-permissons="<?php echo e($role->permissions->pluck('name')); ?>">
                                                        <i class="fa fa-pen"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php if($roles->hasPages()): ?>
                            <div class="card-footer">
                                <?php echo e($roles->links('backend.partial.paginate')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <div class="modal fade" id="role" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="<?php echo e(route('admin.roles.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Create Role')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__('Role Name')); ?></label>
                            <input type="text" name="role" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Role Permission')); ?></label>
                            <select name="permission[]" class="js-example-tokenizer" multiple>
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                            <?php echo e(__('Create Role')); ?></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>
                            <?php echo e(__('Close')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="modal fade" id="role_edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Create Role')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__('Role Name')); ?></label>
                            <input type="text" name="role" required class="form-control">
                        </div>

                        <select name="permission[]" class="js-example-tokenizer form-control" multiple id="edit_select">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>
                            <?php echo e(__('Update Role')); ?></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times"></i>
                            <?php echo e(__('Close')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-plugin'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-plugin'); ?>
    <script src="<?php echo e(asset('asset/admin/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict'

        $(function() {


            $(".js-example-tokenizer").select2({
                placeholder: "Give Permission",
                tags: true,
                tokenSeparators: [',', ' ']
            })

            $('.status').on('change', function() {

                let status = $(this).data('status');
                let url = $(this).data('url');

                $.ajax({

                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },

                    url: url,

                    data: {
                        status: status
                    },

                    method: "POST",

                    success: function(response) {
                        iziToast.success({

                            message: response.success,
                            position: 'topRight'
                        });
                    }
                })
            })


            $('.add').on('click', function() {
                const modal = $('#role')


                modal.modal('show')
            })


            $('.edit').on('click', function() {
                const modal = $('#role_edit')

                modal.find('input[name=role]').val($(this).data('name'));

                modal.find('form').attr('action', $(this).data('href'));


                modal.find('#edit_select').val($(this).data('permissons'));

                modal.find('#edit_select').trigger('change')



                modal.modal('show')
            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/role/index.blade.php ENDPATH**/ ?>