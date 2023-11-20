<?php
$content = content('faq.content');
$elements = element('faq.element');
?>

<section class="s-pt-100 s-pb-100 section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2 class="section-title"><?php echo e(@$content->data->title); ?></h2>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?php echo e($loop->iteration); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo e($loop->iteration); ?>" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <?php echo e(@$item->data->question); ?>

                                </button>
                            </h2>
                            <div id="collapse<?php echo e($loop->iteration); ?>" class="accordion-collapse collapse"
                                aria-labelledby="heading-<?php echo e($loop->iteration); ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> <?php echo e(@$item->data->answer); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH /home/u935867359/domains/naeemraaz.com/public_html/core/resources/views/frontend/sections/faq.blade.php ENDPATH**/ ?>