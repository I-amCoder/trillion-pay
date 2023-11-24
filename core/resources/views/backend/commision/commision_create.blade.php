@extends('backend.layout.master')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $pageTitle }}</h1>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.sponser.commision.update') }}">
                            @csrf
                            <div class="card-header">

                                <h6>{{ __('Enter all information below:') }}</h6>
                                <br>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>{{ __('Enter number of percent') }}</label>
                                        <input type="number" name="percent" class="form-control" value="{{ @$commision_data->percent }}" id="commision"
                                            required>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer mb-3">
                                <button class="btn btn-primary">{{ @$commision_data ?  __('Update') : __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @isset($commision_data)


                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('percent') }}</th>

                                            <th>{{ __('status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                         <td>{{ 1 }}</td>
                                         <td>{{ $commision_data->percent }}</td>
                                         <td>
                                            @if ($commision_data->status)
                                            <div class="badge badge-success">{{ __('Active') }}</div>
                                        @else
                                            <div class="badge badge-danger">{{ __('Inactive') }}</div>
                                        @endif
                                         </td>

                                                <td>
                                                    <a href="{{ route('admin.sponser.commision.delete', $commision_data->id) }}"><button
                                                    class="btn btn-md btn-danger delete"><i
                                                        class="fa fa-trash"></i></button></a>
                                                    {{-- <button
                                                        class="btn btn-md btn-danger delete"><i
                                                            class="fa fa-trash"></i><a href="{{ route('admin.sponser.commision.delete', $commision_data->id) }}"></a></button> --}}
                                                </td>
                                            </tr>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                @endisset

            </div>
        </section>
    </div>


@endsection


@push('script')

    <script>

    </script>

@endpush
