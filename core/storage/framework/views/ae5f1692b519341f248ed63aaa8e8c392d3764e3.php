<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('seo'); ?>
        <meta name='description' content="<?php echo e(@$general->seo_description); ?>">
    <?php $__env->stopPush(); ?>

    <section class="auth-section auth-section-two">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="<?php echo e(route('home')); ?>" class="auth-logo">
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->logo)); ?>"
                        width="100%" alt="pp">
                </a>
                <p class="mb-0"><span class="me-2"><?php echo e(__('Already registered?')); ?></span> <a class="cmn-btn btn-sm"
                        href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4"><?php echo e(__('Create An Account')); ?></h3>
                    <form action="<?php echo e(route('user.register')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <?php if(isset(request()->reffer)): ?>
                                    <label for="formGroupExampleInput"><?php echo e(__('Reffered By')); ?></label>
                                    <input type="text" class="form-control bg-dark" value="<?php echo e(request()->reffer); ?>"
                                        name="reffered_by" placeholder="<?php echo e(__('Reffered By')); ?>" readonly>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"><?php echo e(__('First Name')); ?></label>
                                <input type="text" class="form-control" name="fname" value="<?php echo e(old('fname')); ?>"
                                    id="first_name" placeholder="<?php echo e(__('First Name')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"><?php echo e(__('Last Name')); ?></label>
                                <input type="text" class="form-control" name="lname" value="<?php echo e(old('lname')); ?>"
                                    id="last_name" placeholder="<?php echo e(__('Last name')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="username"><?php echo e(__('Username')); ?></label>
                                <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>"
                                    id="username" placeholder="<?php echo e(__('User Name')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"><?php echo e(__('Phone')); ?></label>
                                <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>"
                                    id="email" placeholder="<?php echo e(__('phone')); ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="formGroupExampleInput"><?php echo e(__('Email')); ?></label>
                                <input type="Email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                    id="email" placeholder="<?php echo e(__('Email')); ?>">
                            </div>

                            <div class="form-group col-md-6 mb-3 ">
                                <label><?php echo e(__('Country')); ?></label>
                                <input type="text" name="country" placeholder="Country" class="form-control" value="<?php echo e(old('country')); ?>">
                            </div>

                            <div class="col-md-6 mb-3">

                                <label><?php echo e(__('city')); ?></label>
                                <input type="text" name="city"  placeholder="city" class="form-control form_control" value="<?php echo e(old('city')); ?>">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label><?php echo e(__('zip')); ?></label>
                                <input type="text" name="zip" placeholder="Zip Code" class="form-control form_control" value="<?php echo e(old('zip')); ?>">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label><?php echo e(__('state')); ?></label>
                                <input type="text" name="state" placeholder="State" class="form-control form_control" value="<?php echo e(old('state')); ?>">

                            </div>


                            <div class="col-md-6">
                                <label for="formGroupExampleInput"><?php echo e(__('Pasword')); ?></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="<?php echo e(__('Password')); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"> <?php echo e(__('Confirm Pasword')); ?></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                            </div>
                            <div class="col-md-6">
                                <?php if(@$general->allow_recaptcha == 1): ?>
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                    <div class="g-recaptcha" data-sitekey="<?php echo e(@$general->recaptcha_key); ?>"
                                        data-callback="verifyCaptcha"></div>
                                    <div id="g-recaptcha-error"></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1"
                                        required>
                                    <label class="form-check-label" for="exampleCheck1"><?php echo e(__('I agree to the')); ?> <a
                                            href="<?php echo e(route('privacy')); ?>"
                                            class="color-change"><?php echo e(__('Privacy policy')); ?></a></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="cmn-btn w-100" type="submit"> <?php echo e(__('Register')); ?> </button>
                            </div>
                        </div>

                        <div class="row">



                        </div>
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
                    "<span class='text-danger'>{{__('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/auth/register.blade.php ENDPATH**/ ?>