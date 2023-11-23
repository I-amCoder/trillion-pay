<?php
$content = content('faq.content');
$elements = element('faq.element');
?>

<!-- faq section start -->
<section id="faq" class="faq-section section-bg s-pt-100 s-pb-100">
      <div class="faq-el">
        <img src="<?php echo e(getFile('faq', 'faq.png')); ?>" alt="image">
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-top text-center">
              <h2 class="section-title"><?php echo e(@$content->data->title); ?></h2>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row">
          <div class="col-lg-12">
            <div class="faq-wrapper wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="faq-single">
                    <div class="faq-single-header">
                    <h4 class="title"><?php echo e(@$item->data->question); ?></h4>
                    </div>
                    <div class="faq-single-body">
                    <p><?php echo e(@$item->data->answer); ?></p>
                    </div>
                </div><!-- faq-single end -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- faq section end --><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/sections/faq.blade.php ENDPATH**/ ?>