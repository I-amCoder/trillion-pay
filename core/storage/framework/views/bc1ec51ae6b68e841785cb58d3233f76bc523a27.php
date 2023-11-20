<?php
$content = content('feature.content');
$elements = element('feature.element')->take(6);
?>

<section class="s-pt-100 s-pb-100">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2 class="section-title"><?php echo e(__(@$content->data->title)); ?></h2>
                </div>
            </div>
        </div>

        <div class="row gy-4 feature-wrapper">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="icon">
                            <div class="icon-line">
                                <span class="icon-line-dot icon-line-dot-one"></span>
                                <span class="icon-line-dot icon-line-dot-two"></span>
                                <span class="icon-line-dot icon-line-dot-three"></span>
                            </div>
                            <div class="icon-inner">

                                <i class="<?php echo e(@$element->data->card_icon); ?>"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title mb-3"><?php echo e(__(@$element->data->card_title)); ?></h3>
                            <p class="mb-0"><?php echo e(__(@$element->data->card_description)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><!-- End Services Section -->
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/sections/feature.blade.php ENDPATH**/ ?>