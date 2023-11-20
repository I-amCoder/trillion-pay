<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('seo'); ?>
        <meta name='description' content="<?php echo e(@$general->seo_description); ?>">
    <?php $__env->stopPush(); ?>
    <section class="auth-section">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="<?php echo e(route('home')); ?>" class="auth-logo">
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->logo)); ?>"
                        width="100%" alt="pp">
                </a>
                <p class="mb-0"><span class="me-2"><?php echo e(__('Haven\'t an Account?')); ?></span> <a class="cmn-btn btn-sm"
                        href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4"><?php echo e(__('Login Your Account')); ?></h3>
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="formGroupExampleInput"><?php echo e(__('Username')); ?></label>
                            <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>"
                                id="username" placeholder="<?php echo e(__('Enter Your Username')); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput"><?php echo e(__('Pasword')); ?></label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="<?php echo e(__('Enter Password')); ?>">
                        </div>
                        <p class="text-end"><a href="<?php echo e(route('user.forgot.password')); ?>"
                                class="color-change"><?php echo e(__('Forget password?')); ?></a></p>
                        <?php if(@$general->allow_recaptcha == 1): ?>
                            <div class="col-md-12 my-3">
                                <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-sitekey="<?php echo e(@$general->recaptcha_key); ?>"
                                    data-callback="verifyCaptcha"></div>
                                <div id="g-recaptcha-error"></div>
                            </div>
                        <?php endif; ?>
                        <button class="cmn-btn w-100" type="submit"> <?php echo e(__('Log In')); ?> </button>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                    <?php if(@$general->copyright): ?>
                        <?php echo e(__(@$general->copyright)); ?>

                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="auth-thumb-area">
            <div class="auth-thumb">
                <img src="<?php echo e(getFile('frontendlogin', @$general->frontend_login_image)); ?>" alt="image">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='text-danger'>@changeLang('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/user/auth/login.blade.php ENDPATH**/ ?>