<?php
$investor = content('investor.content');

$topInvestor = App\Models\Payment::where('payment_status',1)->groupBy('user_id')
    ->selectRaw('sum(amount) as sum, user_id')
    ->orderBy('sum', 'desc')
    ->get()
    ->map(function ($a) {
        return App\Models\User::find($a->user_id);
    });

?>

<!-- investor section start -->
<section id="investor" class="investor-section s-pt-100 s-pb-100 section-bg">
    <div class="investor-el">
        <img src="<?php echo e(getFile('investor', @$investor->data->image)); ?>" alt="image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-lg-5 text-md-start text-center">
                <div class="section-header">
                    <h2 class="section-title"><?php echo e(@$investor->data->title); ?></h2>
                </div>
            </div>
        </div>
        <div class="investor-slider wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
            <?php $__currentLoopData = $topInvestor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-slide">
                    <div class="investor-item">
                        <div class="thumb"
                            style="background-image: url('<?php echo e(getFile('user', @$top->image)); ?>');">
                        </div>
                        <div class="content">
                            <h4><?php echo e($top->full_name); ?></h4>
                            <p><?php echo e(__('Invest Amount')); ?> <span class="site-color"><?php echo e(number_format($top->payments()->where('payment_status',1)->sum('amount'),2) .' '. $general->site_currency); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<!-- investor section end --><?php /**PATH /home/u935867359/domains/naeemraaz.com/public_html/core/resources/views/frontend/sections/investor.blade.php ENDPATH**/ ?>