<!-- start header section -->
@php
    $pages  = pages();
@endphp
{{-- new update--}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
        background-color: #1877F2;
        color: white;
        transform: scale(1.05); 
        transition: all 0.2s ease;
    }

    .social-icon.twitter:hover {
        background-color: #000000;
        color: white;
        transform: scale(1.05);
        transition: all 0.2s ease;
    }

    .social-icon.linkedin:hover {
        background-color: #0A66C2;
        color: white;
        transform: scale(1.05); 
        transition: all 0.2s ease;
    }

    .social-icon.instagram:hover {
        background-color: #E1306C;
        color: white;
        transform: scale(1.05); 
        transition: all 0.2s ease;
    }

    .social-icon.youtube:hover {
        background-color: #E60000;
        color: white;
        transform: scale(1.05); 
        transition: all 0.2s ease;
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
        color: #c4d4fa;
        text-decoration: none;
    }

    .dropdown-nav li a:hover {
        background-color: #c4d4fa;
    }

    .active {
        color: #4664aa !important;
    }

    .mobile_active {
        color: white !important;
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

    .userway_buttons_wrapper {
        top: 60% !important;
    }

    header .navbar .navbar-nav .nav-item .dropdown-nav li .active, header .navbar .navbar-nav .nav-item .dropdown-nav li:hover {
        background-color: #FFFFFF !important;
    }

    .text-gold-custom{
        color: #8b824f !important;
    }

    .btn-gold-custom {
    background-color: #8b824f !important;
    border-color: #8b824f !important;
    color: white !important;
    }

    /* Hover state - slightly darker */
    .btn-gold-custom:hover {
        background-color: #756d43 !important;
        border-color: #6a6340 !important;
    }

    /* Focus state - same as hover */
    .btn-gold-custom:focus,
    .btn-gold-custom.focus {
        background-color: #756d43 !important;
        border-color: #6a6340 !important;
        box-shadow: 0 0 0 0.25rem rgba(139, 130, 79, 0.5) !important;
    }

    /* Active state - even darker */
    .btn-gold-custom:active,
    .btn-gold-custom.active {
        background-color: #5f5938 !important;
        border-color: #565232 !important;
    }

    
        .image-container {
            position: relative;
            display: inline-block;
            margin: 5px;
        }

        .image-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-caption {
            opacity: 1;
        }

        .counter-item {
            transition: transform 0.3s ease;
        }

        .counter-item:hover {
            transform: scale(1.5);
            cursor: pointer;
        }

        .card-img img {
            transition: transform 0.3s ease;
        }
        .card-img:hover img {
            transform: scale(1.2);
        }
        
        .card-image img {
            transition: transform 0.3s ease;
        }
        .card-image:hover img {
            transform: scale(1.5);
        }

        .category-card {
            transition: filter 0.3s ease;      
        }
        .category-card:hover {
            filter: brightness(0.7);
        }

        .about-1 img {
            transition: transform 0.3s ease;
        }

        .about-1:hover img {
            transform: scale(1.1);
        }

        .about-2 img {
            transition: transform 0.3s ease;
        }
        .about-2:hover img {
            transform: scale(1.1);            
        }

        .company-logo img{
            transition: transform 0.3s ease;            
        }

        .company-logo:hover img{
            transform: scale(1.4);
        }
</style>
 <style>
    /* إخفاء السوشيال + الكونتاكت في الموبايل (سيظهروا داخل المنيو) */
    @media (max-width: 991.98px) {
      .top-contact,
      .top-social {
        display: none !important;
      }
    }

    .icon-circle {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;        
      height: 40px;
      background-color: #e0e0e0; 
      border-radius: 50%;  
      color: #000;         
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .icon-circle:hover {
      background-color: #b0b0b0; 
      color: #fff;               
    }

    .icon-circle i {
      font-size: 1.2rem;  
    }
  </style>
  <header class="bg-light py-2 border-bottom">
    <div class="container-fluid px-5 d-none d-lg-flex align-items-center justify-content-between">
      <!-- Right (Social Media) -->
      <div class="d-flex gap-3 top-social">
            <a href="{{ $settings['facebook_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="{{ $settings['twitter_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-x"></i>
            </a>
            <a href="{{ $settings['instagram_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="{{ $settings['youtube_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-youtube"></i>
            </a>
      </div>

      <!-- Center (Logo) -->
      <div class="text-center">
            <a href="{{ route('landing.home') }}">
                <img src="{{ getLogoUrl() ?: asset('front_landing/images/wefaq-logo.jpg') }}" alt="Logo"
                class="img-fluid" style="width: 150px;"/>
            </a>
      </div>

      <!-- Left (Contact Info) -->
      <div class="d-flex gap-3 top-contact">
        <span><i class="bi bi-telephone"></i> {{$settings['phone'] }}</span>
        <span><i class="bi bi-envelope"></i> {{ $settings['email'] }}</span>
      </div>
    </div>

    <!-- Navbar (Desktop + Mobile) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid px-5 d-flex justify-content-between align-items-center">
        <!-- Logo for Mobile -->
        <a href="{{ route('landing.home') }}" class="navbar-brand d-lg-none">
            <img src="{{ getLogoUrl() ?: asset('front_landing/images/wefaq-logo.jpg') }}" alt="Logo" class="img-fluid" style="width: 100px;"/>
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-between" id="mainMenu">
          <!-- Menu Links -->
          <ul class="navbar-nav mb-3 mb-lg-0" style="padding-left: 0; padding-right: 0;">
            <li class="nav-item">
                <a class="nav-link text-dark {{ Request::is('/') ? 'active' : ''}}  fw-5 fs-{{ App::getLocale() == 'en' ? '14' : '5' }}"
                    aria-current="page"
                    href="{{ route('landing.home') }}">{{__('messages.front_landing.home')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ Request::is('about-us') ? 'active' : ''}} fw-5 fs-{{ App::getLocale() == 'en' ? '14' : '5' }}"
                    href="{{ route('landing.about') }}">{{__('messages.front_landing.about')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ Request::is('causes','c/*') ? 'active' : '' }} fw-5 fs-{{ App::getLocale() == 'en' ? '14' : '5' }}"
                    href="{{ route('landing.causes') }}">{{__('messages.front_landing.causes')}}</a>
                <ul class="dropdown-nav ps-0">
                    @foreach($campaignsCategories as $category)
                        @php
                            $campaignCount = getCampaignCount($category->id)
                        @endphp
                        @if($campaignCount > 0)
                            <li>
                                <a href="{{ route('landing.causes',$category->id) }}" class="fs-14 fw-5 text-dark">
                                            @if (App::getLocale() == 'AR' && $category->name_lang != null)
                                                {{ $category->name_lang['ar'] ??  ''}}
                                            @elseif (App::getLocale() == 'TR' && $category->name_lang != null)
                                                {{ $category->name_lang['tr'] ??  ''}}
                                            @else
                                                <p class="fs-18 fw-5">{{ $category->name }}</p>
                                            @endif
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark  fw-5 fs-{{ App::getLocale() == 'en' ? '14' : '5' }} {{ Request::is('news', 'news-details*') ? 'active' : '' }}"
                    href="{{ route('landing.news') }}">{{ __('messages.news.news') }}</a>
                <ul class="dropdown-nav ps-0">
                    @foreach ($latestFiveNews as $news)
                            <li>
                                <a href="{{route('landing.news-details',$news->slug)}}"
                                    class="fs-14 fw-5 text-dark">{!! nl2br(\Illuminate\Support\Str::limit($news->title)) !!}

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
                <a class="nav-link text-dark  fw-5  fs-{{ App::getLocale() == 'en' ? '14' : '5' }} {{ Request::is('contact-us') ? 'active' : '' }}"
                    href="{{ route('landing.contact') }}">{{ __('messages.contact_us.contact_us') }}</a>
            </li>
            {{--تقارير الجمعية--}}
            <li class="nav-item">
                <a class="nav-link text-dark  fw-5  fs-{{ App::getLocale() == 'en' ? '14' : '5' }} {{ Request::is('page*') ? 'active' : '' }}"
                    href="#">{{ __('messages.front_landing.association_reports') }}</a>
                <ul class="dropdown-nav ps-0">
                    @foreach ($pages as $page)
                        @if ($page->is_active)
                            <li>
                                <a href="{{ route('landing.page.detail', $page->id) }}"
                                    class="fs-14 fw-5 text-dark">{!! nl2br(\Illuminate\Support\Str::limit($page->name)) !!}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
          </ul>

          <!-- Language + Complaints -->
          <div class="d-flex align-items-center gap-2 mb-3 mb-lg-0">
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-dark fw-5 fs-14" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-language me-1"></i>
        {{ getHeaderLanguageName() }}
    </a>
    <ul class="dropdown-menu">
        @foreach (getAllLanguage() as $language)
            <li>
                <a class="dropdown-item {{ $language->iso_code == App::getLocale() ? 'active' : '' }}"
                   href="{{ route('landing.change-language', $language->iso_code) }}"
                   data-prefix-value="{{ $language->iso_code }}">
                   {{ $language->name }}
                </a>
            </li>
        @endforeach
    </ul>
</li>

            <a class="btn fw-bold px-3 py-2 ms-lg-2"
                href="{{ route('landing.complaints') }}" style="background-color: #4664aa; color:white">
                {{ __('messages.front_landing.complaints_tab') }}
            </a>
          </div>

          <!-- Contact + Social for Mobile Only -->
          <div class="d-lg-none mt-3">
            <div class="d-flex justify-content-center gap-3 mb-2">
              <a href="{{ $settings['facebook_url'] }}" target="_blank" class="icon-circle">
                <i class="bi bi-facebook"></i>
                </a>
                <a href="{{ $settings['twitter_url'] }}" target="_blank" class="icon-circle">
                    <i class="bi bi-x"></i>
                </a>
                <a href="{{ $settings['instagram_url'] }}" target="_blank" class="icon-circle">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="icon-circle">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="{{ $settings['youtube_url'] }}" target="_blank" class="icon-circle">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>
            <div class="text-center">
              <div><i class="bi bi-telephone"></i> +972 599 000 000</div>
              <div><i class="bi bi-envelope"></i> info@example.com</div>
            </div>
          </div>

        </div>
      </div>
    </nav>
  </header>