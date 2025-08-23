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
        <section class="hero-section">
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
            <section class="our-team-section pb-60 mt-4" data-aos="zoom-out">
                <div class="container">
                    <div class="text-center">
                        <!--<h2 class="fs-6 fw-6 text-primary">{{__('messages.front_landing.volunteers')}}</h2>-->
                        <h3 class="fs-2 fw-6 mb-60 text-gold-custom">{{__('messages.front_landing.our_team_mates_with_good_history')}}</h3>
                    </div>
                    <div class="row">
                        @foreach($data['teams'] as $team)
                            <div class="col-lg-3 col-sm-6 col-12 our-team-block d-flex align-items-stretch mb-lg-0 mb-4">
                                <div class="card flex-fill border-0">
                                    <div class="card-image  mx-auto ">
                                        <img src="{{ $team->image_url ? : asset('front_landing/images/team-1.png')}}"
                                            alt="ummeti"
                                            class="img-fluid object-fit-cover">
                                    </div>
                                    <div class="card-body text-center d-flex flex-column">
                                        <h4 class="fs-18 fw-5">{{ $team->name }}</h4>
                                        <h5 class="text-primary fs-14 fw-5 mb-0">{{ $team->designation }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
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

