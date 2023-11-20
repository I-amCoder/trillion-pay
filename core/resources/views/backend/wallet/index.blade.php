@extends('backend.layout.master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Manage Wallet Tweaks') }}</h1>
            </div>
            <div class="row text-white">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <div class="h4"><i class="fa  fa-cog "></i> Current Wallet</div>
                        </div>
                        <form action="{{ route('admin.wallet.update', 'current_wallets') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="current_profit" step="any"
                                        value="{{ old('current_profit') ?? @$settings->current_wallet_profit }}"
                                        class="form-control @error('current_profit')  @enderror"
                                        placeholder="Wallet Profit Percentage" required>
                                    @error('current_profit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="current_withdraw" step="any"
                                        value="{{ old('current_withdraw') ?? @$settings->current_wallet_tax }}"
                                        class="form-control @error('current_withdraw')  @enderror"
                                        placeholder="Tax on balance withdraw" required>
                                    @error('current_withdraw')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="current_time" step="0"
                                        value="{{ old('current_time') ?? @$settings->current_wallet_time }}"
                                        class="form-control @error('current_time')  @enderror"
                                        placeholder="Time to complete transfer" required>
                                    @error('current_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <div class="h4"><i class="fa  fa-cog "></i> Saving Wallet</div>
                        </div>
                        <form action="{{ route('admin.wallet.update', 'saving_wallets') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="saving_profit" step="any"
                                        value="{{ old('saving_profit') ?? @$settings->saving_wallet_profit }}"
                                        class="form-control @error('saving_profit')  @enderror"
                                        placeholder="Wallet Profit Percentage" required>
                                    @error('saving_profit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="saving_withdraw" step="any"
                                        value="{{ old('saving_withdraw') ?? @$settings->saving_wallet_tax }}"
                                        class="form-control @error('saving_withdraw')  @enderror"
                                        placeholder="Tax on balance withdraw" required>
                                    @error('saving_withdraw')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="saving_time" step="0"
                                        value="{{ old('saving_time') ?? @$settings->saving_wallet_time }}"
                                        class="form-control @error('saving_time')  @enderror"
                                        placeholder="Time to complete transfer" required>
                                    @error('saving_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <div class="h4"><i class="fa  fa-cog "></i> Sharing Wallet</div>
                        </div>
                        <form action="{{ route('admin.wallet.update', 'sharing_wallets') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Profit<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_profit" step="any"
                                        value="{{ old('sharing_profit') ?? @$settings->sharing_wallet_profit }}"
                                        class="form-control @error('sharing_profit')  @enderror"
                                        placeholder="Wallet Profit Percentage" required>
                                    @error('sharing_profit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Default Profit (Incase if profit is not updated within 24
                                        hours)<span class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_default_profit" step="any"
                                        value="{{ old('sharing_default_profit') ?? @$settings->sharing_default_profit }}"
                                        class="form-control @error('sharing_default_profit')  @enderror"
                                        placeholder="Wallet Profit Percentage" required>
                                    @error('sharing_default_profit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Tax <span
                                            class="text-danger font-weight-bold">%</span></label>
                                    <input type="number" name="sharing_withdraw" step="any"
                                        value="{{ old('sharing_withdraw') ?? @$settings->sharing_wallet_tax }}"
                                        class="form-control @error('sharing_withdraw')  @enderror"
                                        placeholder="Tax on balance withdraw" required>
                                    @error('sharing_withdraw')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Withdraw Time <span
                                            class="text-danger font-weight-bold">(Hours)</span></label>
                                    <input type="number" name="sharing_time" step="0"
                                        value="{{ old('sharing_time') ?? @$settings->sharing_wallet_time }}"
                                        class="form-control @error('sharing_time')  @enderror"
                                        placeholder="Time to complete transfer" required>
                                    @error('sharing_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="text-danger">Profit Last Updated:
                                    {{ $settings->last_sharing_update > 0 ? $settings->last_sharing_update . ' Hour(s) ago' : 'Just in Last Hour' }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-dark ">Update Settings</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
