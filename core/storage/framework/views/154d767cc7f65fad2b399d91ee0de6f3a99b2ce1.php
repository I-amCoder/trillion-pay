<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

        <div class="logo me-auto me-lg-0"><a href="<?php echo e(route('home')); ?>">
                <span>

                    <?php if(@$general->logo): ?>
                        <img class="img-fluid rounded sm-device-img text-align"
                            src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="100%" alt="pp">
                    <?php else: ?>
                        <?php echo e(__('No Logo Found')); ?>

                    <?php endif; ?>

                </span>
            </a>
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"><a class="nav-link"
                        href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                <li><a class="nav-link" href="<?php echo e(route('investmentplan')); ?>"><?php echo e(__('Investment Plans')); ?></a>
                </li>

                <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li><a class="nav-link" href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e(__($page->name)); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
                <li><a class="nav-link" href="<?php echo e(route('allblog')); ?>"><?php echo e(__('Blog')); ?></a></li>

                

                <li class="d-md-block d-lg-none d-block ">
                    <?php if(Auth::user()): ?>
                        <a class="nav-link" href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a>
                    <?php endif; ?>
                </li>


                <li class=" d-sm-block d-md-block d-lg-none">
                    <select class="custom-select-form selectric ms-3 rounded changeLang nav-link scrollto"
                        aria-label="Default select example">
                        <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($top->short_code); ?>"
                                <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>>
                                <?php echo e(__(ucwords($top->name))); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </li>

                

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="header-right d-flex d-none  d-md-none d-lg-block">
            <?php if(Auth::user()): ?>
                <a href="<?php echo e(route('user.dashboard')); ?>" class="btn-border btn-sm me-3"><?php echo e(__('Dashboard')); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('user.login')); ?>" class="btn-border btn-sm me-3"><?php echo e(__('Login')); ?></a>
            <?php endif; ?>
            <select class="changeLang" aria-label="Default select example">
                <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($top->short_code); ?>"
                        <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>>
                        <?php echo e(__(ucwords($top->name))); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</header>
<?php /**PATH /home/u935867359/domains/naeemraaz.com/public_html/core/resources/views/frontend/layout/header.blade.php ENDPATH**/ ?>