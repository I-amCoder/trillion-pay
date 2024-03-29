<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ getFile('icon', @$general->favicon) }}">
    <title>
        @if (@$general->sitename)
            {{ __(@$general->sitename) . '-' }}
        @endif
        {{ __(@$pageTitle) }}
    </title>
    <link href="{{ asset('asset/theme2/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('asset/theme2/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme2/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme2/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme2/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme2/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/theme2/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/theme2/frontend/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme2/frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme2/frontend/css/font-awsome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme2/frontend/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/theme2/frontend/css/iziToast.min.css') }}">
    <link href="{{ asset('asset/theme2/frontend/css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>


    {{-- <link rel="stylesheet"
        href="{{ asset('asset/theme2/frontend/css/color.php?primary_color=' . str_replace('#', '', @$general->primary_color)) }}"> --}}
    <style>
        .goog-logo-link {
            display: none !important;
        }


        .goog-te-gadget {
            color: transparent !important;
        }

        .goog-te-gadget span {
            display: none !important;
        }

        body>.skiptranslate {
            display: none;
        }

        /* Style the custom dropdown */
        .goog-te-combo {
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            background-color: #fff;
            font-size: 14px;
            color: #333;
            max-width: 140px;
            /* Adjust the width as needed */
        }
    </style>

    @stack('style')

</head>

<body>

    @if (@$general->preloader_status)
        <div id="preloader"></div>
    @endif



    @if (@$general->analytics_status)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ @$general->analytics_key }}"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "{{ @$general->analytics_key }}");
        </script>
    @endif

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex flex-wrap align-items-center">
                {{-- <button type="button" class="sidebar-open-btn me-3">
                    <i class="bi bi-arrow-bar-left"></i>
                    <i class="bi bi-arrow-bar-right"></i>
                </button> --}}
                <h3 class="logo me-auto p-2 me-lg-0 ">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard

                    </a>
                </h3>
            </div>
            <div class="header-right d-flex">
                {{-- <select class="changeLang" aria-label="Default select example">
                    @foreach ($language_top as $top)
                        <option value="{{ $top->short_code }}"
                            {{ session('locale') == $top->short_code ? 'selected' : '' }}>
                            {{ __(ucwords($top->name)) }}
                        </option>
                    @endforeach
                </select> --}}
                <div id="google_translate_element"></div>
                <div class="dropdown ms-3">
                    <button class="dropdown-toggle user-toggle-menu" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (@Auth::user()->image)
                            <img src="{{ getFile('user', @Auth::user()->image) }}" alt="pp">
                        @else
                            <img src="{{ asset('asset/theme2/frontend/img/user.png') }}" alt="pp">
                        @endif
                        <span class="text-white ms-2">{{ auth()->user()->full_name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="dropdownMenuButton1">

                        <li><a class="dropdown-item" href="{{ route('user.2fa') }}">{{ __('2FA') }}</a>
                        </li>
                        <li><a class="dropdown-item"
                                href="{{ route('user.profile') }}">{{ __('Settings') }}</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('user.logout') }}">{{ __('Logout') }}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </header><!-- End Header -->


    <main id="main" class="dashboard-main">
        <section class="dashboard-section">

            {{-- @include(template().'layout.user_sidebar') --}}
            @yield('content2')
        </section>
    </main>

    @php
        $content = content('contact.content');
        $contentlink = content('footer.content');
        $footersociallink = element('footer.element');
        $serviceElements = element('service.element');
    @endphp

    <script src="{{ asset('asset/theme2/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/js/selectric.min.js') }}"></script>

    <script src="{{ asset('asset/theme2/frontend/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('asset/theme2/frontend/js/user_dashboard.js') }}"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>


    @stack('script')
    @if (@$general->twak_allow)
        <script type="text/javascript">
            'use strict'
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/{{ @$general->twak_key }}";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            "use strict";
            iziToast.error({
                message: "{{ session('error') }}",
                position: 'topRight'
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            "use strict";
            iziToast.success({
                message: "{{ session('success') }}",
                position: 'topRight'
            });
        </script>
    @endif

    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ trans($msg[1]) }}",
                    position: "topRight"
                });
            </script>
        @endforeach
    @endif

    @if (@$errors->any())
        <script>
            "use strict";
            @foreach ($errors->all() as $error)
                iziToast.error({
                    message: '{{ __($error) }}',
                    position: "topRight"
                });
            @endforeach
        </script>
    @endif


    <script>
        'use strict'
        var url = "{{ route('user.changeLang') }}";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });

        // responsive menu slideing
        $(".d-sidebar-menu>li>a").on("click", function() {
            var element = $(this).parent("li");
            if (element.hasClass("open")) {
                element.removeClass("open");
                element.find("li").removeClass("open");
                element.find("ul").slideUp(500, "linear");
            } else {
                element.addClass("open");
                element.children("ul").slideDown();
                element.siblings("li").children("ul").slideUp();
                element.siblings("li").removeClass("open");
                element.siblings("li").find("li").removeClass("open");
                element.siblings("li").find("ul").slideUp();
            }
        });

        $('.sidebar-open-btn').on('click', function() {
            $(this).toggleClass('active');
            $('.d-sidebar').toggleClass('active');
        });
    </script>
</body>

</html>
