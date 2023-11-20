<?php if($type === 'Role'): ?>
    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($role->name); ?></td>
            <td>

                <button class="btn btn-primary btn-sm edit" data-name="<?php echo e($role->name); ?>"
                    data-href="<?php echo e(route('admin.roles.update', $role)); ?>"
                    data-permissons="<?php echo e($role->permissions->pluck('name')); ?>">
                    <i class="fa fa-pen"></i></button>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif($type === 'User'): ?>
    <?php $__empty_1 = true; $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($user->fullname); ?></td>

            <td><?php echo e($user->phone); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e(@$user->address->country ?? 'N/A'); ?></td>
            <td>

                <?php if($user->status): ?>
                    <span class='badge badge-success'><?php echo e(__('Active')); ?></span>
                <?php else: ?>
                    <span class='badge badge-danger'><?php echo e(__('Inactive')); ?></span>
                <?php endif; ?>

            </td>

            <td>

                <a href="<?php echo e(route('admin.user.details', $user)); ?>" class="btn btn-md btn-primary"><i
                        class="fa fa-pen"></i></a>


                <a href="<?php echo e(route('admin.login.user', $user)); ?>" target="_blank"
                    class="btn btn-info btn-md "><?php echo e(__('Login as User')); ?></a>


            </td>


        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
        </tr>
    <?php endif; ?>
<?php elseif($type === 'Admin'): ?>
    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td>
                <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-primary"><?php echo e($role->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>

            <td><?php echo e($admin->username); ?></td>
            <td><?php echo e($admin->email); ?></td>

            <td>
                <a href="<?php echo e(route('admin.admins.edit', $admin)); ?>" class="btn btn-primary btn-sm"><i
                        class="fa fa-pen"></i></a>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif($type === 'Payment'): ?>
    <?php $__empty_1 = true; $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e(@$transaction->user->fullname); ?></td>
            <td><?php echo e(@$transaction->gateway->gateway_name ?? 'Using Balance'); ?></td>
            <td><?php echo e(@$transaction->transaction_id); ?></td>
            <td><?php echo e(@number_format($transaction->amount, 2)); ?></td>
            <td><?php echo e(@number_format($transaction->rate, 2)); ?></td>
            <td><?php echo e(@number_format($transaction->charge, 2)); ?></td>
            <td><?php echo e(@number_format($transaction->final_amount, 2)); ?></td>
            <td>
                <?php if($transaction->payment_type == 1): ?>
                    <span class="badge badge-success"><?php echo e(__('Autometic')); ?></span>
                <?php else: ?>
                    <span class="badge badge-info"><?php echo e(__('Manual')); ?></span>
                <?php endif; ?>
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="8" class="text-center"><?php echo e(__('No Data Found')); ?>

            </td>
        </tr>
    <?php endif; ?>
<?php elseif($type === 'Withdraw'): ?>
    <?php $__empty_1 = true; $__currentLoopData = @$tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e(@$transaction->user->fullname); ?></td>
            <td><?php echo e(@$transaction->withdrawMethod->name); ?></td>
            <td><?php echo e(@$transaction->transaction_id); ?></td>

            <td><?php echo e(@number_format($transaction->withdraw_charge, 2)); ?></td>
            <td><?php echo e(@number_format($transaction->withdraw_amount, 2)); ?></td>


        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="8" class="text-center"><?php echo e(__('No Data Found')); ?>

            </td>
        </tr>
    <?php endif; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/backend/filter_view.blade.php ENDPATH**/ ?>