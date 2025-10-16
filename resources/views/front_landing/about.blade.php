<?php
$settings = settings();
?>
@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.about_us.about_us')}}
@endsection
@section('content')

    <div class="about-page">
        <!-- start hero-section -->
        {{-- <section class="hero-section">
            <div class="inner-bgimg position-relative"
                 style="background: url('{{ $aboutUs['menu_bg_image']?:asset('front_landing/images/about-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">
                                    @if (App::getLocale() == 'AR' && $aboutUs['menu_title_lang'] != null)
                                        {{ json_decode($aboutUs['menu_title_lang'], true)['ar'] }}
                                    @elseif (App::getLocale() == 'TR' && $aboutUs['menu_title_lang'] != null)
                                        {{ json_decode($aboutUs['menu_title_lang'], true)['tr'] }}
                                    @else
                                        {{ $aboutUs['menu_title'] }}
                                    @endif
                                    </p>
                                <h2 class="fs-1 mb-md-0 fw-6"> {{__('messages.about_us.about_us')}} </h2>
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

        <!-- start about-section -->
        <section class="about-section pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-7 col-lg-8">
                        <div class="about-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-1">
                                        <img src="{{ $aboutUs['image_1'] ? :asset('front_landing/images/about-us1.png')}}"
                                             class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="about-content-box bg-primary ">
                                        <div class="about-content d-flex flex-column align-items-center justify-content-center ">
                                            <h2 class="number-big text-white fs-1 fw-6 counter"
                                                data-countto="{{ $aboutUs['years_of_exp'] }}"
                                                data-duration="3000">
                                            </h2>
                                            <p class="mb-0 text-white fs-14 fw-5">{{__('messages.about_us.years_of_exp')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-md-flex align-items-center">
                                    <div class="about-2">
                                        <img src="{{$aboutUs['image_2']  ? : asset('front_landing/images/about-us2.png')}}"
                                             class="w-100 h-100 object-fit-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-5 col-lg-4 mt-lg-0 mt-sm-5 mt-4">
                        <div class="about-right">
                            <p class="text-gold-custom fs-2 fw-6 mb-3 pb-1">{{__('messages.about_us.about_us')}}</p>
                            <h2 class="text-dark fw-6 mb-3 pb-1">
                                @if (App::getLocale() == 'AR' && $aboutUs['title_lang'] != null)
                                    {{ json_decode($aboutUs['title_lang'], true)['ar'] }}
                                @elseif (App::getLocale() == 'TR' && $aboutUs['title_lang'] != null)
                                    {{ json_decode($aboutUs['title_lang'], true)['tr'] }}
                                @else
                                    {{ $aboutUs['title'] }}
                                @endif
                                
                            </h2>
                            <p class="text-dark fs-16 fw-5 mb-4 pb-lg-3">
                                
                                @if (App::getLocale() == 'AR' && $aboutUs['short_description_lang'] != null)
                                    {{ json_decode($aboutUs['short_description_lang'], true)['ar'] }}
                                @elseif (App::getLocale() == 'TR' && $aboutUs['short_description_lang'] != null)
                                    {{ json_decode($aboutUs['short_description_lang'], true)['tr'] }}
                                @else
                                    {{ $aboutUs['short_description'] }}
                                @endif
                            </p> 
                            {{-- <ul>
                                <li class="text-dark fs-16 fw-5 mb-2">{{ $aboutUs['point_1'] }}</li>
                                <li class="text-dark fs-16 fw-5 mb-2">{{ $aboutUs['point_2'] }}</li>
                                <li class="text-dark fs-16 fw-5 mb-2">{{ $aboutUs['point_3'] }}</li>
                                <li class="text-dark fs-16 fw-5 mb-2">{{$aboutUs['point_4']}}</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about-section -->

            <!-- start our-team-section -->
           
        <!-- end our-team-section -->
        @if(count($successStories) > 0)
            <section class="success-stories-section pb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-11 col-11">
                            <div class="section-title section-title-four b-top text-center head-title">
                                <h1 class="text-gold-custom fs-2 fw-6 mb-5"> {{__('messages.success_story.success_story')}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="success-stories-content bg-gray px-sm-5 py-sm-5 px-4 py-4">
                        @foreach($successStories as $successStory)
                            <div class="row d-flex align-items-center pb-3 pt-3 border-bottom">
                                <div class="col-xxl-8 col-lg-7 pe-xxl-4 pe-lg-2">
                                    <div class="stories-content">
                                        <h3 class="text-primary fw-6 mb-3 pb-1">{{ $successStory->title }}</h3>
                                        <p class="text-dark fs-16 fw-5 mb-lg-0 mb-sm-5 mb-4">
                                            {!! $successStory->short_description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-5">
                                    <div class="stories-img">
                                        <img src="{{$successStory->image ? : asset('front_landing/images/success-stories.png')}}"
                                             alt="{{ $successStory->title }}" class="w-100 h-100 rounded-10 object-fit-cover">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    <!-- end success-stories-section -->
    </div>
@endsection

