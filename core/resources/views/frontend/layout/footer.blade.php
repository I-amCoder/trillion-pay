@php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

@endphp

<footer class="footer-section has-bg-img">
    <div class="footer-top">
        <div class="map-el">
            <img src="{{ getFile('footer', $contentlink->data->map_image) }}" alt="">
        </div>
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="footer-box">
                        <a href="{{ route('home') }}">
                            <h1>
                                @if (@$general->sitename)
                                    {{ __(@$general->sitename) }}
                                @endif
                            </h1>
                        </a>
                        <p>{{ __(@$contentlink->data->footer_short_description) }}</p>
                        <div class="footer-payment">
                            <h5>{{ __('Payment Methods') }}</h5>
                            <img src="{{ getFile('footer', 'payment-method.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-box">
                        <h4 class="title">{{ __('Useful Links') }}</h4>
                        <ul class="footer-link-list">
                            <li> <a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            @forelse ($pages as $page)
                                <li><a href="{{ route('pages', $page->slug) }}">{{ __($page->name) }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-box">
                        <h4 class="title">{{ __('Our Services') }}</h4>
                        <ul class="footer-link-list">
                            @foreach ($serviceElements as $serviceelement)
                                <li><a
                                        href="{{ route('service', $serviceelement->data->slug) }}">{{ __(@$serviceelement->data->title) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer-box">
                        <h4 class="title">{{ __('Location') }}</h4>
                        <p>
                            {{ __(@$content->data->location) }}<br>
                            <strong>{{ __('Phone') }}:</strong> {{ __(@$content->data->phone) }}<br>
                            <strong>{{ __('Email') }}:</strong> {{ __(@$content->data->email) }}<br>
                        </p>
                        <ul class="social-links">
                            @forelse ($footersociallink as $item)
                                <li>
                                    <a href="{{ __(@$item->data->social_link) }}" target="_blank"
                                        class="twitter"><i class="{{ @$item->data->social_icon }}"></i></a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="text-center mb-0">
                @if (@$general->copyright)
                    {{ __(@$general->copyright) }}
                @endif
            </p>
        </div>
    </div>
</footer>
