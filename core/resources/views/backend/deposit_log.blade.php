@extends('backend.layout.master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-body p-2">

                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Charge') }}</th>
                                        <th>{{ __('Wallet Type') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($manuals as $key => $manual)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $manual->user->fullname }}</td>
                                            <td>{{ number_format($manual->amount, 2) . ' ' . @$general->site_currency }}
                                            </td>
                                            <td>
                                                {{ number_format($manual->charge, 2) . ' ' . @$general->site_currency }}
                                            </td>
                                            <td class="text-uppercase">{{ rtrim(str_replace('_', ' ', $manual->wallet_type),'s') }}
                                            </td>
                                            <td>
                                                @if ($manual->payment_status == 2)
                                                    <span class="badge badge-warning">{{ __('Pending') }}</span>
                                                @elseif($manual->payment_status == 1)
                                                    <span class="badge badge-success">{{ __('Approved') }}</span>
                                                @elseif($manual->payment_status == 3)
                                                    <span class="badge badge-danger">{{ __('Rejected') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-md btn-info details"
                                                    href="{{ route('admin.deposit.trx', $manual->transaction_id) }}">{{ __('Details') }}</a>

                                                @if ($manual->payment_status == 2)
                                                    <a class="btn text-white btn-md btn-primary accept"
                                                        @if ($manual->plan_id && $manual->wallet_type == 'business_value_wallets') data-wallet_type="{{ $manual->wallet_type }}"
                                                        data-plan="{{ json_encode($manual->plan) }}"
                                                        data-deposit="{{ json_encode($manual) }}"
                                                        data-wallet="{{ json_encode($manual->user->business_value_wallet) }}" @endif
                                                        data-url="{{ route('admin.deposit.accept', $manual->transaction_id) }}">{{ __('Accept') }}</a>
                                                    <a class="btn text-white btn-md btn-danger reject"
                                                        data-url="{{ route('admin.deposit.reject', $manual->transaction_id) }}">{{ __('Reject') }}</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">{{ __('No Data Found') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                        @if ($manuals->hasPages())
                            <div class="card-footer">
                                {{ $manuals->links('backend.partial.paginate') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </section>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Payment Accept') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>{{ __('Are you sure to Accept this Payment request') }}?</p>
                        </div>
                        <div id="business_value_fields"  class="row">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Accept') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Payment Reject') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>{{ __('Are you sure to reject this payment') }}?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Reject') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('style-plugin')
    <link rel="stylesheet" href="{{ asset('asset/admin/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bs4-datatable.min.css') }}">
@endpush

@push('script-plugin')
    <script src="{{ asset('asset/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/bs4-datatable.min.js') }}"></script>
@endpush

@push('style')
    <style>
        .pagination .page-item.active .page-link {
            background-color: rgb(95, 116, 235);
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
            background: transparent;
            border-color: transparent;
        }



        .pagination .page-item.active .page-link:hover {
            background-color: rgb(95, 116, 235);
        }

        th,
        td {
            text-align: center !important;
        }
    </style>
@endpush

@push('script')
    <script>
        $(function() {
const fields = `
<div class="col-md-12 form-group">
                                <label for="form-label">Sponser Profit</label>
                                <input type="number" step="any" name="sponser_profit" id="sponser_profit" required
                                    class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="form-label">Return Interest</label>
                                <input type="number" step="any" name="return_interest" id="return_interest" required
                                    class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="form-label">Amount</label>
                                <input type="number" step="any" name="amount" id="amount" required class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="form-label">How Many Times</label>
                                <input type="text" name="how_many_time" disabled value="Lifetime" id="amount" required class="form-control">
                            </div>
`


            'use strict'
            $('#myTable').DataTable();

            $('.accept').on('click', function() {
                const modal = $('#accept');

                modal.find('form').attr('action', $(this).data('url'));
                if ($(this).data('wallet_type') === "business_value_wallets") {
                    let wallet = $(this).data('wallet');
                    let plan = $(this).data('plan');
                    let deposit = $(this).data('deposit');
                    // console.log(plan);
                    // console.log(wallet);
                    // console.log(deposit);
                    $("#business_value_fields").html(fields);
                    modal.find("input[name=sponser_profit]").val(Number(deposit.sponser_profit).toFixed(3));
                    modal.find("input[name=return_interest]").val(Number(plan.return_interest).toFixed(3));
                    modal.find("input[name=amount]").val(Number(deposit.amount).toFixed(3));
                    if(plan.return_for === 1){
                        let how_many_time = modal.find("input[name=how_many_time]");
                        how_many_time.attr('disabled',false);
                        how_many_time.val(Number(plan.how_many_time));
                        how_many_time.attr('type',"number");
                    }
                }

                modal.modal('show');
            })

            $('.reject').on('click', function() {
                const modal = $('#reject');

                modal.find('form').attr('action', $(this).data('url'));

                modal.modal('show');
            })


            $('#accept').on('hidden.bs.modal', function(e) {
                $("#business_value_fields").html('');
            });



        })
    </script>
@endpush
