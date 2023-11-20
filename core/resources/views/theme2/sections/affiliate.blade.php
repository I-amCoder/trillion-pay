@php
$content = content('affiliate.content');

$invest = \App\Models\Refferal::where('type', 'invest')->first();

@endphp

<section class="s-pt-100 s-pb-100">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-xl-7 col-lg-8">
        <div class="section-top text-lg-start text-center">
            <h2 class="section-title">{{ __(@$content->data->title) }}</h2>
        </div>
        <div class="row gy-5">
            @php
            $counter = 0;
        @endphp
            @for ($i = 0; $i < count($invest->level ?? []); $i++)
            <div class="col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
            <div class="referral-item">
                <div class="rate">
                    <h3 class="rate-amount mb-0">{{ $invest->commision[$i]}}%</h3>
                </div>
                <div class="content">
                    <h5 class="site-color mb-1">{{__('Level')}}</h5>
                    <h5 class="mb-0">{{++$counter}}</h5>
                </div>
            </div>
            </div>
            @endfor
        </div><!-- row end -->
        </div>
        <div class="col-xl-5 col-lg-4 d-lg-block d-none">
            <div class="referral-thumb text-center">
                <img src="{{ getFile('bg', 'affiliate.png') }}" alt="image">
            </div>
        </div>
    </div>
    </div>
</section>