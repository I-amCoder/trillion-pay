@php
$content = content('affiliate.content');

$invest = \App\Models\Refferal::where('type', 'invest')->first();

@endphp

<section class="referral-section" style="background-image: url('{{ asset('asset/theme3/images/bg/bg9.jpg') }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 text-lg-start text-center">
                <h2 class="section-title">{{ __(@$content->data->title) }}</h2>
            </div>
            <div class="col-xl-8 mt-xl-0 mt-4">
                <div class="referral-wrapper">
                    @for ($i = 0; $i < count($invest->level ?? []); $i++)
                    <div class="referral-item">
                        <img src="{{ asset('asset/theme3/images/shield-ref.png') }}" alt="image">
                        <div class="referral-content">
                        <div class="referral-amount">{{ $invest->commision[$i] . '%' }}</div>
                        <span class="referral-caption">{{ __('Level') }} {{ $i + 1 }}</span>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>