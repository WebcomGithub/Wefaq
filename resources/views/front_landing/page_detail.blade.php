@extends('front_landing.layouts.app')
@section('title')
    {{ __('messages.pages') }}
@endsection
@section('content')
    <div class="blog-page">
        <!-- start hero-section -->
        {{-- <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{asset('front_landing/images/blog-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative pe-xl-5">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p>
                                <h2 class="fs-1 mb-md-0 fw-6">{{ $page->title }}</h2>
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
        <section class="blog-section pt-100 pb-100">
            <h3 class="text-gold-custom" style="text-align: center;">
                {{$page->title}}
            </h3>

            <div style="display: flex; justify-content: center;">
                <table style="width: 50%; border-collapse: collapse; text-align: center;">
                    <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #000; padding: 8px;">التقرير</th>
                        <th style="border: 1px solid #000; padding: 8px;">الرابط</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($files))
                        @foreach ($files as $report)
                            <tr>
                                <td style="border: 1px solid #000; padding: 8px;">
                                    {{ $report['title'] }}
                                </td>
                                <td style="border: 1px solid #000; padding: 8px;">
                                    <a href="{{ asset('uploads/' . $report['filename']) }}" target="_blank" style="color: blue;">عرض</a>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>
                </table>
            </div>
        </section>
        <!-- start blog-section  -->
        <section class="blog-section pt-100 pb-100">
            <div class="container">
                <p class="fs-16 fw-5 text-dark mb-4 pb-lg-2">
                    {!! nl2br($page->description) !!}
                </p>

            </div>
        </section>
        <!-- end blog-section  -->
    </div>
@endsection
