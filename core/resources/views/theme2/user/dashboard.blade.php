@extends(template() . 'layout.master2')

@section('content2')
    <div class="dashboard-body-part">

        <div class="row gy-4">
            <div class="col-xxl-6">
                <div class="d-box-one h-100">
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="content">
                        <span class="caption-title">{{ __('Current Balance') }}</span>
                        <h3 class="d-box-one-amount">
                            {{ number_format(auth()->user()->balance, 3) . ' ' . $general->site_currency }}</h3>
                        <div class="d-flex flex-wrap">
                            <a class="btn btn-outline-light m-2" href="{{ route('user.transfer_money') }}">Transfer
                                Money</a>
                            <a class="btn btn-outline-light m-2" href="{{ route('user.withdraw') }}">Withdraw</a>
                        </div>
                    </div>

                    <div class="top-right dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                            <i class="text-white fa fa-ellipsis-v" style="cursor: pointer"></i>
                        </a>
                        <ul class="dropdown-menu bg-white text-dark">
                            <li>
                                <span class="dropdown-item">
                                    <a href="{{ route('user.withdraw.all') }}" class="text-dark">Withdraw
                                        History</a>
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item">
                                    <a href="{{ route('user.withdraw.pending') }}" class="text-dark">Pending
                                        Withdraw</a>
                                </span>
                            </li>
                            <li>
                                <span class="dropdown-item">
                                    <a href="{{ route('user.money.log') }}" class="text-dark"> Transfer History</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6">
                <div class="d-box-one h-100">
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="content">
                        <span class="caption-title">{{ __('Profit Balance') }}</span>
                        <h3 class="d-box-one-amount">
                            {{ number_format(auth()->user()->profit_balance, 3) . ' ' . $general->site_currency }}</h3>
                        <button class="btn btn-outline-light  withdraw_now" data-wallet_type="profit_balance"
                            data-href="{{ route('user.wallet.profit_transfer') }}">Transfer To Current Balance </button>
                    </div>

                    <div class="top-right dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                            <i class="fa fa-ellipsis-v text-white" style="cursor: pointer"></i>
                        </a>
                        <ul class="dropdown-menu bg-white text-dark">
                            <li><a class="dropdown-item text-dark"
                                    href="{{ route('user.interest.log') }}">{{ __('Interest History') }}</a></li>
                            <li><a class="dropdown-item text-dark"
                                    href="{{ route('user.commision') }}">{{ __('Referral Commission History') }}</a></li>
                            <li><a class="dropdown-item text-dark"
                                    href="{{ route('user.team') }}">{{ __('Referral Team') }}</a></li>
                            <li><a class="dropdown-item text-dark"
                                    href="{{ route('user.transaction.log') }}">{{ __('Transaction History') }}</a></li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <hr>
        <h1>My Wallets</h1>
        <div class="row gy-4 ">
            <div class="col-md-6">
                <div class="card finance-card bg-1">
                    <div class="card-header finance-card-header d-flex justify-content-between">
                        <h4 class="mb-0">Current Wallet</h4>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                                <i class="fa fa-ellipsis-v" style="cursor: pointer"></i>
                            </a>
                            <ul class="dropdown-menu bg-white text-dark">
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.deposit.log', ['wallet' => 'current_wallet']) }}"
                                            class="text-dark"> Deposit History</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.wallet.transfer_log', ['wallet' => 'current_wallet']) }}"
                                            class="text-dark"> Transfer History</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body finance-card-body">
                        <div class="text-center">
                            <span
                                class="finance-amount">{{ number_format(auth()->user()->current_wallet->amount, 3) . ' ' . $general->site_currency }}</span>
                        </div>
                        <p class="text-center finance-timer">Pending Transfer:
                            @php
                                $current_transfer = auth()
                                    ->user()
                                    ->wallet_transfer()
                                    ->where('wallet_type', 'current_wallet')
                                    ->where('status', 0)
                                    ->latest()
                                    ->first();

                            @endphp
                            @if ($current_transfer)
                                {{ number_format($current_transfer->amount, 3) }}
                            @else
                                0
                            @endif
                            {{ $general->site_currency }}
                        </p>
                        <p class="text-center">
                            <span id="currentTimerPlaceholder" class="timer"></span>
                        </p>
                        <div class="text-center finance-buttons">
                            <button class="btn btn-outline-light deposit_now"
                                data-href="{{ route('user.paynow', $gateway->id ?? 0) }}" data-wallet_type="current_wallet"
                                data-id="{{ $gateway->id ?? 0 }}">Deposit</button>
                            <button class="btn btn-outline-light ml-2 withdraw_now" data-wallet_type="current_wallet"
                                data-href="{{ route('user.wallet.withdraw', 'current_wallet') }}">Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card finance-card bg-1">
                    <div class="card-header finance-card-header d-flex justify-content-between">
                        <h4 class="mb-0">Saving Wallet</h4>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                                <i class="fa fa-ellipsis-v" style="cursor: pointer"></i>
                            </a>
                            <ul class="dropdown-menu bg-white text-dark">
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.deposit.log', ['wallet' => 'saving_wallet']) }}"
                                            class="text-dark"> Deposit History</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.wallet.transfer_log', ['wallet' => 'saving_wallet']) }}"
                                            class="text-dark"> Transfer History</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body finance-card-body">
                        <div class="text-center">
                            <span
                                class="finance-amount">{{ number_format(auth()->user()->saving_wallet->amount, 3) . ' ' . $general->site_currency }}</span>
                        </div>
                        <p class="text-center finance-timer">Pending Transfer:
                            @php
                                $saving_transfer = auth()
                                    ->user()
                                    ->wallet_transfer()
                                    ->where('wallet_type', 'saving_wallet')
                                    ->where('status', 0)
                                    ->latest()

                                    ->first();

                            @endphp
                            @if ($saving_transfer)
                                {{ number_format($saving_transfer->amount, 3) }}
                            @else
                                0
                            @endif
                            {{ $general->site_currency }}
                        </p>
                        <p class="text-center">
                            <span id="savingTimerPlaceholder" class="timer"></span>
                        </p>
                        <div class="text-center finance-buttons">
                            <button class="btn btn-outline-light deposit_now"
                                data-href="{{ route('user.paynow', $gateway->id ?? 0) }}"
                                data-wallet_type="saving_wallet" data-id="{{ $gateway->id ?? 0 }}">Deposit</button>
                            <button class="btn btn-outline-light ml-2 withdraw_now"
                                data-href="{{ route('user.wallet.withdraw', 'saving_wallet') }}"
                                data-wallet_type="saving_wallet">Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card  finance-card bg-1">


                    <div class="card-header finance-card-header d-flex justify-content-between">
                        <h4 class="mb-0">Sharing Wallet</h4>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                                <i class="fa fa-ellipsis-v" style="cursor: pointer"></i>
                            </a>
                            <ul class="dropdown-menu bg-white text-dark">
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.deposit.log', ['wallet' => 'sharing_wallet']) }}"
                                            class="text-dark"> Deposit History</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.wallet.transfer_log', ['wallet' => 'sharing_wallet']) }}"
                                            class="text-dark"> Transfer History</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body finance-card-body">
                        <div class="text-center">
                            <span
                                class="finance-amount">{{ number_format(auth()->user()->sharing_wallet->amount, 3) . ' ' . $general->site_currency }}</span>
                        </div>
                        <p class="text-center finance-timer">Pending Transfer:
                            @php
                                $sharing_transfer = auth()
                                    ->user()
                                    ->wallet_transfer()
                                    ->where('wallet_type', 'sharing_wallet')
                                    ->where('status', 0)
                                    ->latest()
                                    ->first();

                            @endphp
                            @if ($sharing_transfer)
                                {{ number_format($sharing_transfer->amount, 3) }}
                            @else
                                0
                            @endif
                            {{ $general->site_currency }}
                        </p>
                        <p class="text-center">
                            <span id="sharingTimerPlaceholder" class="timer"></span>
                        </p>
                        <div class="text-center finance-buttons ">
                            <button class="btn btn-outline-light deposit_now"
                                data-href="{{ route('user.paynow', $gateway->id ?? 0) }}"
                                data-wallet_type="sharing_wallet" data-id="{{ $gateway->id ?? 0 }}">Deposit</button>
                            <button class="btn btn-outline-light ml-2 withdraw_now"
                                data-href="{{ route('user.wallet.withdraw', 'sharing_wallet') }}"
                                data-wallet_type="sharing_wallet">Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card  finance-card bg-1">
                    <div
                        class="card-header finance-card-header d-flex justify-content-between d-flex justify-content-between">
                        <h4 class="mb-0">Business Pack Wallet</h4>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                                <i class="fa fa-ellipsis-v" style="cursor: pointer"></i>
                            </a>
                            <ul class="dropdown-menu bg-white text-dark">
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.deposit.log', ['wallet' => 'business_pack_wallet']) }}"
                                            class="text-dark"> Deposit History</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.invest.log', ['wallet' => 'business_pack_wallet']) }}"
                                            class="text-dark">Next Payments</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body finance-card-body">
                        <div class="text-center">
                            <span
                                class="finance-amount">{{ number_format(auth()->user()->business_pack_wallet->amount, 3) . ' ' . $general->site_currency }}</span>
                        </div>
                        <p>Investments Only</p>

                        <div class="text-center finance-buttons">
                            <a href="{{ route('user.investmentplan', ['wallet' => 'business_pack_wallet']) }}"
                                class="btn btn-outline-light"> Plans</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card finance-card bg-1">
                    <div
                        class="card-header finance-card-header d-flex justify-content-between d-flex justify-content-between">
                        <h4 class="mb-0">Business Value Wallet</h4>
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="px-3">
                                <i class="fa fa-ellipsis-v" style="cursor: pointer"></i>
                            </a>
                            <ul class="dropdown-menu bg-white text-dark">
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.deposit.log', ['wallet' => 'business_value_wallet']) }}"
                                            class="text-dark"> Deposit History</a>
                                    </span>
                                </li>
                                <li>
                                    <span class="dropdown-item">
                                        <a href="{{ route('user.invest.log', ['wallet' => 'business_value_wallet']) }}"
                                            class="text-dark">Next Payments</a>
                                    </span>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-body finance-card-body">
                        <div class="text-center">
                            <span
                                class="finance-amount">{{ number_format(auth()->user()->business_value_wallet->amount, 3) . ' ' . $general->site_currency }}</span>
                        </div>


                        <p>Investments Only</p>

                        <div class="text-center finance-buttons">
                            <a href="{{ route('user.investmentplan', ['wallet' => 'business_value_wallet']) }}"
                                class="btn btn-outline-light"> Plans</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(count($sliders) > 0)
        <hr class="mt-4">
        <h3>Members</h3>
        <div class="row  justify-content-center ">
            <div class="col-md-8 text-center">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $slider)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img style="min-height: 200px; max-height: 500px; object-fit: cover; border-radius: 5px"
                                    src="{{ getFile('admins', $slider->image) }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>{{ $slider->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        @endif

        <div class="mt-4">
            <label>{{ __('Your refferal link') }}</label>
            <div class="input-group mb-3">
                <input type="text" id="refer-link" class="form-control copy-text"
                    value="{{ route('user.register', @Auth::user()->username) }}" placeholder="referallink.com/refer"
                    aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                <button type="button" class="input-group-text  copy cmn-btn"
                    id="basic-addon2">{{ __('Copy') }}</button>
            </div>
        </div>

    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="paynow">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content bg-body">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Deposit Amount') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" value="">
                            <div class="form-group mb-3">
                                <label for="">{{ __('Amount') }}</label>
                                <input type="text" name="amount" class="form-control"
                                    placeholder="{{ __('Enter Amount') }}">

                                <input type="hidden" name="user_id" class="form-control" value="{{ auth()->id() }}">
                                <input type="hidden" name="type" class="form-control" value="deposit">
                                <input type="hidden" name="wallet_type">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="use_current_balance" class="form-check-input"
                                    id="method">
                                <label class="form-check-label" for="method">Deposit Using Current Balance</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="cmn-btn">{{ __('Deposit Now') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="withdrawnow">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content bg-body">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Transfer Amount to Current Balance') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-light">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="">{{ __('Amount') }}</label>
                                <input required id="w_amount" type="number" step="any" name="amount"
                                    class="form-control" placeholder="{{ __('Enter Amount') }}">


                            </div>
                            <div class="form-group mb-3">
                                <label for="">{{ __('Amount after tax') }} <span id="tax"></span>%</label>
                                <input id="total_amount" type="text" class="form-control"
                                    placeholder="{{ __('Final Amount') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="cmn-btn">{{ __('Transfer Now') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (Session::has('deposit'))
        @php
            $deposit = Session::get('deposit');
        @endphp
        <style>
            .invoice-container {
                max-width: 400px;
                padding: 20px;
                border-radius: 10px;
                background-color: #1b2845;
                background-image: linear-gradient(315deg, #1b2845 0%, #274060 74%);
            }

            h2 {
                text-align: center;
                color: #EDEADE;
            }

            .invoice-item {
                margin-bottom: 10px;
                display: flex;
                justify-content: space-between;
                line-height: 30px;
            }

            .invoice-label {
                font-weight: bold;
                color: #EDEADE;
                display: inline-block;
                width: 120px;
            }

            .invoice-value {
                color: #EDEADE;
                display: inline-block;
            }

            .image img {
                /* width: 50%; */
                margin-top: 20px;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        <!-- Modal -->
        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center">
                        <div id="invoice" class="invoice-container text-center">
                            <img src="{{ getFile('logo', @$general->logo) }}" width="50%" alt="pp">
                            <h2>Invoice</h2>

                            <div class="invoice-item">
                                <span class="invoice-label">Transaction ID:</span>
                                <span class="invoice-value">{{ $deposit->transaction_id }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">User:</span>
                                <span
                                    class="invoice-value">{{ $deposit->user->fname . ' ' . $deposit->user->lname }}</span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-label">Wallet:</span>
                                <span
                                    class="invoice-value text-uppercase">{{ str_replace('_', ' ', rtrim($deposit->wallet_type, 's')) }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">Gateway:</span>
                                <span class="invoice-value">{{ $deposit->gateway->gateway_name }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">Amount:</span>
                                <span class="invoice-value">{{ number_format($deposit->amount, 2) }}</span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-label">Point Value:</span>
                                <span class="invoice-value">{{ number_format($deposit->amount / 5, 2) }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">Currency:</span>
                                <span
                                    class="invoice-value">{{ $deposit->gateway->gateway_parameters->gateway_currency }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">Charge:</span>
                                <span class="invoice-value">{{ $deposit->gateway->charge }}</span>
                            </div>

                            <div class="invoice-item">
                                <span class="invoice-label">Payment Date:</span>
                                <span class="invoice-value">{{ $deposit->created_at->format('Y-m-d') }}</span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-label">Status:</span>
                                <span class="invoice-value">Approval Pending</span>
                            </div>
                            <div class="image">
                                <img src="/asset/done.png" alt="helo">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="download-invoice" onclick="printInvoice()"
                            class="btn btn-outline-light ">Download</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($loginMessage)
        <!-- Modal -->
        <div class="modal fade" id="loginMessageModal" tabindex="-1" aria-labelledby="loginMessageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title  text-center" id="loginMessageModalLabel">News update</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            {{ $loginMessage->message }}
                        </p>
                        <img src="{{ getFile('admins', $loginMessage->picture) }}" alt="alt">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('style')
    <style>
        .sp-referral .single-child {
            padding: 6px 10px;
            border-radius: 5px;
        }

        .sp-referral .single-child+.single-child {
            margin-top: 15px;
        }

        .sp-referral .single-child p {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .sp-referral .single-child p img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover;
        }



        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sp-referral>.single-child.root-child>.sub-child-list::before {
            background-color: var(--main-color);
        }

        .sub-child-list>.single-child {
            position: relative;
        }

        .sub-child-list>.single-child::before {
            position: absolute;
            content: '';
            left: -18px;
            top: 21px;
            width: 30px;
            height: 5px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0 0 0 5px;
        }

        .sp-referral>.single-child.root-child>p img {
            border: 2px solid #5463ff;
        }

        .sub-child-list.step-2>.single-child>p img {
            border: 2px solid #0aa27c;
        }

        .sub-child-list.step-3>.single-child>p img {
            border: 2px solid #a20a0a;
        }

        .sub-child-list.step-4>.single-child>p img {
            border: 2px solid #f562e6;
        }

        .sub-child-list.step-5>.single-child>p img {
            border: 2px solid #a20a0a;
        }


        /* Custom Styling */

        .finance-card.bg-1 {
            background-color: #087B2E;
            box-shadow: 1px 4px 5px rgb(252, 251, 121);
        }

        .finance-card.bg-2 {
            background-color: #090947;
            background-image: linear-gradient(315deg, #090947 0%, #5a585a 74%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card.bg-3 {
            background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card.bg-4 {
            background: radial-gradient(circle at 10% 20%, rgb(255, 200, 124) 0%, rgb(252, 251, 121) 90%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card.bg-5 {
            background: radial-gradient(328px at 2.9% 15%, rgb(191, 224, 251) 0%, rgb(232, 233, 251) 25.8%, rgb(252, 239, 250) 50.8%, rgb(234, 251, 251) 77.6%, rgb(240, 251, 244) 100.7%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card.bg-6 {
            background: linear-gradient(68.6deg, rgb(252, 165, 241) 1.8%, rgb(181, 255, 255) 100.5%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card.bg-7 {
            background: linear-gradient(109.6deg, rgb(36, 45, 57) 11.2%, rgb(16, 37, 60) 51.2%, rgb(0, 0, 0) 98.6%);
            box-shadow: 4px 4px 8px #090947;
        }

        .finance-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 1px 4px 5px rgb(252, 251, 121);
            border: none;
            height: 100%
        }

        .finance-card-header {

            color: #fff;
            padding: 15px;
            border: none
        }

        .finance-card-body {
            padding: 20px;
            height: 100%;
            text-align: center
        }

        .finance-amount {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .finance-icons {
            font-size: 2.5rem;
            color: #3498db;
            margin-right: 10px;
        }

        .finance-timer {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .finance-buttons {
            margin-top: 20px;
        }

        .timer {
            color: aquamarine;
        }
    </style>
@endpush


@push('script')
    <script>
        'use strict';
        var copyButton = document.querySelector('.copy');
        var copyInput = document.querySelector('.copy-text');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });
        copyInput.addEventListener('click', function() {
            this.select();
        });

        const current_wallet_tax = {{ $settings->current_wallet_tax }};
        const saving_wallet_tax = {{ $settings->saving_wallet_tax }};
        const sharing_wallet_tax = {{ $settings->sharing_wallet_tax }};
        const profit_transfer_tax = {{ $general->profit_transfer_charge ?? 0 }};
        var tax = 0;

        $(document).ready(function() {
            @if ($current_transfer)
                getCountDown($("#currentTimerPlaceholder"), "{{ now()->diffInSeconds($current_transfer->time) }}");
            @endif
            @if ($saving_transfer)
                getCountDown($("#savingTimerPlaceholder"), "{{ now()->diffInSeconds($saving_transfer->time) }}");
            @endif
            @if ($sharing_transfer)
                getCountDown($("#sharingTimerPlaceholder"), "{{ now()->diffInSeconds($sharing_transfer->time) }}");
            @endif

        });

        $(function() {
            'use strict'

            $('.deposit_now').on('click', function() {
                const modal = $('#paynow')
                modal.find('form').attr('action', $(this).data('href'))
                modal.find('input[name=id]').val($(this).data('id'))
                modal.find('input[name=wallet_type]').val($(this).data('wallet_type'))
                modal.modal('show')
            })

            $(".withdraw_now").click(function(e) {
                e.preventDefault();
                const wmodal = $('#withdrawnow')
                wmodal.find('form').attr('action', $(this).data('href'))
                switch ($(this).data('wallet_type')) {
                    case "current_wallet":
                        tax = current_wallet_tax;
                        wmodal.modal('show');
                        $("#tax").html(tax);
                        break;
                    case "saving_wallet":
                        tax = saving_wallet_tax;
                        wmodal.modal('show');
                        $("#tax").html(tax);
                        break;
                    case "sharing_wallet":
                        tax = sharing_wallet_tax;
                        $("#tax").html(tax);
                        wmodal.modal('show');
                    case "profit_balance":
                        tax = profit_transfer_tax;
                        $("#tax").html(tax);
                        wmodal.modal('show');
                        break;
                    default:
                        break;

                }

            });

            $("#w_amount").on("input change", function() {
                let amount = $(this).val();
                let tax_amount = (amount * tax) / 100;
                let total = parseFloat(amount) - parseFloat(tax_amount);
                $("#total_amount").val(total);

            });



            @if (Session::has('deposit'))
                $("#invoiceModal").modal('show');
            @elseif ($loginMessage)
                $("#loginMessageModal").modal('show');
            @endif


        })


        @if (Session::has('deposit'))

            async function printInvoice() {

                try {
                    $("#download-invoice").text("Downloading...");
                    const canvas = await html2canvas(document.getElementById('invoice'));
                    const imgData = canvas.toDataURL('image/png');

                    // Create a link element
                    const downloadLink = document.createElement('a');
                    downloadLink.href = imgData;
                    downloadLink.download = 'invoice.png';

                    // Append the link to the body
                    document.body.appendChild(downloadLink);

                    // Trigger a click on the link to initiate the download
                    downloadLink.click();

                    // Remove the link from the DOM
                    document.body.removeChild(downloadLink);
                } catch (error) {
                    // console.log(error);
                    $("#download-invoice").text("Error");
                } finally {
                    $("#download-invoice").text("Downloaded");
                }

            }
        @endif



        function getCountDown(countdownElement, seconds) {
            var times = seconds;

            var x = setInterval(function() {
                var distance = times * 1000;

                if (distance < 0) {
                    clearInterval(x);
                    firePayment(countdownElement);
                    return;
                }
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                countdownElement.text(days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s ");
                times--;
            }, 1000);
        }

        function firePayment(elementId) {
            $.ajax({
                // url: "{{ route('returninterest') }}",
                // method: "GET",
                // success: function(response) {
                //     if (response) {
                //         document.getElementById(elementId).innerHTML = "COMPLETE";
                //         countdownElement.text('Transferring Payment');
                //         return
                //     }

                //     window.location.href = "{{ url()->current() }}"
                // }
            })
        }
    </script>
@endpush
