<?php $__env->startSection('content'); ?>
    <section class="login-page">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="admin-login-wrapper">
                        <h3 class="text-dark text-center mb-4"><?php echo e(__('Sign in to Admin')); ?></h3>
                        <form method="POST" class="p-2" action="<?php echo e(route('admin.login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email"><?php echo e(__('Email')); ?></label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="<?php echo e(old('email')); ?>" tabindex="1" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label "><?php echo e(__('Password')); ?></label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    placeholder="Enter password" required>
                            </div>
                            <div class="d-flex justify-content-between form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label text-dark"
                                        for="remember-me"><?php echo e(__('Remember Me')); ?></label>
                                </div>
                                <a href="<?php echo e(route('admin.password.reset')); ?>" class="text-small ">
                                    <?php echo e(__('Forgot Password')); ?>?
                                </a>
                            </div>
                            <button type="submit" class="login-button w-100" tabindex="4">
                                <?php echo e(__('Login ')); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>