<?php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

?>

<footer class="footer-section has-bg-img">
    <div class="footer-top">
        <div class="map-el">
            <img src="<?php echo e(getFile('footer', $contentlink->data->map_image)); ?>" alt="">
        </div>
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="footer-box">
                        <a href="<?php echo e(route('home')); ?>">
                            <h1>
                                <?php if(@$general->sitename): ?>
                                    <?php echo e(__(@$general->sitename)); ?>

                                <?php endif; ?>
                            </h1>
                        </a>
                        <p><?php echo e(__(@$contentlink->data->footer_short_description)); ?></p>
                        <div class="footer-payment">
                            <h5><?php echo e(__('Payment Methods')); ?></h5>
                            <img src="<?php echo e(getFile('footer', 'payment-method.png')); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-box">
                        <h4 class="title"><?php echo e(__('Useful Links')); ?></h4>
                        <ul class="footer-link-list">
                            <li> <a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><a href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e(__($page->name)); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-box">
                        <h4 class="title"><?php echo e(__('Our Services')); ?></h4>
                        <ul class="footer-link-list">
                            <?php $__currentLoopData = $serviceElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceelement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a
                                        href="<?php echo e(route('service', $serviceelement->data->slug)); ?>"><?php echo e(__(@$serviceelement->data->title)); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-box">
                        <h4 class="title"><?php echo e(__('Location')); ?></h4>
                        <p>
                            <?php echo e(__(@$content->data->location)); ?><br>
                            <strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e(__(@$content->data->phone)); ?><br>
                            <strong><?php echo e(__('Email')); ?>:</strong> <?php echo e(__(@$content->data->email)); ?><br>
                        </p>
                        <ul class="social-links">
                            <?php $__empty_1 = true; $__currentLoopData = $footersociallink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <a href="<?php echo e(__(@$item->data->social_link)); ?>" target="_blank"
                                        class="twitter"><i class="<?php echo e(@$item->data->social_icon); ?>"></i></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="text-center mb-0">
                <?php if(@$general->copyright): ?>
                    <?php echo e(__(@$general->copyright)); ?>

                <?php endif; ?>
            </p>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>