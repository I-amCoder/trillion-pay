@extends('backend.layout.master')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
            </div>


            <div class="row">

                <div class="col-md-12  col-lg-12 col-12 all-users-table">
                    <div class="card-header">
                        <h5>{{ __('Investment Commission') }}</h5>
                    </div>
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="">
                                            <th scope="col">{{ __('Level') }}</th>
                                            <th scope="col">{{ __('Commission') }}</th>
                                            <th scope="col">{{ __('Change Status') }}</th>
                                            <th scope="col">{{ __('Generate') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($invest_referral)
                                                <td>

                                                    @forelse ($invest_referral->level as $level)
                                                        <li class="list-group-item list-group-item-primary">
                                                            {{ $level }}
                                                        </li>
                                                    @empty
                                                    @endforelse

                                                </td>
                                                <td>

                                                    @forelse ($invest_referral->commision as $commision)
                                                        <li class="list-group-item list-group-item-primary">
                                                            {{ $commision }} %
                                                        </li>
                                                    @empty
                                                    @endforelse

                                                </td>

                                                <td class="text-capitalize">

                                                    <div class="custom-switch custom-switch-label-onoff">
                                                        <input class="custom-switch-input" id="investstatus"
                                                            data-status="{{ $invest_referral->status }}"
                                                            data-url="{{ route('admin.refferalstatus', $invest_referral->id) }}"
                                                            type="checkbox" name="status"
                                                            {{ $invest_referral->status ? 'checked' : '' }}>
                                                        <label class="custom-switch-btn" for="investstatus"></label>
                                                    </div>

                                                </td>
                                            @else
                                        <tr>

                                            <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>

                                        </tr>
                                        @endif
                                        <td>
                                            <div class="append_table">
                                                <div class="input-group mb-3 mt-3 ml-auto ">
                                                    <input type="number" class="form-control invest_commision"
                                                        placeholder="How Many Field You Want" required>

                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="invest">{{ __('Generate') }}</button>
                                                    </div>
                                                </div>
                                                <form method="POST" action="{{ route('admin.invest.store') }}">
                                                    @csrf
                                                    <div class="append_invest  ml-auto">

                                                    </div>
                                                    <input type="text" name="type" value="invest" hidden>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary btn-block ml-auto create-invest"
                                                            type="submit">{{ __('Create') }}</button>
                                                    </div>
                                                </form>
                                            </div>



                                        </td>

                                        </tr>

                                    </tbody>
                                </table>


                            </div>

                        </div>

                    </div>
                    <div class="col-md-12  col-lg-12 col-12 all-users-table">
                        <div class="card-header">
                            <h5>{{ __('Interest Commission') }}</h5>
                        </div>
                        <div class="card">

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="">
                                                <th scope="col">{{ __('Level') }}</th>
                                                <th scope="col">{{ __('Commission') }}</th>
                                                <th scope="col">{{ __('Change Status') }}</th>
                                                <th scope="col">{{ __('Generate') }}</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <tr>
                                                @if ($interest_referral)
                                                    <td>

                                                        @forelse ($interest_referral->level as $level)
                                                            <li class="list-group-item list-group-item-success">
                                                                {{ $level }}
                                                            </li>
                                                        @empty
                                                        @endforelse



                                                    </td>
                                                    <td>

                                                        @forelse ($interest_referral->commision as $commision)
                                                            <li class="list-group-item list-group-item-success">
                                                                {{ $commision }} %
                                                            </li>
                                                        @empty
                                                        @endforelse

                                                    </td>




                                                    <td class="text-capitalize">
                                                        <div class="custom-switch custom-switch-label-onoff">
                                                            <input class="custom-switch-input" id="simpleIntereststatus"
                                                                data-status="{{ $interest_referral->status }}"
                                                                data-url="{{ route('admin.refferalstatus', $interest_referral->id) }}"
                                                                type="checkbox" name="status"
                                                                {{ $interest_referral->status ? 'checked' : '' }}>
                                                            <label class="custom-switch-btn" for="simpleIntereststatus"></label>
                                                        </div>
                                                    </td>
                                                @else
                                            <tr>

                                                <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>

                                            </tr>
                                            @endif

                                            <td class="">
                                                <div class="append_table">
                                                    <div class="input-group mb-3 mt-3  ml-auto ">
                                                        <input type="number" class="form-control interest_commision"
                                                            placeholder="How Many Field You Want" required>

                                                        <div class="input-group-append">
                                                            <button class="btn btn-success" type="button"
                                                                id="interest">{{ __('Generate') }}</button>
                                                        </div>
                                                    </div>
                                                    <form method="POST" action="{{ route('admin.interest.store') }}">
                                                        @csrf
                                                        <div class="append_interest  ml-auto">

                                                        </div>

                                                        <div class="col-md-12">
                                                            <input type="text" name="type" value="interest" hidden>

                                                            <button
                                                                class="btn btn-success  btn-block ml-auto create-interest"
                                                                type="submit">{{ __('Create') }}</button>
                                                        </div>
                                                    </form>
                                                </div>



                                            </td>

                                            </tr>

                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12  col-lg-12 col-12 all-users-table">
                        <div class="card-header">
                            <h5>{{ __('Plan Interest Commission') }}</h5>
                        </div>
                        <div class="card">

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="">
                                                <th scope="col">{{ __('Level') }}</th>
                                                <th scope="col">{{ __('Commission') }}</th>
                                                <th scope="col">{{ __('Change Status') }}</th>
                                                <th scope="col">{{ __('Generate') }}</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <tr>
                                                @if ($plan_interest_referral)
                                                    <td>

                                                        @forelse ($plan_interest_referral->level as $level)
                                                            <li class="list-group-item list-group-item-info">
                                                                {{ $level }}
                                                            </li>
                                                        @empty
                                                        @endforelse



                                                    </td>
                                                    <td>

                                                        @forelse ($plan_interest_referral->commision as $commision)
                                                            <li class="list-group-item list-group-item-info">
                                                                {{ $commision }} %
                                                            </li>
                                                        @empty
                                                        @endforelse

                                                    </td>




                                                    <td class="text-capitalize">
                                                        <div class="custom-switch custom-switch-label-onoff">
                                                            <input class="custom-switch-input" id="planInterestStatus"
                                                                data-status="{{ $plan_interest_referral->status }}"
                                                                data-url="{{ route('admin.refferalstatus', $plan_interest_referral->id) }}"
                                                                type="checkbox" name="status"
                                                                {{ $plan_interest_referral->status ? 'checked' : '' }}>
                                                            <label class="custom-switch-btn" for="planInterestStatus"></label>
                                                        </div>
                                                    </td>
                                                @else
                                            <tr>

                                                <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>

                                            </tr>
                                            @endif

                                            <td class="">
                                                <div class="append_table">
                                                    <div class="input-group mb-3 mt-3  ml-auto ">
                                                        <input type="number" class="form-control plan_interest_commision"
                                                            placeholder="How Many Field You Want" required>

                                                        <div class="input-group-append">
                                                            <button class="btn btn-info" type="button"
                                                                id="plan_interest">{{ __('Generate') }}</button>
                                                        </div>
                                                    </div>
                                                    <form method="POST" action="{{ route('admin.plan_interest.store') }}">
                                                        @csrf
                                                        <div class="append_plan_interest  ml-auto">

                                                        </div>

                                                        <div class="col-md-12">
                                                            <input type="text" name="type" value="plan_interest" hidden>

                                                            <button
                                                                class="btn btn-info  btn-block ml-auto create-plan-interest"
                                                                type="submit">{{ __('Create') }}</button>
                                                        </div>
                                                    </form>
                                                </div>



                                            </td>

                                            </tr>

                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                    </div>

        </section>
    </div>



@endsection

@push('script')
    <script>
        'use strict';
        $('.create-invest').hide();
        $('.create-interest').hide();
        $('.create-plan-interest').hide();

        $(document).ready(function() {

            $('#invest').on('click', function() {
                var value = $('.invest_commision').val();
                if (value > 5) {
                    iziToast.error({
                        message: 'Max Limit of Refferal level is 5 ',
                        position: 'topRight'
                    });

                    return;
                }
                var viewHtml = "";

                for (let i = 0; i < value; i++) {
                    viewHtml += `

            <div class="input-group mb-3 mt-3 ">
                <div class="input-group-prepend">
                                                <input class="btn btn-primary" type="text"  name=level[] value="level ${i+1}" readonly>
                                            </div>
                                            <input type="number" required class="form-control" name=commision[]
                                                placeholder="Commision">

                                            <div class="input-group-append">
                                                <button class="btn btn-primary text-light no-drop" type="button"
                                                    >%</button>
                                                <button class="btn btn-danger text-white delete_invest" type="button"
                                                    >X</button>
                                            </div>


                                        </div>

             `
                    $('.append_invest').html(viewHtml).hide().slideDown('slow');
                    $('.invest_commision').val('');
                    $('.create-invest').show();

                }


            });

            $(document).on('click', '.delete_invest', function() {
                $(this).closest('.input-group').remove();

                var count = $('.append_invest').children().length;

                if (count == 0) {
                    $('.create-invest').hide();
                }

            });





            $('#interest').on('click', function() {
                var value = $('.interest_commision').val();
                var viewHtml = "";

                if (value > 5) {
                    iziToast.error({
                        message: 'Max Limit of Refferal level is 5 ',
                        position: 'topRight'
                    });

                    return;
                }


                for (let i = 0; i < value; i++) {
                    viewHtml += `

            <div class="input-group mb-3 mt-3 ">
                <div class="input-group-prepend">
                                                <input class="btn btn-success" type="text"  name="level[]"  value="level ${i+1}" readonly>
                                            </div>
                                            <input type="number" name=commision[] class="form-control"
                                                placeholder="Commision" min="0" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-success text-light no-drop" type="button"
                                                    >%</button>
                                                <button class="btn btn-danger text-white delete_interest" type="button"
                                                    >X</button>
                                            </div>


                                        </div>

             `
                    $('.append_interest').html(viewHtml).hide().slideDown('slow');
                    $('.interest_commision').val('');
                    $('.create-interest').show();
                }


            });

            $(document).on('click', '.delete_interest', function() {
                $(this).closest('.input-group').remove();
                var count = $('.append_interest').children().length;

                if (count == 0) {
                    $('.create-interest').hide();
                }
            });

            $('#plan_interest').on('click', function() {
                var value = $('.plan_interest_commision').val();
                var viewHtml = "";

                if (value > 5) {
                    iziToast.error({
                        message: 'Max Limit of Refferal level is 5 ',
                        position: 'topRight'
                    });

                    return;
                }


                for (let i = 0; i < value; i++) {
                    viewHtml += `

            <div class="input-group mb-3 mt-3 ">
                <div class="input-group-prepend">
                                                <input class="btn btn-info" type="text"  name="level[]"  value="level ${i+1}" readonly>
                                            </div>
                                            <input type="number" name=commision[] class="form-control"
                                                placeholder="Commision" min="0" required>

                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light no-drop" type="button"
                                                    >%</button>
                                                <button class="btn btn-danger text-white delete_interest" type="button"
                                                    >X</button>
                                            </div>


                                        </div>

             `
                    $('.append_plan_interest').html(viewHtml).hide().slideDown('slow');
                    $('.plan_interest_commision').val('');
                    $('.create-plan-interest').show();
                }


            });


            $(document).on('click', '.delete_interest', function() {
                $(this).closest('.input-group').remove();
                var count = $('.append_interest').children().length;

                if (count == 0) {
                    $('.create-interest').hide();
                }
            });
        });

        $(function() {

            $('#investstatus').on('change', function() {
                let status = $(this).data('status');
                let url = $(this).data('url');

                $.ajax({

                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },

                    url: url,

                    data: {
                        status: status
                    },

                    method: "POST",

                    success: function(response) {
                        iziToast.success({

                            message: response.success,
                            position: 'topRight'
                        });
                    }
                })
            })
        })

        $(function() {

            $('#simpleIntereststatus').on('change', function() {
                let status = $(this).data('status');
                let url = $(this).data('url');

                $.ajax({

                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },

                    url: url,

                    data: {
                        status: status
                    },

                    method: "POST",

                    success: function(response) {
                        iziToast.success({

                            message: response.success,
                            position: 'topRight'
                        });
                    }
                })
            })
        })

        $(function() {

            $('#planInterestStatus').on('change', function() {
                console.log("Here");
                let status = $(this).data('status');
                let url = $(this).data('url');

                $.ajax({

                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },

                    url: url,

                    data: {
                        status: status
                    },

                    method: "POST",

                    success: function(response) {
                        iziToast.success({

                            message: response.success,
                            position: 'topRight'
                        });
                    }
                })
            })
        })
    </script>
@endpush
