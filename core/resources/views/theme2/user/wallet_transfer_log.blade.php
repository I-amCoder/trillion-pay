@extends(template() . 'layout.master2')


@section('content2')
    <div class="dashboard-body-part">
        <div class="h4 section-title text-capitalize">{{ str_replace('_', ' ', Request('wallet')) }} Transfers</div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Arrival Date</th>
                        <th>Request Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transfers as $key => $transfer)
                        <tr>
                            <td>{{ $transfer->amount }}</td>
                            <td>{{ $transfer->status == 1 ? 'Completed' : 'Pending' }}</td>
                            <td>{{ $transfer->time->format('d M, Y') }}</td>
                            <td>{{ $transfer->created_at->format('d M, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="100%">
                                {{ __('No users Found') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($transfers->hasPages())
                {{ $transfers->links() }}
            @endif
        </div>
    </div>
@endsection
