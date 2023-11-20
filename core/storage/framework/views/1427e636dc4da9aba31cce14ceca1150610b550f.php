<?php
$content = content('testimonial.content');
$elements = element('testimonial.element');

?>

<section class="s-pt-100 s-pb-100 section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2 class="section-title"><?php echo e(__(@$content->data->title)); ?></h2>
                </div>
            </div>
        </div>

        <div class="testimonial-slider">
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="single-slide">
                    <div class="testimonial-box">
                        <div class="content">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?php echo e(@$element->data->answer); ?>

                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                        <div class="client">
                            <div class="thumb">
                                <img src="<?php echo e(getFile('testimonial', @$element->data->image)); ?>"
                                    class="testimonial-img" alt="">
                            </div>
                            <h3 class="title"><?php echo e(@$element->data->client_name); ?></h3>
                            <span class="designation"><?php echo e(@$element->data->designation); ?></span>
                        </div>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Hyip_update_7.4\core\resources\views/frontend/sections/testimonial.blade.php ENDPATH**/ ?>