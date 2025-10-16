@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.news.news_details')}}
@endsection

@section('page_css')
@if (App::getLocale() == 'AR')
<style>
    .news-right-section .rectangle-shape {
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        right: unset;
        left: 0;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
</style>   
@endif
@endsection

@section('content')

    <div class="news-details-page">
        <!-- start hero-section -->
        {{-- <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{$newsDetailsImg['menu_image'] ? : asset('front_landing/images/team-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p>
                                <h2 class="fs-1 mb-md-0 fw-6">{{__('messages.news.news_details')}}</h2>
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

        <!-- start news-details-section -->
        <div class="news-section ">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-8">
                        <!-- start news-details-left-section-->
                        <div class="news-details-left-section pt-100 ">
                            <h5 class="title text-dark fw-6 fs-20 pb-1">
                                @if (App::getLocale() == 'AR')
                                    {{$news->title_ar}}
                                @else
                                    {{$news->title}}
                                @endif
                            </h5>
                            <div class="news-details-img rounded-10 mb-20">
                                <img src="{{ !empty($news->news_image) ? $news->news_image : url(asset('front_landing/images/news-details-img.png')) }}"
                                     class="w-100 h-100 card-img-top object-fit-cover rounded-10" alt="card">
                            </div>
                            <div class="d-flex flex-wrap mb-20">
                                <div class="mb-2 me-4 pe-xxl-3">
                                    <i class="fa-solid fa-message text-primary me-2"></i>
                                    <span class="fs-14 fw-5 text-primary"
                                          id="commentCounts">{{$allCommnets->count()}} {{__('messages.news_comments.comments')}}</span>
                                </div>
                                <div class="mb-2">
                                    <i class="fa-solid fa-calendar text-primary me-2"></i>
                                    <span class="fs-14 fw-5 text-primary">{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                </div>
                            </div>
                            <p class="fs-16 fw-5 text-dark">
                                @if (App::getLocale() == 'AR')
                                    {!! nl2br($news->description_ar) !!}
                                @else
                                    {!! nl2br($news->description) !!}
                                @endif

                            </p>
                            <div class="row justify-content-between pb-4 pt-4">
                              
                                @php
                                    $shareUrl = Request::root().'/news-details/'.$news->slug;
                                @endphp

                                <div class="col-md-6 social-media">
                                    <h5 class="fs-20 fw-6 text-dark mb-4">{{__('messages.front_landing.social_share')}}</h5>
                                    <div class="d-flex flex-wrap">
                                        <div class="icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                            <a href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}"
                                               target="_blank" title="Facebook">
                                                <img src="{{ asset('front_landing/images/social-icon-images/facebook.png') }}"
                                                     alt="facebook"
                                                     class="w-100 h-100 object-fit-cover">
                                            </a>
                                        </div>
                                        <div class="custom-twitter-img icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                            <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $news->title }}&hashtags=sharebuttons"
                                               target="_blank" title="Twitter">
                                                <img src="{{ asset('front_landing/images/social-icon-images/twitter.png') }}"
                                                     alt="twitter"
                                                     class="w-100 h-100 object-fit-cover">
                                            </a>
                                        </div>
                                        <div class="custom-instagram-img icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                            <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}"
                                               target="_blank" title="Instagram">
                                                <img src="{{ asset('front_landing/images/social-icon-images/instagram.png') }}"
                                                     alt="instagram"
                                                     class="w-100 h-100 object-fit-cover">
                                            </a>
                                        </div>
                                        <div class="icon rounded-10 d-flex align-items-center justify-content-center  me-3">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                               target="_blank" title="Linkedin">
                                                <img src="{{ asset('front_landing/images/social-icon-images/linkedin.png') }}"
                                                     alt="linkedin"
                                                     class="w-100 h-100 object-fit-cover">
                                            </a>
                                        </div>
                                        <div class="custom-pinterest-img icon rounded-10 d-flex align-items-center justify-content-center">
                                            <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                               target="_blank" title="Pinterest">
                                                <img src="{{ asset('front_landing/images/social-icon-images/pinterest.png') }}"
                                                     alt="pinterest"
                                                     class="w-100 h-100 object-fit-cover">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-section pt-30">
                                <h5 class="fs-20 fw-6 text-dark" id="commentCount">{{$allCommnets->count()}}</span>
                                        Comments</h5>
                                    <div class="comment-box">
                                    @foreach($allCommnets as $newsComment)
                                            <div class="media d-flex mt-40 mb-40 post-comment">
                                                <div class="media-img me-sm-4 me-3 rounded-10">
                                                    <img src="{{ !empty($newsComment->users) ? $newsComment->users->profile_image : url(asset('front_landing/images/news-details-img.png')) }}"
                                                     class="w-100 h-100 rounded-10 object-fit-cover "
                                                     alt="comment-image">

                                            </div>
                                            <div class="media-body w-100">
                                                <div class="media-title d-flex flex-wrap justify-content-between ">
                                                    <div class="d-flex align-items-center flex-wrap  mb-2">
                                                        <h5 class="mt-sm-0 mt-2 mb-0  text-primary fs-18 fw-5 me-3 pe-sm-1">{{isset($newsComment->name) ? $newsComment->name : ''}}</h5>
                                                        <span class="text-dark fs-14 me-4 mt-sm-0 mt-2">
                                                        <span class="text-dark me-3 pe-sm-1">|</span> {{ \Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                                    </div>
                                                </div>
                                                <p class="fs-16 fw-5 text-dark mb-0">
                                                    {{isset($newsComment->comments) ? $newsComment->comments : ''}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            <div class="post-comment-section pt-40">
                                <h5 class="title text-dark fw-6 fs-20 mt-15 mb-20">{{__('messages.front_landing.post_comment')}}</h5>
                                <form id="newsCommentsForm" method="post" action="#" class="comment-form radius-four">
                                    @csrf
                                    <div class="row pb-5">
                                        <input type="hidden" name="news_id" value="{{$news->id}}">
                                        <input type="hidden" name="user_id"
                                               value="{{ \Illuminate\Support\Facades\Auth::id() }}">

                                        <div class="col-md-6 mb-3 pb-1">
                                            <input type="text" id="name" name="name"
                                                   class="form-control fs-14 fw-5 text-dark"
                                                   placeholder="{{__('messages.front_landing.enter_your_name')}}">
                                        </div>
                                        <div class="col-md-6 mb-3 pb-1">
                                            <input type="email" id="email" name="email"
                                                   class="form-control fs-14 fw-5 text-dark"
                                                   placeholder="{{__('messages.front_landing.enter_your_email')}}">
                                        </div>
                                        <div class="col-12 mb-3 pb-1">
                                            <input type="text" id="websiteName" name="website_name"
                                                   class="form-control fs-14 fw-5 text-dark"
                                                   placeholder="{{__('messages.front_landing.enter_your_website')}}">
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control fs-14 fw-5 text-dark" id="comments"
                                                      name="comments" rows="3"
                                                      placeholder="{{__('messages.front_landing.type_your_comments')}}"></textarea>
                                        </div>
                                        <div class="col-3 mt-3">
                                            <button class="submit-btn btn btn-gray mt-2" id="newsCommentsBtn"
                                                    type="submit">
                                                {{__('messages.front_landing.post_comment')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end news-details-left-section-->
                    </div>
                    @include('front_landing.sidebar_news_detail')
                </div>
                @if(count($relatedPosts) > 0)
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="related-post-section pt-20 pb-20">
                                <h4 class="fs-26 fw-6 text-dark mb-20"> {{__('messages.front_landing.related_post')}}</h4>
                                <div class="related-causes">
                                    <div class="row">
                                        @foreach($relatedPosts as $relatedPost)
                                            <div class="col-md-6 trending-card mb-md-0 mb-40 pb-3">
                                                <div class="card h-100">
                                                    <div class="card-img">
                                                        <a href="{{route('landing.news-details',$relatedPost->slug)}}">
                                                        <img src="{{ !empty($relatedPost->news_image) ? $relatedPost->news_image : url(asset('front_landing/images/tranding-6.png')) }}" class="card-img-top object-fit-cover" alt="card"></a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="d-flex mb-2">
                                                            <i class="fa-solid fa-calendar text-primary me-2"></i>
                                                            <span class="fs-14 fw-5 text-dark">{{ \Carbon\Carbon::parse($relatedPost->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                                        </div>
                                                        <h5 class="text-dark fs-18 fw-5 mb-2"><a class="text-primary"
                                                                                                 href="{{route('landing.news-details',$relatedPost->slug)}}">{{ \Illuminate\Support\Str::limit($relatedPost->title, 30) }}</a>
                                                        </h5>
                                                        <p class="fs-16 fw-5 text-dark mb-0">
                                                        {!! !empty(strip_tags($relatedPost->description)) ? Str::limit(strip_tags($relatedPost->description),60,'...') :__('messages.common.n/a') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- end news-details-section -->
    </div>
@endsection
