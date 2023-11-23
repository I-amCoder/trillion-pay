<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Wallet Tweaks')); ?></h1>
            </div>
            <div class="row text-white">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <div class="h4"><i class="fa  fa-cog "></i> Current Wallet</div>
                        </div>
                        <form action="<?php echo e(route('admin.wallet.update', 'current_wallets')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="current_profit" step="any"
                                        value="<?php echo e(old('current_profit') ?? @$settings->current_wallet_profit); ?>"
                                        class="form-control <?php $__errorArgs = ['current_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Wallet Profit Percentage" required>
                                    <?php $__errorArgs = ['current_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="current_withdraw" step="any"
                                        value="<?php echo e(old('current_withdraw') ?? @$settings->current_wallet_tax); ?>"
                                        class="form-control <?php $__errorArgs = ['current_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Tax on balance withdraw" required>
                                    <?php $__errorArgs = ['current_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="current_time" step="0"
                                        value="<?php echo e(old('current_time') ?? @$settings->current_wallet_time); ?>"
                                        class="form-control <?php $__errorArgs = ['current_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Time to complete transfer" required>
                                    <?php $__errorArgs = ['current_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <div class="h4"><i class="fa  fa-cog "></i> Saving Wallet</div>
                        </div>
                        <form action="<?php echo e(route('admin.wallet.update', 'saving_wallets')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="saving_profit" step="any"
                                        value="<?php echo e(old('saving_profit') ?? @$settings->saving_wallet_profit); ?>"
                                        class="form-control <?php $__errorArgs = ['saving_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Wallet Profit Percentage" required>
                                    <?php $__errorArgs = ['saving_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="saving_withdraw" step="any"
                                        value="<?php echo e(old('saving_withdraw') ?? @$settings->saving_wallet_tax); ?>"
                                        class="form-control <?php $__errorArgs = ['saving_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Tax on balance withdraw" required>
                                    <?php $__errorArgs = ['saving_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="saving_time" step="0"
                                        value="<?php echo e(old('saving_time') ?? @$settings->saving_wallet_time); ?>"
                                        class="form-control <?php $__errorArgs = ['saving_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Time to complete transfer" required>
                                    <?php $__errorArgs = ['saving_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <div class="h4"><i class="fa  fa-cog "></i> Sharing Wallet</div>
                        </div>
                        <form action="<?php echo e(route('admin.wallet.update', 'sharing_wallets')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_profit" step="any"
                                        value="<?php echo e(old('sharing_profit') ?? @$settings->sharing_wallet_profit); ?>"
                                        class="form-control <?php $__errorArgs = ['sharing_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Wallet Profit Percentage" required>
                                    <?php $__errorArgs = ['sharing_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Default Profit (Incase if profit is not updated within 24
                                        hours)<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_default_profit" step="any"
                                        value="<?php echo e(old('sharing_default_profit') ?? @$settings->sharing_default_profit); ?>"
                                        class="form-control <?php $__errorArgs = ['sharing_default_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Wallet Profit Percentage" required>
                                    <?php $__errorArgs = ['sharing_default_profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_withdraw" step="any"
                                        value="<?php echo e(old('sharing_withdraw') ?? @$settings->sharing_wallet_tax); ?>"
                                        class="form-control <?php $__errorArgs = ['sharing_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Tax on balance withdraw" required>
                                    <?php $__errorArgs = ['sharing_withdraw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="sharing_time" step="0"
                                        value="<?php echo e(old('sharing_time') ?? @$settings->sharing_wallet_time); ?>"
                                        class="form-control <?php $__errorArgs = ['sharing_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Time to complete transfer" required>
                                    <?php $__errorArgs = ['sharing_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <p class="text-danger">Profit Last Updated:
                                    <?php echo e($settings->last_sharing_update > 0 ? $settings->last_sharing_update . ' Hour(s) ago' : 'Just in Last Hour'); ?>

                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-dark ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/wallet/index.blade.php ENDPATH**/ ?>