<!-- start header section -->
@php
    $pages  = pages();
@endphp
{{-- new update--}}
<style>
    .social-icons .social-icon {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        background-color: #f1f1f1;
        color: #333;
        border-radius: 50%;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease-in-out;
    }

    .social-icon.facebook:hover {
        background-color: #3b5998;
        color: white;
    }

    .social-icon.twitter:hover {
        background-color: #1da1f2;
        color: white;
    }
    .nav-item {
        position: relative;
    }

    .nav-item > .dropdown-nav {
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        background: white;
        min-width: 200px;
        padding: 0;
        margin: 0;
        list-style: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        z-index: 999;
    }

    .nav-item:hover > .dropdown-nav {
        display: block;
    }

    .dropdown-nav li a {
        display: block;
        padding: 8px 16px;
        color: #333;
        text-decoration: none;
    }

    .dropdown-nav li a:hover {
        background-color: #c0edfa;
    }

    .active {
        color: #6ac9e3 !important;
    }

/* Offcanvas styling */
.offcanvas-body {
    scrollbar-width: thin;
    scrollbar-color: var(--primary) transparent;
}

/* Active state */
.bg-primary-soft {
    background-color: rgba(var(--primary-rgb), 0.1);
}

.nav-link.active:hover {
    background-color: rgba(var(--primary-rgb), 0.15);
}

