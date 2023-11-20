<div class="d-sidebar">
    <ul class="d-sidebar-menu">
      <li class="<?php echo e(singleMenu('user.dashboard')); ?>">
        <a href="<?php echo e(route('user.dashboard')); ?>"><i data-feather="home"></i> <?php echo e(__('Dashboard')); ?></a>
      </li>

      <li class="has_submenu <?php echo e(arrayMenu(['user.investmentplan','user.invest.log'])); ?>">
        <a href="#0"><i data-feather="zap"></i> <?php echo e(__('Investment')); ?></a>
        <ul class="submenu">
          <li class="<?php echo e(singleMenu('user.investmentplan')); ?>">
            <a href="<?php echo e(route('user.investmentplan')); ?>"><i data-feather="chevrons-right"></i></i> <?php echo e(__('Investment Plans')); ?></a>
          </li>
          <li class="<?php echo e(singleMenu('user.invest.log')); ?>">
            <a href="<?php echo e(route('user.invest.log')); ?>"><i data-feather="chevrons-right"></i> <?php echo e(__('Invest Log')); ?></a>
          </li>
        </ul> 
      </li>

      <li class="has_submenu <?php echo e(arrayMenu(['user.deposit','user.deposit.log'])); ?>">
        <a href="#0"><i data-feather="briefcase"></i> <?php echo e(__('Deposit')); ?></a>
        <ul class="submenu">
          <li class="<?php echo e(singleMenu('user.deposit')); ?>">
            <a href="<?php echo e(route('user.deposit')); ?>"><i data-feather="chevrons-right"></i> <?php echo e(__('Deposit')); ?></a>
          </li>
          <li class="<?php echo e(singleMenu('user.deposit.log')); ?>">
            <a href="<?php echo e(route('user.deposit.log')); ?>"><i data-feather="chevrons-right"></i> <?php echo e(__('Deposit Log')); ?></a>
          </li>
        </ul>
      </li>

      <li class="has_submenu <?php echo e(arrayMenu(['user.withdraw','user.withdraw.*'])); ?>">
        <a href="#0"><i data-feather="credit-card"></i> <?php echo e(__('Withdraw')); ?></a>
        <ul class="submenu">
          <li class="<?php echo e(singleMenu('user.withdraw')); ?>">
            <a href="<?php echo e(route('user.withdraw')); ?>"><i data-feather="chevrons-right"></i> <?php echo e(__('Withdraw')); ?></a>
          </li>
          <li class="<?php echo e(singleMenu('user.withdraw.*')); ?>">
            <a href="<?php echo e(route('user.withdraw.all')); ?>"><i data-feather="chevrons-right"></i> <?php echo e(__('Withdraw Log')); ?></a>
          </li>
        </ul>
      </li>

      <li class="<?php echo e(singleMenu('user.transfer_money')); ?>">
        <a href="<?php echo e(route('user.transfer_money')); ?>"><i data-feather="repeat"></i> <?php echo e(__('Transfer Money')); ?></a>
      </li>

       <li class="<?php echo e(activeMenu(route('user.money.log'))); ?>">
            <a href="<?php echo e(route('user.money.log')); ?>">
            <i data-feather="file-text"></i>
                <?php echo e(__('Money Transfer Log')); ?>

            </a>
        </li>


      <li class="<?php echo e(singleMenu('user.interest.log')); ?>">
        <a href="<?php echo e(route('user.interest.log')); ?>"><i data-feather="file-text"></i> <?php echo e(__('Interest Log')); ?></a>
      </li>
      <li class="<?php echo e(singleMenu('user.transaction.log')); ?>">
        <a href="<?php echo e(route('user.transaction.log')); ?>"><i data-feather="file-text"></i> <?php echo e(__('Transaction Log')); ?></a>
      </li>
      <li class="<?php echo e(singleMenu('user.commision')); ?>">
        <a href="<?php echo e(route('user.commision')); ?>"><i data-feather="file-text"></i> <?php echo e(__('Refferal Log')); ?></a>
      </li>
      
      <li class="<?php echo e(singleMenu('user.2fa')); ?>">
        <a href="<?php echo e(route('user.2fa')); ?>"><i data-feather="shield"></i> <?php echo e(__('2FA')); ?></a>
      </li>
      <li class="<?php echo e(singleMenu('user.ticket.index')); ?>">
        <a href="<?php echo e(route('user.ticket.index')); ?>"><i data-feather="life-buoy"></i> <?php echo e(__('Support')); ?></a>
      </li>
      <li>
        <a href="<?php echo e(route('user.logout')); ?>"><i data-feather="log-out"></i> <?php echo e(__('Logout')); ?></a>
      </li>
    </ul>
    <div class="d-plan-notice mt-4 mx-3">
        <p class="mb-0"><?php echo e(__('Your Current Plan')); ?>

            -<?php echo e(isset($currentPlan->plan->plan_name) ? $currentPlan->plan->plan_name : 'N/A'); ?></p>
        <a href="<?php echo e(route('user.investmentplan')); ?>"><?php echo e(__('Update Plan')); ?> <i class="fas fa-arrow-up"></i></a>
    </div>
</div>


<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu-wrapper">
  <ul class="mobile-bottom-menu">
    <li>
      <a href="<?php echo e(route('user.deposit')); ?>" class="<?php echo e(activeMenu(route('user.deposit'))); ?>">
        <i class="bi bi-wallet2"></i>
        <span><?php echo e(__('Deposit')); ?></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('user.investmentplan')); ?>" class="<?php echo e(activeMenu(route('user.investmentplan'))); ?>">
        <i class="bi bi-piggy-bank"></i>
        <span><?php echo e(__('My Invest')); ?></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('user.dashboard')); ?>" class="<?php echo e(activeMenu(route('user.dashboard'))); ?>">
        <i class="bi bi-house-door"></i>
        <span><?php echo e(__('Home')); ?></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('user.withdraw')); ?>" class="<?php echo e(activeMenu(route('user.withdraw'))); ?>">
        <i class="bi bi-cash-coin"></i>
        <span><?php echo e(__('Withdraw')); ?></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(route('user.transfer_money')); ?>" class="<?php echo e(activeMenu(route('user.transfer_money'))); ?>">
        <i class="bi bi-shuffle"></i>
        <span><?php echo e(__('Transfer')); ?></span>
      </a>
    </li>
  </ul>
</div>
<!-- mobile bottom menu end --><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme3/layout/user_sidebar.blade.php ENDPATH**/ ?>