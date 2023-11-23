<?php
$content = content('affiliate.content');

$invest = \App\Models\Refferal::where('type', 'invest')->first();

?>

<section class="s-pt-100 s-pb-100">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-xl-7 col-lg-8">
        <div class="section-top text-lg-start text-center">
            <h2 class="section-title"><?php echo e(__(@$content->data->title)); ?></h2>
        </div>
        <div class="row gy-5">
            <?php
            $counter = 0;
        ?>
            <?php for($i = 0; $i < count($invest->level ?? []); $i++): ?>
            <div class="col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
            <div class="referral-item">
                <div class="rate">
                    <h3 class="rate-amount mb-0"><?php echo e($invest->commision[$i]); ?>%</h3>
                </div>
                <div class="content">
                    <h5 class="site-color mb-1"><?php echo e(__('Level')); ?></h5>
                    <h5 class="mb-0"><?php echo e(++$counter); ?></h5>
                </div>
            </div>
            </div>
            <?php endfor; ?>
        </div><!-- row end -->
        </div>
        <div class="col-xl-5 col-lg-4 d-lg-block d-none">
            <div class="referral-thumb text-center">
                <img src="<?php echo e(getFile('bg', 'affiliate.png')); ?>" alt="image">
            </div>
        </div>
    </div>
    </div>
</section><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/sections/affiliate.blade.php ENDPATH**/ ?>