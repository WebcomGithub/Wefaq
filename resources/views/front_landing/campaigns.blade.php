@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.front_landing.causes')}}
@endsection

@section('page_css')
@if (App::getLocale() == 'AR')
<style>
    .news-right-section .rectangle-shape {
        position: static;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
</style>   
@endif
@endsection

@section('content')
    <div class="our causes-page">
        <!-- start hero-section -->
        {{-- <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{ $contactUs['menu_image'] ? : asset('front_landing/images/causes-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p>
                                <h2 class="fs-1 mb-md-0 fw-6">{{__('messages.front_landing.our_causes')}}</h2>
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

        <!-- start trending-causes-section -->
        <section class="trending-causes-section pt-100 pb-100">
            <div class="px-lg-5 px-md-2 ps-2 pe-2">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-xl-3 pt-5" >
                        <div class="news-right-section">
                            <div class="popular-tags bg-light rounded-10 position-relative ">
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0">{{ __('messages.front_landing.all_categories') }}</h5>
                                    <div class="rectangle-shape"></div>
                                </div>
                                <div class="tags">
                                    @if(count($campaignCategories) > 0 )
                                        <div class="tag me-2 mb-2">
                                            <a class="fs-16 text-dark fw-5  radius-four {{ $campaignCategoryId  ? '' : 'active' }} campaign_category_id">{{__('messages.front_landing.all')}}</a>
                                        </div>
                                    @else
                                        <p class="font-weight-bold">{{__('messages.front_landing.no_campaigns_available_at_this_moment')}}</p>
                                    @endif
                                    @foreach($campaignCategories as $campaignCategory)
                                        @php
                                            $campaignCount = getCampaignCount($campaignCategory->id)
                                        @endphp
                                        @if($campaignCount > 0)
                                            <div class="tag me-2 mb-2">
                                                <a class="fs-16 text-dark fw-5 campaign_category_id radius-four {{ ($campaignCategoryId == $campaignCategory->id) ? 'active' : '' }}"
                                                   data-id="{{ $campaignCategory->id }}">
                                                    @if (App::getLocale() == 'AR' && $campaignCategory->name_lang != null)
                                                        {{ $campaignCategory->name_lang['ar'] ??  '' }}
                                                    @elseif (App::getLocale() == 'TR' && $campaignCategory->name_lang != null)
                                                        {{ $campaignCategory->name_lang['tr'] ??  '' }}
                                                    @else
                                                        {{ $campaignCategory->name }}
                                                    @endif
                                                   </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9  col-lg-8 ">
                        @livewire('show-campaigns',['campaignCategoryId'=>$campaignCategoryId])
                    </div>
                </div>
            </div>
        </section>
        <!-- end trending-causes-section -->
    </div>
@endsection
