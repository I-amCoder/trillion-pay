<?php
    $contact = content('contact.content');
    $footersociallink = element('footer.element');
?>

<!-- header-section start  -->
<header class="header ">
  <div class="header-top  text-dark" style="background: rgb(3, 162, 215)">
    <div class="container">
      <div class="row align-items-center gy-2">
        <div class="col-lg-8 col-md-7">
          <ul class="header-top-info-list text-light">
            
            <li>
              <a href="mailto:<?php echo e(@$contact->data->email); ?>"><i class="fas fa-envelope"></i> <?php echo e(@$contact->data->email); ?></a>
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center">
              <ul class="social-list me-3">
                <?php $__empty_1 = true; $__currentLoopData = $footersociallink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                        <a href="<?php echo e(__(@$item->data->social_link)); ?>" target="_blank"><i class="<?php echo e(@$item->data->social_icon); ?>"></i></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
              </ul>
              
              <div id="google_translate_element"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-bottom" style="background: rgb(3, 162, 215)">
    <div class="container">
      <nav class="navbar navbar-expand-xl p-0 align-items-center">
        <a class="site-logo site-title" href="<?php echo e(route('home')); ?>">
            <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="100%" alt="pp">
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
        </button>
        <div class="collapse navbar-collapse mt-lg-0 mt-3" id="mainNavbar">
          <ul class="nav navbar-nav main-menu ms-auto">
            <li class="nav-item"><a href="#banner" class="nav-link active"><?php echo e(__('Home')); ?></a></li>
            <li class="nav-item"><a href="#about" class="nav-link"><?php echo e(__('About')); ?></a></li>
            <li class="nav-item"><a href="#why-choose" class="nav-link"><?php echo e(__('Why Choose')); ?></a></li>
            <li class="nav-item"><a href="#how-start" class="nav-link"><?php echo e(__('How Work')); ?></a></li>
            <li class="account-btn">
              <?php if(Auth::user()): ?>
                  <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link"><?php echo e(__('Dashboard')); ?></a>
              <?php else: ?>
                  
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div><!-- header__bottom end -->
</header>
<!-- header-section end  -->
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/layout/header.blade.php ENDPATH**/ ?>