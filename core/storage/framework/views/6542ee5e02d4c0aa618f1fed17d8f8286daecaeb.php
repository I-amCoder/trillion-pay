<?php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

?>

<footer class="footer-section has-bg-img">
    <div class="footer-top">
        <div class="map-el">
            <img src="<?php echo e(getFile('footer', @$contentlink->data->map_image)); ?>" alt="">
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
                            <img src="<?php echo e(getFile('footer', @$contentlink->data->payment_image)); ?>" alt="">
                        </div>
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
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/layout/footer.blade.php ENDPATH**/ ?>