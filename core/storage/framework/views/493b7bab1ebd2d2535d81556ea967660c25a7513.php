<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">
    <title>
        <?php if(@$general->sitename): ?>
            <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>
    <link href="<?php echo e(asset('asset/theme2/frontend/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme2/frontend/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme2/frontend/css/selectric.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme2/frontend/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme2/frontend/css/font-awsome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme2/frontend/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme2/frontend/css/iziToast.min.css')); ?>">
    <link href="<?php echo e(asset('asset/theme2/frontend/css/style.css')); ?>" rel="stylesheet">

    


    <?php echo $__env->yieldPushContent('style'); ?>

</head>

<body>

    <?php if(@$general->preloader_status): ?>
        <div id="preloader"></div>
    <?php endif; ?>



    <?php if(@$general->analytics_status): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(@$general->analytics_key); ?>"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "<?php echo e(@$general->analytics_key); ?>");
        </script>
    <?php endif; ?>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex flex-wrap align-items-center">
                <button type="button" class="sidebar-open-btn me-3">
                    <i class="bi bi-arrow-bar-left"></i>
                    <i class="bi bi-arrow-bar-right"></i>
                </button>
                <h1 class="logo me-auto me-lg-0 ">
                    <a href="<?php echo e(route('home')); ?>">
                        <?php if(@$general->logo): ?>
                            <img class="img-fluid rounded sm-device-img text-align"
                                src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="100%" alt="pp">
                        <?php else: ?>
                            <h4><?php echo e(__('No Logo Found')); ?></h4>
                        <?php endif; ?>
                    </a>
                </h1>
            </div>
            <div class="header-right d-flex">
                <select class="changeLang" aria-label="Default select example">
                    <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($top->short_code); ?>"
                            <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>>
                            <?php echo e(__(ucwords($top->name))); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="dropdown ms-3">
                    <button class="dropdown-toggle user-toggle-menu" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if(@Auth::user()->image): ?>
                            <img src="<?php echo e(getFile('user', @Auth::user()->image)); ?>" alt="pp">
                        <?php else: ?>
                            <img src="<?php echo e(asset('asset/theme2/frontend/img/user.png')); ?>" alt="pp">
                        <?php endif; ?>
                        <span class="text-white ms-2"><?php echo e(auth()->user()->full_name); ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo e(route('user.2fa')); ?>"><?php echo e(__('2FA')); ?></a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>"><?php echo e(__('Settings')); ?></a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"><?php echo e(__('Logout')); ?></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </header><!-- End Header -->


    <main id="main" class="dashboard-main">
        <section class="dashboard-section">

            <?php echo $__env->make(template().'layout.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content2'); ?>
        </section>
    </main>

    <?php
        $content = content('contact.content');
        $contentlink = content('footer.content');
        $footersociallink = element('footer.element');
        $serviceElements = element('service.element');
    ?>

    <script src="<?php echo e(asset('asset/theme2/frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/vendor/purecounter/purecounter.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/vendor/php-email-form/validate.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/js/selectric.min.js')); ?>"></script>

    <script src="<?php echo e(asset('asset/theme2/frontend/js/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/js/jquery.uploadPreview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme2/frontend/js/user_dashboard.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>
    <?php if(@$general->twak_allow): ?>
        <script type="text/javascript">
            'use strict'
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/<?php echo e(@$general->twak_key); ?>";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            "use strict";
            iziToast.error({
                message: "<?php echo e(session('error')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <script>
            "use strict";
            iziToast.success({
                message: "<?php echo e(session('success')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>

    <?php if(session()->has('notify')): ?>
        <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                "use strict";
                iziToast.<?php echo e($msg[0]); ?>({
                    message: "<?php echo e(trans($msg[1])); ?>",
                    position: "topRight"
                });
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(@$errors->any()): ?>
        <script>
            "use strict";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                iziToast.error({
                message: '<?php echo e(__($error)); ?>',
                position: "topRight"
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>


    <script>
        'use strict'
        var url = "<?php echo e(route('user.changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });

        // responsive menu slideing
        $(".d-sidebar-menu>li>a").on("click", function() {
            var element = $(this).parent("li");
            if (element.hasClass("open")) {
                element.removeClass("open");
                element.find("li").removeClass("open");
                element.find("ul").slideUp(500, "linear");
            } else {
                element.addClass("open");
                element.children("ul").slideDown();
                element.siblings("li").children("ul").slideUp();
                element.siblings("li").removeClass("open");
                element.siblings("li").find("li").removeClass("open");
                element.siblings("li").find("ul").slideUp();
            }
        });

        $('.sidebar-open-btn').on('click', function() {
            $(this).toggleClass('active');
            $('.d-sidebar').toggleClass('active');
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/layout/master2.blade.php ENDPATH**/ ?>