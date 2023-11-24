@extends(template() . 'layout.master2')


@section('content2')
    <div class="dashboard-body-part">
        <div class="card-body text-end">
            <form action="" method="get" class="d-inline-flex">

                <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                <button type="submit" class="cmn-btn">{{ __('Search') }}</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr class="bg-yellow">
                        <th>{{ __('Plan Name') }}</th>
                        <th>{{ __('Interest') }}</th>
                        <th>{{ __('Wallet') }}</th>
                        <th>{{ __('Invest Amount') }}</th>
                        <th>{{ __('Payment Date') }}</th>
                        <th>{{ __('Next Payment Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($interestLogs as $log)
                        @if ($log->type == 'business_pack_wallets')
                            <tr>
                                <td data-caption="{{ __('Plan Name') }}">{{ $log->business_pack_payment->plan->plan_name }}
                                </td>

                                <td data-caption="{{ __('Interest') }}">{{ number_format($log->interest_amount, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td>Business Pack Wallet</td>
                                <td data-caption="{{ __('Invest Amount') }}">
                                    {{ number_format($log->business_pack_payment->amount ?? 0, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td data-caption="{{ __('Payment Date') }}">{{ $log->created_at }}</td>
                                <td data-caption="{{ __('Next Payment Date') }}">
                                    {{ isset($log->business_pack_payment->next_payment_time) ? $log->business_pack_payment->next_payment_time : 'Plan Expired' }}
                                </td>
                            </tr>
                        @endif
                        @if ($log->type == 'business_value_wallets')
                            <tr>
                                <td data-caption="{{ __('Plan Name') }}">
                                    {{ $log->business_value_payment->plan->plan_name }}</td>
                                <td data-caption="{{ __('Interest') }}">{{ number_format($log->interest_amount, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td>Business Value Wallet</td>
                                <td data-caption="{{ __('Invest Amount') }}">
                                    {{ number_format($log->business_value_payment->amount ?? 0, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td data-caption="{{ __('Payment Date') }}">{{ $log->created_at }}</td>
                                <td data-caption="{{ __('Next Payment Date') }}">
                                    {{ isset($log->business_value_payment->next_payment_time) ? $log->business_value_payment->next_payment_time : 'Plan Expired' }}
                                </td>
                            </tr>
                        @endif
                        @if ($log->type == 'current_wallets')
                            <tr>
                                <td data-caption="{{ __('Plan Name') }}">Deposit</td>
                                <td data-caption="{{ __('Interest') }}">{{ number_format($log->interest_amount, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td>Current Wallet</td>
                                <td data-caption="{{ __('Invest Amount') }}">
                                    {{ number_format($log->user->current_wallet->amount ?? 0, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td data-caption="{{ __('Payment Date') }}">{{ $log->created_at }}</td>
                                <td data-caption="{{ __('Next Payment Date') }}">
                                    Every 24 Hours
                                </td>
                            </tr>
                        @endif
                        @if ($log->type == 'saving_wallets')
                            <tr>
                                <td data-caption="{{ __('Plan Name') }}">Deposit</td>
                                <td data-caption="{{ __('Interest') }}">{{ number_format($log->interest_amount, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td>Saving Wallet</td>
                                <td data-caption="{{ __('Invest Amount') }}">
                                    {{ number_format($log->user->saving_wallet->amount ?? 0, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td data-caption="{{ __('Payment Date') }}">{{ $log->created_at }}</td>
                                <td data-caption="{{ __('Next Payment Date') }}">
                                    Every 24 Hours
                                </td>
                            </tr>
                        @endif
                        @if ($log->type == 'sharing_wallets')
                            <tr>
                                <td data-caption="{{ __('Plan Name') }}">Deposit</td>
                                <td data-caption="{{ __('Interest') }}">{{ number_format($log->interest_amount, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td>Sharing Wallet</td>
                                <td data-caption="{{ __('Invest Amount') }}">
                                    {{ number_format($log->user->sharing_wallet->amount ?? 0, 3) }}
                                    {{ @$general->site_currency }}</td>
                                <td data-caption="{{ __('Payment Date') }}">{{ $log->created_at }}</td>
                                <td data-caption="{{ __('Next Payment Date') }}">
                                    Every 24 Hours
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
