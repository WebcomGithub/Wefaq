{{--<!-- start-companies-logo section -->--}}
<section class="companies-logo-section pt-100 pb-100 bg-gray" style="direction: ltr">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="fs-6 fw-6 text-primary">{{__('messages.front_landing.our_partners')}}</h2>
            <br>
            <br>
        </div>
        <div class="slick-slider">
            @foreach($brands as $brand)
                <div class="slide d-flex justify-content-center">
                    <div class="company-logo ">
                        <img src="{{ $brand->image_url ? : asset('front_landing/images/duragas.png')}}"
                             alt="duragas-logo"
                             class="w-100 h-100 object-fit-cover" title="{{ $brand->name }}"/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- start footer-section -->
<footer class=" bg-secondary pt-100 pb-100">
    <div class="container">
        <div class="row  justify-content-between">
            <div class="col-lg-6 ">
                <div class="footer-left mb-lg-0 mb-4">
                    <div class="footer-logo mb-4 pb-lg-2">
                        <a href="{{route('landing.home') }}">
                            <img src="{{getLogoUrl() ? : asset('front_landing/images/funding-logo.png')}}" alt="Jobs"
                                 class="w-100 h-100 object-fit-cover"/>
                        </a>
                    </div>
                    <p class="fs-14 text-white mb-0">
                       {{-- @if (App::getLocale() == 'AR' && $settings['about_us_lang'] != null)
                            {{ json_decode($settings['about_us_lang'], true)['ar'] }}
                        @elseif (App::getLocale() == 'TR' && $settings['about_us_lang'] != null)
                            {{ json_decode($settings['about_us_lang'], true)['tr'] }}
                        @else
                            {{ Str::limit($settings['about_us'] , 350) }}
                        @endif--}}
                        @if (
    App::getLocale() == 'AR' &&
    !empty($settings['about_us_lang']) &&
    json_decode($settings['about_us_lang'], true)['ar'] ?? false
)
                            {{ json_decode($settings['about_us_lang'], true)['ar'] }}
                        @elseif (
                            App::getLocale() == 'TR' &&
                            !empty($settings['about_us_lang']) &&
                            json_decode($settings['about_us_lang'], true)['tr'] ?? false
                        )
                            {{ json_decode($settings['about_us_lang'], true)['tr'] }}
                        @else
                            {{ Str::limit($settings['about_us'] ?? '', 350) }}
                        @endif

                    </p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="footer-right ps-xl-3">
                    <h3 class="fs-18 text-white mb-4 pb-lg-2">{{__('messages.front_landing.get_updates')}}
                    </h3>
                    <div class="email-box position-relative">
                        <form action="{{route('email.subscribe.store')}}" method="post" id="addEmailForm"
                              class="ajax-form form-wraper mailchimp-form d-flex shadow-sm">
                            @csrf()
                            <input type="email" @if(App::getLocale() == 'AR') style="margin-right: 80px;" @endif name="email" class="fs-14 fw-5 text-white"
                                   placeholder="{{__('messages.front_landing.enter_email_address')}}">
                            <button type="submit" id="emailBtn" class="button btn-primary position-absolute fs-14 fw-5">
                                {{__('messages.front_landing.subscribe')}}
                            </button>
                        </form>
                    </div>


                    <div class="social-icon d-flex mt-4 pt-lg-2">
                        <div class="icon d-flex align-items-center justify-content-center me-sm-4 me-3">
                            <a href="{{ $settings['facebook_url'] }}" target="_blank">
                                <i class="fa-brands fa-facebook-f fs-16 justify-content-between align-items-center"></i>
                            </a>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center me-sm-4 me-3">
                            <a href="{{ $settings['twitter_url'] }}" target="_blank">
                                <i class="fa-brands fa-twitter fs-16 justify-content-between align-items-center"></i>
                            </a>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center me-sm-4 me-3">
                            <a href="{{ $settings['instagram_url'] }}" target="_blank">
                                <i class="fa-brands fa-instagram fs-16 justify-content-between align-items-center"></i>
                            </a>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center me-sm-4 me-3">
                            <a href="{{ $settings['linkedin_url'] }}" target="_blank">
                                <i class="fa-brands fa-linkedin-in fs-16 justify-content-between align-items-center"></i>
                            </a>
                        </div>
                        <div class="icon d-flex align-items-center justify-content-center" @if(App::getLocale() == 'AR') style="margin-right: 20px;" @endif>
                            <a href="{{ $settings['youtube_url'] }}" target="_blank">
                                <i class="fa-brands fa-youtube fs-16 justify-content-between align-items-center"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>
                <a href="https://webcom.technology/ar" target="_blank" rel="noopener noreferrer">
                    حميع الحقوق محفوظة لجمعية وفاق لرعاية المرأة والطفل
                </a>
            </p>
        </div>
    </div>
</footer>
<!-- end footer-section -->

