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
                        <div class="card-body">

                            <form action="" method="post">

                                @csrf

                                <div class="row">

                                    {{-- <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header p-3 my-1 h4 font-weight-bold">
                                                {{ __('Gold Template') }}
                                            </div>
                                            <div class="card-body m-0 p-0">
                                                <img class="w-100" src="{{ asset('asset/theme1.png') }}"
                                                    alt="theme-image">
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" {{ @$general->theme == 1 ? 'disabled' : '' }}
                                                    class="btn btn-primary btn-block mt-3 active-btn"
                                                    data-route="{{ route('admin.manage.theme.update', 1) }}">
                                                    @if ($general->theme == 1)
                                                        <span><i class="fas fa-save pr-2"></i>
                                                            {{ __('Active') }}</span>
                                                    @else

                                                    <span><i class="fas fa-save pr-2"></i>
                                                        {{ __('Select As Active') }}</span>
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}


                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header p-3 my-1 h4 font-weight-bold">
                                                {{ __('Green Template') }}
                                            </div>
                                            <div class="card-body m-0 p-0">
                                                <img class="w-100" src="{{ asset('asset/theme2.png') }}"
                                                    alt="theme-image">
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" {{ @$general->theme == 2 ? 'disabled' : '' }}
                                                    class="btn btn-primary btn-block mt-3 active-btn"
                                                    data-route="{{ route('admin.manage.theme.update', 2) }}">
                                                    @if ($general->theme == 2)
                                                        <span><i class="fas fa-save pr-2"></i>
                                                            {{ __('Active') }}</span>
                                                    @else

                                                    <span><i class="fas fa-save pr-2"></i>
                                                        {{ __('Select As Active') }}</span>
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header p-3 my-1 h4 font-weight-bold">
                                                {{ __('Light Template') }}
                                            </div>
                                            <div class="card-body m-0 p-0">
                                                <img class="w-100" src="{{ asset('asset/theme3.png') }}"
                                                    alt="theme-image">
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" {{ @$general->theme == 3 ? 'disabled' : '' }}
                                                    class="btn btn-primary btn-block mt-3 active-btn"
                                                    data-route="{{ route('admin.manage.theme.update', 3) }}">
                                                    @if ($general->theme == 3)
                                                        <span><i class="fas fa-save pr-2"></i>
                                                            {{ __('Active') }}</span>
                                                    @else

                                                    <span><i class="fas fa-save pr-2"></i>
                                                        {{ __('Select As Active') }}</span>
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="activeTheme" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Active Template') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            {{ __('Are you sure to active this template ?') }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Active') }}</button>
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

            $('.active-btn').on('click', function() {
                const modal = $('#activeTheme');

                modal.find('form').attr('action', $(this).data('route'))

                modal.modal('show')
            })
        })
    </script>
@endpush
