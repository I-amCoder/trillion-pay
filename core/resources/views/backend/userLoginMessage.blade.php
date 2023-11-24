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
                        <form method="post" action="{{ route('admin.login.message.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">

                                <h6>{{ __('Enter all information below:') }}</h6>
                                <br>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>{{ __('Message') }}</label>
                                        <input type="text" class="form-control" value="{{ $msg->message ?? ""}}"
                                            name="message" required>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-8 col-sm-12 mb-3">
                                        <label class="col-form-label">{{ __('Profile Image') }}</label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url({{ getFile('admins', $msg->picture?? "") }});">
                                            <label for="image-upload" id="image-label">{{ __('Choose File') }}</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check ">
                                            <input name="status" {{ ($msg->status ?? 1) == 1 ? 'checked' : '' }}
                                                class="form-check-input" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Show on Frontend
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer mb-3">
                                <button class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection


@push('script')
    <script>
        'use strict'

        $(function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "{{ __('Choose File') }}", // Default: Choose File
                label_selected: "{{ __('Update Image') }}", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
@endpush
