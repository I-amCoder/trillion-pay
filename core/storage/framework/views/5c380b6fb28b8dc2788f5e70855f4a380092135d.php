<?php
$content = content('testimonial.content');
$elements = element('testimonial.element');

?>

<!-- testimonial section start -->
<section id="testimonial" class="testimonial-section s-pt-100 s-pb-100 section-bg">
    <div class="testimoinal-el">
    <img src="<?php echo e(getFile('bg', 'globe2.png')); ?>" alt="image">
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
        <div class="section-top text-center">
            <h2 class="section-title"><?php echo e(__(@$content->data->title)); ?></h2>
            <p><?php echo e(__(@$content->data->sub_title)); ?></p>
        </div>
        </div>
    </div><!-- row end -->
    <div class="testimonial-slider wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
        <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="single-slide">
                <div class="testimonial-item">
                <div class="ratings mb-2">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                </div>
                <p class="mb-4"><?php echo e(@$element->data->answer); ?></p>
                <hr>
                <div class="testimonial-client mt-4">
                    <div class="thumb">
                    <img src="<?php echo e(getFile('testimonial', @$element->data->image)); ?>" alt="image">
                    </div>
                    <div class="content">
                        <h5 class="name p-0 mb-0"><?php echo e(@$element->data->client_name); ?></h5>
                        <span><?php echo e(@$element->data->designation); ?></span>
                    </div>
                </div>
                </div>
            </div><!-- single-slide end -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </div>
    </div>
</section>
<!-- testimonial section end --><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/sections/testimonial.blade.php ENDPATH**/ ?>