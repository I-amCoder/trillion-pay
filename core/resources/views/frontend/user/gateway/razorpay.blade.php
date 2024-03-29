@extends(template().'layout.master2')

@section('content2')
    <div class="dashboard-body-part">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="mb-0">{{ __('Payment Preview') }}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @if(!(session('type') == 'deposit'))
                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Plan Name') }}:</span>

                        <span>{{ $deposit->plan->plan_name }}</span>

                    </li>
                    @endif
                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Gateway Name') }}:</span>

                        <span>{{ $deposit->gateway->gateway_name }}</span>

                    </li>
                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Amount') }}:</span>
                        <span>{{ number_format($deposit->amount, 2) }}</span>
                    </li>

                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Charge') }}:</span>
                        <span>{{ number_format($deposit->charge, 2) }}</span>
                    </li>


                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Conversion Rate') }}:</span>
                        <span>{{ '1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2) }}</span>
                    </li>



                    <li class="list-group-item text-light  d-flex justify-content-between">
                        <span>{{ __('Total Payable Amount') }}:</span>
                        <span>{{ number_format($deposit->final_amount, 2) }}</span>
                    </li>
                </ul>
                <div class="text-end mt-3">
                    <form role="form" action="" method="POST">
                        @csrf
                        <input type="hidden" name="amount" class="form-control amount"
                                placeholder="Enter Amount"
                                value="{{ number_format($deposit->final_amount, 2,'.', '') }}">
                        <button id="rzp-button1"
                            data-href="{{ route('user.razor.success', $gateway->id) }}"
                            class="cmn-btn">{{ __('Pay Now') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
        session()->forget('transaction_id');
        session()->put('transaction_id' , $deposit->transaction_id)
    @endphp
@endsection



@push('script')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        'use strict'
        $('body').on('click', '#rzp-button1', function(e) {
            e.preventDefault();
            var amount = $('.amount').val();
            var total_amount = amount * 100;
            let url = $(this).data('href');
            var options = {
                "key": "{{ $gateway->gateway_parameters->razor_key }}",
                "amount": total_amount,
                "currency": "{{ $gateway->gateway_parameters->gateway_currency }}",
                "name": "{{ @$general->site_name }}",
                "description": "Transaction",
                "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
                "order_id": "",
                "callback_url": "{{route('user.razor.success')}}",
                "prefill": {
                    "name": "{{auth()->user()->username}}",
                    "email": "{{auth()->user()->email}}",
                    "contact": "{{auth()->user()->phone}}"
                },
                "notes": {
                    "address": "test test"
                },
                "theme": {
                    "color": "#F7931A"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>
@endpush
