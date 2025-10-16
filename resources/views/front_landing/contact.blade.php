@php
    $settings  = settings();
@endphp
@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.contact_us.contact_us')}}
@endsection
@section('content')
    <div class="Contact-page">
        <!-- start hero-section -->
        {{-- <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{ $contactUs['menu_image'] ? : asset('front_landing/images/causes-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">
                                @if (App::getLocale() == 'AR' && isset($contactUs['menu_title_lang']) && $contactUs['menu_title_lang'] != null)
                                        {{ json_decode($contactUs['menu_title_lang'], true)['ar'] }}
                                    @elseif (App::getLocale() == 'TR' && isset($contactUs['menu_title_lang']) && $contactUs['menu_title_lang'] != null)
                                        {{ json_decode($contactUs['menu_title_lang'], true)['tr'] }}
                                    @else
                                        {{ $contactUs['menu_title'] }}
                                    @endif
                                <h2 class="fs-1 mb-md-0 fw-6">{{__('messages.contact_us.contact_us')}}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section> --}}
        <section class="hero-section" data-aos="fade-left">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators d-flex d-xl-none">
                        @for($i = 0; $i< count($data['homepageThreeSliders']);$i++)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"
                                    @if($i == 0) class="active" aria-current="true"
                                    @endif aria-label="Slide {{$i+1}}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                         @foreach($data['homepageThreeSliders'] as $slider)
                             <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                 <div class="inner-bgimg position-relative object-fit-cover"
                                     style="background: url('{{ $slider->slider_image ? : asset('front_landing/images/hero-image.png')}}') no-repeat right;">
                                     <div class="container">
                                         <div class="row">
                                             <div class="col-lg-5 col-md-7 parallelogram-shape">
                                                 <div class="text-white inner-text position-relative">

                                                     <p class="fs-18 fw-5">
                                                         @if (App::getLocale() == 'AR' && $slider->title_1_lang != null)
                                                             {{ $slider->title_1_lang['ar'] ??  ''}}
                                                         @elseif (App::getLocale() == 'TR' && $slider->title_1_lang != null)
                                                             {{ $slider->title_1_lang['tr'] ??  ''}}
                                                         @else
                                                             <p class="fs-18 fw-5">{{ $slider->title_1 }}</p>
                                                         @endif
                                                     </p>

                                                     <h2 class="fs-1 mb-0 fw-6">
                                                         @if (App::getLocale() == 'AR' && $slider->title_2_lang != null)
                                                             {{ $slider->title_2_lang['ar'] ??  ''}}
                                                         @elseif (App::getLocale() == 'TR' && $slider->title_2_lang != null)
                                                             {{ $slider->title_2_lang['tr'] ??  ''}}
                                                         @else
                                                             <p class="fs-18 fw-5">{{ $slider->title_2 }}</p>
                                                         @endif
                                                     </h2>
                                                 </div>
                                             </div>
                                              {{-- <div class="col-lg-7 col-md-5 mt-3 mt-md-4">
                                                 <div class="video-play-btn m-lg-auto ms-md-auto">
                                                     <button type="button"
                                                             class="play-video popup-video fs-4 border-0 slider-popup-video"
                                                             data-src="https://ummeti.mynet.net/video/ummeti1.mp4">
                                                         <i class="fas fa-play text-primary"></i>
                                                     </button>
                                                 </div>
                                             </div> --}}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                        <!-- Modal -->
                        <div class="modal fade" id="homePageVideoModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close text-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body w-100">
                                            <iframe src=""
                                                    class="w-100 h-100 home-page-video" title="YouTube video player"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    {{--<div class="carousel-inner">
                        @foreach($allSlides as $slide)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="inner-bgimg position-relative object-fit-cover"
                                     style="background: url('{{ $slide->image ?? $slide->slider_image ?? asset('front_landing/images/hero-image.png')}}') no-repeat right;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-7 parallelogram-shape">
                                                <div class="text-white inner-text position-relative">

                                                    --}}{{-- العنوان الأول --}}{{--
                                                    <p class="fs-18 fw-5">
                                                        @if (isset($slide->title_lang))
                                                            --}}{{-- campaign --}}{{--
                                                            @if (App::getLocale() == 'AR')
                                                                {{ $slide->title_lang['ar'] ?? '' }}
                                                            @elseif (App::getLocale() == 'TR')
                                                                {{ $slide->title_lang['tr'] ?? '' }}
                                                            @else
                                                                {{ $slide->title }}
                                                            @endif
                                                        @else
                                                            --}}{{-- slider --}}{{--
                                                            @if (App::getLocale() == 'AR')
                                                                {{ $slide->title_1_lang['ar'] ?? '' }}
                                                            @elseif (App::getLocale() == 'TR')
                                                                {{ $slide->title_1_lang['tr'] ?? '' }}
                                                            @else
                                                                {{ $slide->title_1 }}
                                                            @endif
                                                        @endif
                                                    </p>

                                                    --}}{{-- الوصف --}}{{--
                                                    <h2 class="fs-1 mb-0 fw-6">
                                                        @if (isset($slide->short_description_lang))
                                                            --}}{{-- campaign --}}{{--
                                                            @if (App::getLocale() == 'AR')
                                                                {{ $slide->short_description_lang['ar'] ?? '' }}
                                                            @elseif (App::getLocale() == 'TR')
                                                                {{ $slide->short_description_lang['tr'] ?? '' }}
                                                            @else
                                                                {{ $slide->short_description }}
                                                            @endif
                                                        @else
                                                            --}}{{-- slider --}}{{--
                                                            @if (App::getLocale() == 'AR')
                                                                {{ $slide->title_2_lang['ar'] ?? '' }}
                                                            @elseif (App::getLocale() == 'TR')
                                                                {{ $slide->title_2_lang['tr'] ?? '' }}
                                                            @else
                                                                {{ $slide->title_2 }}
                                                            @endif
                                                        @endif
                                                    </h2>
                                                </div>
                                            </div>

                                            --}}{{-- إذا كان slider وليس campaign أضف الفيديو --}}{{--
                                            @if (isset($slide->slider_image))
                                                <div class="col-lg-7 col-md-5 mt-3 mt-md-4">
                                                    <div class="video-play-btn m-lg-auto ms-md-auto">
                                                        <button type="button"
                                                                class="play-video popup-video fs-4 border-0 slider-popup-video"
                                                                data-src="https://ummeti.mynet.net/video/ummeti1.mp4">
                                                            <i class="fas fa-play text-primary"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>--}}

                    <div class="d-none d-xl-block">
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('messages.common.previous')}}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('messages.common.next')}}</span>
                        </button>
                    </div>
                </div>

            </section>
        <!-- end hero-section -->

        <!-- start contact-section -->
        <section class="contact-section pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-sm-5 mb-4">
                        <div class="d-flex align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-envelope text-gold-custom"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-gold-custom">{{__('messages.front_landing.email_address')}}</h4>
                                <a href="mailto:{{ $settings['email'] }}" class="text-gray fs-16 fw-5">
                                    <span class="text-dark">{{ $settings['email'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-sm-5 mb-4">
                        <div class="d-flex  align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-phone text-gold-custom"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-gold-custom">{{__('messages.profile.phone_number')}}</h4>
                                <a href="tel:+{{ $settings['phone'] }}"
                                   class="text-dark fs-16 fw-5">{{ $settings['phone'] }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="d-flex  align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-location-dot text-gold-custom"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-gold-custom">{{__('messages.front_landing.office_address')}}</h4>
                                <a href="#!" class="text-dark fs-16 fw-5">{{ $settings['address'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form pt-60 pb-60">
                    <div class="text-center text-gold-custom pb-20">
                            <h1>{{__('messages.front_landing.get_in_touch')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-lg-0 mb-5">
                            <div id="map" class="map ">
                                <iframe {!! explode(' ',getSettingValue('location_embedded_code'))[1] ?? '' !!} class="w-100 h-100 object-fit-cover rounded-10 border-0" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form id="getInTouchForm" class="row conact-form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="name" name="name" class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_first_name'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="email" name="email" class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_email_address'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="tel" id="phone" class="form-control fs-14 text-dark" name="phone"
                                               onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'
                                               placeholder="{{(__('messages.front_landing.enter_phone_number'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="subject" name="subject"
                                               class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_subject'))}} *"
                                               required>
                                    </div>
                                    <div class="col-12 mb-4 pb-2">
                                        <textarea class="form-control fs-14 text-dark" id="message" name="message"
                                                  rows="4"
                                                  placeholder="{{(__('messages.front_landing.enter_message'))}} *"
                                                  required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-gold-custom me-3"
                                                id="getInTouchSaveBtn">{{__('messages.front_landing.get_a_quote')}}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end contact-section -->

    </div>
@endsection
