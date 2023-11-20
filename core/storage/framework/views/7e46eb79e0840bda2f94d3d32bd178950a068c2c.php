<nav class="navbar navbar-expand-lg main-navbar">
    
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li class="bars-icon-navbar">
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg ">
                    <i data-feather="menu"></i>
                </a>
            </li>
        </ul>
        <div class="search-element">
            <a href="<?php echo e(route('home')); ?>" target="_blank" class="gr-bg-1 text-white text-decoration-none p-2 rounded"><i
                    class="fas fa-globe-africa  mr-2"></i><span
                    class="font-weight-bold"><?php echo e(__('Visit Site')); ?></span></a>
        </div>
    </form>


    <ul class="navbar-nav navbar-right">


        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo e($pendingTicket->count() > 0 ? 'beep' : ''); ?>">
                <i data-feather="inbox"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header"><?php echo e(__('Notifications')); ?>


                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php $__empty_1 = true; $__currentLoopData = $pendingTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.ticket.pendingList')); ?>" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <?php echo e(__('You Have')); ?> <?php echo e($loop->iteration); ?> <?php echo e(__('Pending Ticket')); ?>

                                <div class="time text-primary"><?php echo e($pendingTicket->created_at->diffforhumans()); ?>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center"><?php echo e(__('There are no new notifications')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </li>




        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo e($pendingWithdraw->count() > 0 ? 'beep' : ''); ?>">
                <i data-feather="package"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header"><?php echo e(__('Notifications')); ?>


                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php $__empty_1 = true; $__currentLoopData = $pendingWithdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingWithdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.withdraw.pending')); ?>" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <?php echo e(__('You Have')); ?> <?php echo e($loop->iteration); ?> <?php echo e(__('Pending Withdraw')); ?>

                                <div class="time text-primary"><?php echo e($pendingWithdraw->created_at->diffforhumans()); ?>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center"><?php echo e(__('There are no new notifications')); ?></p>
                    <?php endif; ?>

                </div>

            </div>
        </li>

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo e($pendingpayment->count() > 0 ? 'beep' : ''); ?>">
                <i data-feather="file-text"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header"><?php echo e(__('Notifications')); ?>


                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php $__empty_1 = true; $__currentLoopData = $pendingpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.manual.status', 'pending')); ?>"
                            class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <?php echo e(__('You Have')); ?> <?php echo e($loop->iteration); ?> <?php echo e(__('Pending Payments')); ?>

                                <div class="time text-primary"><?php echo e($pendingpayment->created_at->diffforhumans()); ?>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center"><?php echo e(__('There are no new notifications')); ?></p>
                    <?php endif; ?>

                </div>

            </div>
        </li>

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo e($depositNotifications->count() > 0 ? 'beep' : ''); ?>">
                <i data-feather="table"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header"><?php echo e(__('Notifications')); ?>


                    <div class="float-right">
                        <a href="<?php echo e(route('admin.deposit.markNotification')); ?>"><?php echo e(__('Mark All As Read')); ?></a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">


                    <?php $__empty_1 = true; $__currentLoopData = $depositNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.user')); ?>" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <?php echo e($notification->data['name']); ?>

                                <div class="time text-primary"><?php echo e($notification->created_at->diffforhumans()); ?></div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center"><?php echo e(__('There are no new notifications')); ?></p>
                    <?php endif; ?>

                </div>

            </div>
        </li>


        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php echo e($notifications->count() > 0 ? 'beep' : ''); ?>">
                <i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header"><?php echo e(__('Notifications')); ?>

                    <div class="float-right">
                        <a href="<?php echo e(route('admin.markNotification')); ?>"><?php echo e(__('Mark All As Read')); ?></a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.user')); ?>" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <?php echo e($notification->data['name']); ?>

                                <div class="time text-primary"><?php echo e($notification->created_at->diffforhumans()); ?></div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center"><?php echo e(__('There are no new notifications')); ?></p>
                    <?php endif; ?>

                </div>

            </div>
        </li>


        <li class="mx-1 my-auto nav-item dropdown no-arrow">
            <select name="" id="" class="form-control selectric changeLang">
                <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($top->short_code); ?>"
                        <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>>
                        <?php echo e(__(ucwords($top->name))); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </li>



        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <div class="d-lg-inline-block text-capitalize"><?php echo e(__('Hi')); ?>,
                    <?php echo e(auth()->guard('admin')->user()->username); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> <?php echo e(__('Profile')); ?>

                </a>

                <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH /home/u935867359/domains/naeemraaz.com/public_html/core/resources/views/backend/layout/navbar.blade.php ENDPATH**/ ?>