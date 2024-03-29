<?php
$content = content('affiliate.content');

$invest = \App\Models\Refferal::where('type', 'invest')->first();

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
        <div class="referral-wrapper">
            <?php for($i = 0; $i < count($invest->level ?? []); $i++): ?>
                <div class="referral-box">
                    <span class="referral-box-step"><?php echo e($i + 1); ?></span>
                    <span class="caption"><?php echo e(__('Commission')); ?></span>
                    <h3 class="referral-box-percentage"><?php echo e($invest->commision[$i] . '%'); ?></h3>
                </div>
            <?php endfor; ?>

        </div>
    </div>
</section>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/frontend/sections/affiliate.blade.php ENDPATH**/ ?>