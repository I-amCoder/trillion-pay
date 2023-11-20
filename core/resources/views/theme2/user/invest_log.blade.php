@extends(template().'layout.master2')


@section('content2')
    <script>
        'use strict'

        function getCountDown(elementId, seconds) {
            var times = seconds;
            var x = setInterval(function() {
                var distance = times * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "COMPLETE";
                }
                times--;
            }, 1000);
        }
    </script>

    <div class="dashboard-body-part">

        <div class="card-body d-flex justify-content-between flex-wrap">
            <h3>Busines Pack Investments</h3>
            <form action="" method="get" class=" d-inline-flex">
                <input type="date" class="form-control me-3" placeholder="Search User" name="pack_date">
                <button type="submit" class="cmn-btn">{{__('Search')}}</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Plan') }}</th>

                        <th>{{ __('Gateway') }}</th>
                        <th>{{ __('Amount') }}</th>
                        <th>{{ __('Payment Date') }}</th>
                        <th>{{ __('Upcoming Payment') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($business_pack_invests as $key => $transaction)
                        <tr>

                            <td data-caption="{{ __('User') }}">{{ @$transaction->user->fname . ' ' . @$transaction->user->lname }}</td>
                            <td>{{ $transaction->plan->plan_name??"" }}</td>

                            <td data-caption="{{ __('Gateway') }}">
                                @if ($transaction->deposit->gateway_id == 0)
                                    {{ __('Invest Using Balance') }}
                                @else
                                    {{ @$transaction->deposit->gateway->gateway_name ?? 'Account Transfer' }}
                                @endif
                            </td>
                            <td data-caption="{{ __('Amount') }}">{{ number_format($transaction->amount,3) }}</td>

                            <td data-caption="{{ __('Payment Date') }}">{{ $transaction->created_at->format('Y-m-d') }}</td>
                            <td data-caption="{{ __('Upcoming Payment') }}">
                                <p id="pack_count_{{ $loop->iteration }}" class="mb-2"></p>
                                <script>
                                    getCountDown("pack_count_{{ $loop->iteration }}", "{{ now()->diffInSeconds($transaction->next_payment_time) }}")
                                </script>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">
                                {{ __('No data Found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($business_pack_invests->hasPages())
                {{ $business_pack_invests->links() }}
            @endif

        </div>
        <hr>
        <div class="card-body d-flex justify-content-between flex-wrap">
            <h3>Busines Value Investments</h3>
            <form action="" method="get" class=" d-inline-flex">
                <input type="date" class="form-control me-3" placeholder="Search User" name="value_date">
                <button type="submit" class="cmn-btn">{{__('Search')}}</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Plan') }}</th>
                        <th>{{ __('Self Profit') }}</th>
                        <th>{{ __('Sponser Profit') }}</th>
                        <th>{{ __('Gateway') }}</th>
                        <th>{{ __('Amount') }}</th>
                        <th>{{ __('Payment Date') }}</th>
                        <th>{{ __('Upcoming Payment') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($business_value_invests as $key => $transaction)
                        <tr>

                            <td data-caption="{{ __('User') }}">{{ @$transaction->user->fname . ' ' . @$transaction->user->lname }}</td>
                            <td>{{ $transaction->plan->plan_name??"" }}</td>
                            <td>{{ number_format($transaction->self_profit,3) }}%</td>
                            <td>{{ number_format($transaction->sponser_profit,3) }}%</td>
                            <td data-caption="{{ __('Gateway') }}">
                                @if ($transaction->deposit->gateway_id == 0)
                                    {{ __('Invest Using Balance') }}
                                @else
                                    {{ @$transaction->deposit->gateway->gateway_name ?? 'Account Transfer' }}
                                @endif
                            </td>
                            <td data-caption="{{ __('Amount') }}">{{ number_format($transaction->amount,3) }}</td>

                            <td data-caption="{{ __('Payment Date') }}">{{ $transaction->created_at->format('Y-m-d') }}</td>
                            <td data-caption="{{ __('Upcoming Payment') }}">
                                <p id="value_count_{{ $loop->iteration }}" class="mb-2"></p>
                                <script>
                                    getCountDown("value_count_{{ $loop->iteration }}", "{{ now()->diffInSeconds($transaction->next_payment_time) }}")
                                </script>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">
                                {{ __('No data Found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($business_value_invests->hasPages())
                {{ $business_value_invests->links() }}
            @endif

        </div>
    </div>
@endsection

