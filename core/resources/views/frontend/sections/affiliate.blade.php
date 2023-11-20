@php
$content = content('affiliate.content');

$invest = \App\Models\Refferal::where('type', 'invest')->first();

@endphp


<section class="s-pt-100 s-pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <h2 class="section-title">{{ __(@$content->data->title) }}</h2>
                </div>
            </div>
        </div>
        <div class="referral-wrapper">
            @for ($i = 0; $i < count($invest->level ?? []); $i++)
                <div class="referral-box">
                    <span class="referral-box-step">{{ $i + 1 }}</span>
                    <span class="caption">{{ __('Commission') }}</span>
                    <h3 class="referral-box-percentage">{{ $invest->commision[$i] . '%' }}</h3>
                </div>
            @endfor

        </div>
    </div>
</section>
