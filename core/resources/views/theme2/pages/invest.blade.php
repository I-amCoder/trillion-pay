@extends(template() . 'layout.master2')

@section('content2')
    <div class="dashboard-body-part">
        <div class="section-title text-uppercase">{{ str_replace('_', ' ', request('wallet')) }} Plans</div>
        <div class="row gy-4">
            @forelse ($plans as $plan)
                <div class="col-xxl-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                    <div class="pricing-item bg-secondary">
                        <div class="top-part">
                            <div class="icon">
                                <i class="las la-gem"></i>
                            </div>
                            <div class="plan-name">
                                <span>{{ $plan->plan_name }}</span>
                            </div>
                            @if ($plan->amount_type == 0)
                                <h4 class="plan-price">
                                    {{ __('Min') }}
                                    {{ number_format($plan->minimum_amount, 2) }} <sub>/
                                        {{ @$general->site_currency }}</sub>
                                </h4>
                                <h4 class="plan-price">
                                    {{ __('Max') }}
                                    {{ number_format($plan->maximum_amount, 2) }} <sub>/
                                        {{ @$general->site_currency }}</sub>
                                </h4>
                            @else
                                <h4 class="plan-price">
                                    {{ number_format($plan->amount, 2) }} <sub>/ {{ @$general->site_currency }}</sub>
                                </h4>
                            @endif

                            <ul class="check-list">
                                <li>{{ __('Every') }} {{ $plan->time->name }}</li>
                                <li>{{ __('Return Amount ') }}{{ number_format($plan->return_interest, 2) }}
                                    @if ($plan->interest_status == 'percentage')
                                        {{ '%' }}
                                    @else
                                        {{ @$general->site_currency }}
                                    @endif
                                </li>
                                <li>
                                    @if ($plan->return_for == 1)
                                        {{ __('For') }} {{ $plan->how_many_time }}
                                        {{ __('Times') }}
                                    @else
                                        {{ __('Lifetime') }}
                                    @endif
                                </li>
                                @if ($plan->capital_back == 1)
                                    <li>{{ __('Capital Back') }} {{ __('YES') }}</li>
                                @else
                                    <li>{{ __('Capital Back') }} {{ __('NO') }}</li>
                                @endif


                            </ul>
                        </div>
                        <div class="bottom-part">
                            <a class="cmn-btn w-100 mb-3"
                                href="{{ route('user.gateways', $plan->id) }}">{{ __('Invest Now') }}</a>
                            <button class="cmn-btn w-100 balance mt-3" data-plan="{{ $plan }}"
                                data-url="">{{ __('Invest Using Balance') }}</button>
                        </div>
                    </div>
                </div>

            @empty
            @endforelse
        </div>
    </div>


    <div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.paynow', $gateway->id) }}" method="post">
                @csrf
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Invest Using Balance '. number_format(auth()->user()->balance,2)) }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid text-white ">
                            <div class="form-group mb-3">
                                <label for="">{{ __('Invest Amount') }}</label>
                                <input type="text" name="amount" class="form-control">
                                <input type="hidden" name="plan_id" class="form-control">
                                <input type="hidden" name="wallet_type">
                                <input type="hidden" name="type" value="deposit">
                                <input type="hidden" name="use_current_balance" value="on">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn cmn-btn">{{ __('Invest Now') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            'use strict'

            $('.balance').on('click', function() {
                const modal = $('#invest');
                const plan = $(this).data('plan');
                modal.find('input[name=plan_id]').val(plan.id);
                modal.find('input[name=wallet_type]').val(plan.plan_wallet);
                modal.find('.sponser-div').remove();

                if (plan.plan_wallet == "business_value_wallets") {
                    modal.find('.container-fluid').append(`<div  class="sponser-div form-group">
                                <label for="">Sponser Profit %</label>
                                <input type="text" name="sponser_profit" class="form-control">
                            </div>`);
                }
                modal.modal('show')
            })
        })
    </script>
@endpush