/* Accordion overrides */
.accordion-button:not(.collapsed) {
    background-color: transparent;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

/* Country flags (requires flag-icons.css) */
.fi {
    width: 1.2em;
    height: 1em;
    border-radius: 2px;
    box-shadow: 0 0 1px rgba(0,0,0,0.5);
}

</style>
<header class="sticky-top bg-white shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-4 d-flex align-items-center">
                {{-- الشعار --}}
                <div class="header-logo me-2" style="max-width: 60px;">
                    <a href="{{ route('landing.home') }}">
                        <img src="{{ getLogoUrl() ?: asset('front_landing/images/wefaq-logo.jpg') }}" alt="Jobs"
                             class="img-fluid" />
                    </a>
                </div>

                {{-- أيقونات التواصل بشكل أفقي --}}
                <div class="social-icons d-flex flex-row gap-2 me-5">
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" class="social-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $settings['twitter_url'] }}" target="_blank" class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="social-icon twitter">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="{{ $settings['instagram_url'] }}" target="_blank" class="social-icon twitter">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $settings['youtube_url'] }}" target="_blank" class="social-icon twitter">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-9 col-8 ">
                <nav class="navbar navbar-expand-lg navbar-dark justify-content-end py-0">
                    <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav align-items-center py-2 py-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ Request::is('/') ? 'active' : ''}}  fw-5 fs-14"
                                   aria-current="page"
                                   href="{{ route('landing.home') }}">{{__('messages.front_landing.home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ Request::is('about-us') ? 'active' : ''}} fw-5 fs-14"
                                   href="{{ route('landing.about') }}">{{__('messages.front_landing.about')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark {{ Request::is('causes','c/*') ? 'active' : '' }} fw-5 fs-14"
                                   href="{{ route('landing.causes') }}">{{__('messages.front_landing.causes')}}</a>
                                <ul class="dropdown-nav ps-0">
                                    @foreach ($data['campaigns'] as $campaign)
                                        <li>
                                            <a href="{{ route('landing.campaign.details',$campaign->slug) }}"
                                               class="fs-14 fw-5 text-dark {{ Request::is('page/' . $campaign->id) ? 'active' : '' }}">
                                                {{ App::getLocale() == 'AR' && $campaign->title_lang
                                                    ? Str::limit($campaign->title_lang['ar'] ?? '', 70)
                                                    : (App::getLocale() == 'TR' && $campaign->title_lang
                                                        ? Str::limit($campaign->title_lang['tr'] ?? '', 70)
                                                        : Str::limit($campaign->title, 70)
                                                    )
                                                }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            {{--<li class="nav-item">
                                <a href="#"
                                   class="nav-link text-dark fw-5  fs-14 {{ Request::is('faqs','events','teams','event-details/*','page*') ? 'active' : '' }}">{{__('messages.pages')}}
                                   </a>
                                <ul class="dropdown-nav ps-0">
                                    <li><a href="{{ route('landing.faqs') }}"
                                           class="fs-14 fw-5 {{ Request::is('faqs') ? 'active' : '' }}">{{__('messages.faqs.faqs')}}</a>
                                    </li>
                                    <li><a href="{{ route('landing.event') }}"
                                            class="fs-14 fw-5 {{ Request::is('events', 'event-details/*') ? 'active' : '' }}">{{ __('messages.events.events') }}</a>
                                    </li>
                                    @foreach ($pages as $page)
                                        @if ($page->is_active)
                                            <li>
                                                <a href="{{ route('landing.page.detail', $page->id) }}"
                                                    class="fs-14 fw-5 text-dark {{ Request::is('page/' . $page->id) ? 'active' : '' }}">{!! nl2br(\Illuminate\Support\Str::limit($page->name)) !!}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li><a href="{{ route('landing.team') }}"
                                            class="fs-14 fw-5 text-dark {{ Request::is('teams') ? 'active' : '' }}">{{ __('messages.front_landing.team') }}</a>
                                    </li>
                                </ul>
                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link text-dark  fw-5 fs-14 {{ Request::is('news', 'news-details*') ? 'active' : '' }}"
                                    href="{{ route('landing.news') }}">{{ __('messages.news.news') }}</a>
                                <ul class="dropdown-nav ps-0">
                                    @foreach ($latestFiveNews as $news)
                                            <li>
                                                <a href="{{route('landing.news-details',$news->slug)}}"
                                                   class="fs-14 fw-5 text-dark {{ Request::is('page/' . $news->id) ? 'active' : '' }}">{!! nl2br(\Illuminate\Support\Str::limit($news->title)) !!}

                                                    <small class="mt-1 mt-md-0 fs-12 d-flex align-items-center">
                                                        <span class="font-weight-500">
                                                            - {{ $news->created_at->translatedFormat('d M Y') }}
                                                        </span>
                                                    </small>
                                                </a>
                                            </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark  fw-5  fs-14 {{ Request::is('contact-us') ? 'active' : '' }}"
                                    href="{{ route('landing.contact') }}">{{ __('messages.contact_us.contact_us') }}</a>
                            </li>
                            {{--تقارير الجمعية--}}
                            <li class="nav-item">
                                <a class="nav-link text-dark  fw-5  fs-14 {{ Request::is('page') ? 'active' : '' }}"
                                   href="{{ route('landing.contact') }}">{{ __('messages.front_landing.association_reports') }}</a>
                                <ul class="dropdown-nav ps-0">
                                    @foreach ($pages as $page)
                                        @if ($page->is_active)
                                            <li>
                                                <a href="{{ route('landing.page.detail', $page->id) }}"
                                                   class="fs-14 fw-5 text-dark {{ Request::is('page/' . $page->id) ? 'active' : '' }}">{!! nl2br(\Illuminate\Support\Str::limit($page->name)) !!}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                            {{--تقدييم شكوى--}}
                            <li class="nav-item">
                                <a class="btn fw-bold px-3 py-2 ms-lg-2 {{ Request::is('complaints') ? 'active' : '' }}"
                                   href="{{ route('landing.complaints') }}" style="background-color: #00c5ff; color:white">
                                    {{ __('messages.front_landing.complaints_tab') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark fw-5  fs-14">
                                    <i class="fas fa-language me-1"></i>
                                    {{ getHeaderLanguageName() }}</a>
                                <ul class="dropdown-nav ps-0">
                                    @foreach (getAllLanguage() as $language)
                                        <li>
                                            <a class="fs-14 fw-5 {{ $language->iso_code == App::getLocale() ? 'active' : '' }}"
                                                href="{{ route('landing.change-language', $language->iso_code) }}"
                                                data-prefix-value="{{ $language->iso_code }}">
                                                {{ $language->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                       <div class="text-lg-end header-btn-grp ms-lg-2">

                        {{-- <a href="https://online.fliphtml5.com/jhzny/ulww/" target="_blank" class="btn btn-primary mb-3 mb-lg-0">Profile</a> --}}

                        </div>
                    </div>
                </nav>
                <!--start mobile-menu -->
                <div class="offcanvas-toggle d-lg-none d-block text-end">
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <div class="offcanvas offcanvas-end text-start" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <button type="button" class="btn-close text-reset mb-3" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                       <div class="offcanvas-body p-4">
                            <nav class="navbar-nav">
                                <!-- Main Menu Items -->
                                <div class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('/') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.home') }}">
                                        <i class="fas fa-home me-3"></i>
                                        {{ __('messages.front_landing.home') }}
                                    </a>
                                </div>

                                <div class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('about-us') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.about') }}">
                                        <i class="fas fa-info-circle me-3"></i>
                                        {{ __('messages.front_landing.about') }}
                                    </a>
                                </div>

                                <div class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('causes', 'c/*') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.causes') }}">
                                        <i class="fas fa-hand-holding-heart me-3"></i>
                                        {{ __('messages.front_landing.causes') }}
                                    </a>
                                </div>

                                <!-- Pages Dropdown -->
                                <div class="accordion mb-2" id="pagesAccordion">
                                    <div class="accordion-item border-0">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('faqs', 'events', 'page*', 'event-details/*') ? 'active bg-primary-soft text-primary' : 'text-dark' }} collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#pagesCollapse">
                                                <i class="fas fa-file-alt me-3"></i>
                                                {{ __('messages.pages') }}
                                                <i class="fas fa-chevron-down ms-auto fs-12"></i>
                                            </button>
                                        </h2>
                                        <div id="pagesCollapse" class="accordion-collapse collapse" data-bs-parent="#pagesAccordion">
                                            <div class="accordion-body ps-0 py-2">
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">
                                                        <a href="{{ route('landing.faqs') }}"
                                                        class="d-flex align-items-center py-2 px-3 rounded-3 fs-14 fw-semibold {{ Request::is('faqs') ? 'active bg-primary-soft text-primary' : 'text-dark' }}">
                                                            <i class="fas fa-question-circle me-3"></i>
                                                            {{ __('messages.faqs.faqs') }}
                                                        </a>
                                                    </li>
                                                    <li class="mb-2">
                                                        <a href="{{ route('landing.event') }}"
                                                        class="d-flex align-items-center py-2 px-3 rounded-3 fs-14 fw-semibold {{ Request::is('events', 'event-details/*') ? 'active bg-primary-soft text-primary' : 'text-dark' }}">
                                                            <i class="fas fa-calendar-alt me-3"></i>
                                                            {{ __('messages.events.events') }}
                                                        </a>
                                                    </li>
                                                    @foreach ($pages as $page)
                                                        @if ($page->is_active)
                                                            <li class="mb-2">
                                                                <a href="{{ route('landing.page.detail', $page->id) }}"
                                                                class="d-flex align-items-center py-2 px-3 rounded-3 fs-14 fw-semibold {{ Request::is('page/' . $page->id) ? 'bg-primary-soft text-primary' : 'text-dark' }}">
                                                                    <i class="fas fa-file me-3"></i>
                                                                    {{ $page->name }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- News -->
                                <div class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('news', 'news-details*') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.news') }}">
                                        <i class="fas fa-newspaper me-3"></i>
                                        {{ __('messages.news.news') }}
                                    </a>
                                </div>

                                <!-- Team -->
                                <div class="nav-item mb-2">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('teams') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.team') }}">
                                        <i class="fas fa-users me-3"></i>
                                        {{ __('messages.front_landing.team') }}
                                    </a>
                                </div>

                                <!-- Contact -->
                                <div class="nav-item mb-4">
                                    <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 {{ Request::is('contact-us') ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                    href="{{ route('landing.contact') }}">
                                        <i class="fas fa-envelope me-3"></i>
                                        {{ __('messages.front_landing.contact') }}
                                    </a>
                                </div>

                                <!-- Language Dropdown -->
                                <div class="accordion mb-4" id="languageAccordion">
                                    <div class="accordion-item border-0">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button nav-link d-flex align-items-center py-2 px-3 rounded-3 fw-semibold fs-14 text-dark collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#languageCollapse">
                                                <i class="fas fa-globe me-3"></i>
                                                {{ getHeaderLanguageName() }}
                                                <i class="fas fa-chevron-down ms-auto fs-12"></i>
                                            </button>
                                        </h2>
                                        <div id="languageCollapse" class="accordion-collapse collapse" data-bs-parent="#languageAccordion">
                                            <div class="accordion-body ps-0 py-2">
                                                <ul class="list-unstyled">
                                                    @foreach (getAllLanguage() as $language)
                                                        <li class="mb-2">
                                                            <a class="d-flex align-items-center py-2 px-3 rounded-3 fs-14 fw-semibold {{ $language->iso_code == App::getLocale() ? 'active bg-primary-soft text-primary' : 'text-dark' }}"
                                                            href="{{ route('landing.change-language', $language->iso_code) }}">
                                                                <span class="fi fi-{{ strtolower(explode('-', $language->iso_code)[0]) }} me-3"></span>
                                                                {{ $language->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Auth Buttons -->
                                <div class="d-flex flex-column mt-4">
                                @if (getLogInUser())
                                                            <a href="{{ getDashboardURL() }}"
                                                                class="d-btn btn btn-primary">{{ __('messages.dashboard') }}</a>
                                                        @else
                                                            {{-- <a href="{{ route('register') }}" type="button"
                                                                class="btn btn-secondary me-xxl-3 me-3 mb-3 mb-lg-0">
                                                                {{ __('messages.front_landing.sign_up') }}</a> --}}
                                                            {{-- <a href="{{ route('login') }}"
                                                                class="btn btn-primary mb-3 mb-lg-0">{{ __('messages.common.sign_in') }}</a> --}}
                                                        @endif
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end mobile-menu -->
            </div>
        </div>
    </div>
</header>
