<?php
    $content = content('banner.content');
    $counter = element('banner.element');
?>

<section id="banner" class="banner-section">
    <div class="globe-el">
        <img src="<?php echo e(getFile('bg', 'globe2.png')); ?>" alt="globe elements">
    </div>
    <div class="banner-candle">
        <img src="<?php echo e(getFile('bg', 'banner-candle.png')); ?>" alt="globe elements">
    </div>

    <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
            <div class="col-xxl-6 col-xl-7 wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">
                <div class="banner-content text-lg-start text-center">
                    <h2 class="banner-title"> <?php echo e(__(@$content->data->title)); ?></h2>
                    <div class="banner-btn-group justify-content-lg-start justify-content-center mt-4">
                        <a href="<?php echo e(__(@$content->data->button_text_link)); ?>"
                            class="cmn-btn"><?php echo e(__(@$content->data->button_text)); ?></a>
                        <a href="<?php echo e(__(@$content->data->button_text_2_link)); ?>"
                            class="border-btn"><?php echo e(__(@$content->data->button_text_2)); ?></a>
                    </div>
                    <h5 class="mt-5"><?php echo e(__(@$content->data->cta_title)); ?></h5>
                    <div class="row mt-4 overview-wrapper">
                        <?php $__currentLoopData = $counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-4">
                                <div class="overview-box">
                                    <div class="overview-box-amount"><?php echo e(@$count->data->total); ?></div>
                                    <p><?php echo e(__(@$count->data->title)); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-5 d-xl-block d-none wow fadeInUp" data-wow-delay="0.7s"
                data-wow-duration="0.5s">
                <div class="banner-thumb">
                    <img src="<?php echo e(getFile('banner', @$content->data->backgroundimage)); ?>" alt="banner image">
                </div>
            </div>
        </div>
    </div>
</section>



<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener"
            target="_blank"><span class="blue-text">Markets today</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
            "symbols": [{
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500"
                },
                {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100"
                },
                {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR/USD"
                },
                {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                },
                {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                }
            ],
            "showSymbolLogo": true,
            "colorTheme": "dark",
            "isTransparent": false,
            "displayMode": "adaptive",
            "locale": "en"
        }
    </script>
</div>
<!-- TradingView Widget END -->



<div class="calculate-area">
    <div class="calculator"><img src="<?php echo e(getFile('elements', 'budget.png')); ?>" alt="image"></div>
    <div class="shape-1"><img src="<?php echo e(getFile('elements', 'cal-1.png')); ?>" alt="image"></div>
    <div class="shape-2"><img src="<?php echo e(getFile('elements', 'cal-2.png')); ?>" alt="image"></div>
    <div class="shape-3"><img src="<?php echo e(getFile('elements', 'cal-3.png')); ?>" alt="image"></div>
    <div class="shape-4"><img src="<?php echo e(getFile('elements', 'cal-4.png')); ?>" alt="image"></div>

    <div class="container">
        <div class="row gy-4 align-items-end">
            <div class="col-lg-4 col-md-6">
                <label class="mbl-h"><?php echo e(__('Amount')); ?></label>
                <input type="text" class="form-control" name="amount" id="amount"
                    placeholder="<?php echo e(__('Enter amount')); ?>">
            </div>
            <div class="col-lg-5 col-md-6">
                <label class="mbl-h"><?php echo e(__('Investment Plan')); ?></label>
                <select class="form-select" name="selectplan" id="plan">
                    <option selected disabled class="text-secondary"><?php echo e(__('Select a plan')); ?></option>
                    <?php $__empty_1 = true; $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->plan_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-lg-3">
                <a href="#" id="calculate-btn" class="cmn-btn w-100"> <?php echo e(__('Calculate Earning')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('style'); ?>
    <style>
        .tradingview-widget-container {
            height: 46px !important;
        }


        .tradingview-widget-copyright {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/sections/banner.blade.php ENDPATH**/ ?>