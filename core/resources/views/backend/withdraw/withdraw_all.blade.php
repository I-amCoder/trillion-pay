@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <div class="row withdraw-all-row">
            @if(isset($pending) && $pending)
            <div class="col-12 my-3">
                <button class="btn btn-success checkall">Check All</button>
                <button class="btn btn-danger uncheckall">Uncheck All</button>
                <button class="btn btn-success mx-2 float-right approve-selected">Approve Selected</button>
                <button class="btn btn-danger float-right reject-selected">Reject Selected</button>
            </div>
            @endif

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        @if(isset($pending) && $pending)
                                        <th>{{ __('Select') }}</th>
                                        @endif
                                        <th>{{ __('User') }}</th>
                                        <th>{{ __('Withdraw Amount') }}</th>
                                        <th>{{ __('User Will Get') }}</th>
                                        <th>{{ __('Charge Type') }}</th>
                                        <th>{{ __('Charge') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawlogs as $key => $withdrawlog)
                                        <tr>
                                            @if(isset($pending) && $pending)
                                            <td class="text-center">
                                                <input type="checkbox" name="bulkAction[]" value="{{ $withdrawlog->id }}"
                                                    class="form-check-input  bulk-select"
                                                    id="exampleCheck{{ $withdrawlog->id }}">
                                            </td>
                                            @endif
                                            <td>

                                                <a href="{{ route('admin.user.details', $withdrawlog->user->id) }}">

                                                    <span class="ml-2">
                                                        {{ $withdrawlog->user->username }}
                                                    </span>
                                                </a>

                                            </td>

                                            <td>{{ $general->currency_icon .
                                                '  ' .
                                                $withdrawlog->withdraw_amount +
                                                ($withdrawlog->withdrawMethod->charge_type === 'percent'
                                                    ? ($withdrawlog->withdraw_amount * $withdrawlog->withdraw_charge) / 100
                                                    : $withdrawlog->withdraw_amount) }}
                                            </td>
                                            <td>


                                                {{ $withdrawlog->withdraw_amount }}

                                            </td>
                                            <td>
                                                {{ ucwords($withdrawlog->withdrawMethod->charge_type) }}
                                            </td>
                                            <td>
                                                {{ number_format($withdrawlog->withdraw_charge, 2) }}
                                            </td>
                                            <td>
                                                @if ($withdrawlog->status == 1)
                                                    <span class="badge badge-success">{{ __('Success') }}</span>
                                                @elseif($withdrawlog->status == 2)
                                                    <span class="badge badge-danger">{{ __('Rejected') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ __('Pending') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-md btn-info details"
                                                    data-user_data="{{ json_encode($withdrawlog->user_withdraw_prof) }}"
                                                    data-transaction="{{ $withdrawlog->transaction_id }}"
                                                    data-provider="{{ $withdrawlog->user->fullname }}"
                                                    data-email="{{ $withdrawlog->user->email }}"
                                                    data-method_name="{{ $withdrawlog->withdrawMethod->name }}"
                                                    data-date="{{ __($withdrawlog->created_at->format('d F Y')) }}">{{ __('Details') }}</button>
                                                @if ($withdrawlog->status == 0)
                                                    <button class="btn btn-md btn-primary accept"
                                                        data-url="{{ route('admin.withdraw.accept', $withdrawlog) }}">{{ __('Accept') }}</button>
                                                    <button class="btn btn-md btn-danger reject"
                                                        data-url="{{ route('admin.withdraw.reject', $withdrawlog) }}">{{ __('Reject') }}</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($withdrawlogs->hasPages())
                        {{ $withdrawlogs->links('backend.partial.paginate') }}
                    @endif
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Withdraw Details') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid withdraw-details">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close') }}</button>

                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Withdraw Accept') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>{{ __('Are you sure to Accept this withdraw request') }}?</p>
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
        <div class="modal-dialog modal-lg" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Withdraw Reject') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group col-md-12">

                                <label for="">{{ __('Reason Of Reject') }}</label>
                                <textarea name="reason_of_reject" id="" cols="30" rows="10" class="form-control"> </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Reject') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bulk_accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                @csrf
                <input type="hidden" name="bulk_ids">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Withdraw Accept') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>{{ __('Are you sure to Accept this withdraw request') }}?</p>
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
    <div class="modal fade" id="bulk_reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Withdraw Reject') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group col-md-12">

                                <label for="">{{ __('Reason Of Reject') }}</label>
                                <textarea name="reason_of_reject" id="" cols="30" rows="10" class="form-control"> </textarea>
                                <input type="hidden" name="bulk_ids">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Reject') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('style')
    <style>
        .image-rounded {
            width: 50px;
            height: 50px;
        }
    </style>
@endpush


@push('script')
    <script>
        $(function() {
            'use strict'

            $('.details').on('click', function() {
                const modal = $('#details');

                let html = `

                    <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               {{ __('Withdraw Method Email') }}
                                <span>${$(this).data('user_data').email}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('Withdraw Account Information') }}
                                <span>${$(this).data('user_data').account_information}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('Transaction Id') }}
                                <span>${$(this).data('transaction')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('User Name') }}
                                <span>${$(this).data('provider')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('User Email') }}
                                <span>${$(this).data('email')}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('Withdraw Method') }}
                                <span>${$(this).data('method_name')}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('Withdraw Date') }}
                                <span>${$(this).data('date')}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ __('Note For Withdraw') }}
                                <span>${$(this).data('user_data').note}</span>
                            </li>

                        </ul>


                `;

                modal.find('.withdraw-details').html(html);

                modal.modal('show');
            })

            $('.accept').on('click', function() {
                const modal = $('#accept');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

            $('.reject').on('click', function() {
                const modal = $('#reject');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

            $(".uncheckall").click(function(e) {
                e.preventDefault();
                $('.bulk-select').prop('checked', false);
            });

            $(".checkall").click(function(e) {
                e.preventDefault();
                $('.bulk-select').prop('checked', true);
            });

            // Function to handle bulk action submission
            function handleBulkAction(action) {
                const selectedIds = $('input[name="bulkAction[]"]:checked').map(function() {
                    return this.value;
                }).get();

                console.log(selectedIds);

                // Check if any row is selected
                if (selectedIds.length > 0) {
                    // Perform bulk action based on the selected action
                    if (action === 'approve') {
                        const modal = $('#bulk_accept');
                        modal.find('form').attr('action', '{{ route('admin.withdraw.bulk.accept') }}');
                        modal.find('input[name=bulk_ids]').val(JSON.stringify(selectedIds));
                        modal.modal('show');
                    } else if (action === 'reject') {
                        const modal = $('#bulk_reject');
                        modal.find('form').attr('action', '{{ route('admin.withdraw.bulk.reject') }}');
                        modal.find('input[name=bulk_ids]').val(JSON.stringify(selectedIds));
                        modal.modal('show');
                    }

                    // Set the selected IDs as hidden input value
                    $('#selectedIds').val(selectedIds.join(','));

                    // Submit the form
                    $('#bulkActionForm').submit();
                } else {
                    alert('Please select at least one item.');
                }
            }

            // Click event for "Approve Selected" button
            $('.approve-selected').on('click', function() {
                handleBulkAction('approve');
            });

            // Click event for "Reject Selected" button
            $('.reject-selected').on('click', function() {
                handleBulkAction('reject');
            });


        })
    </script>
@endpush
