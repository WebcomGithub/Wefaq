{{--<!-- start-companies-logo section -->--}}{{--

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
                       --}}
{{-- @if (App::getLocale() == 'AR' && $settings['about_us_lang'] != null)
                            {{ json_decode($settings['about_us_lang'], true)['ar'] }}
                        @elseif (App::getLocale() == 'TR' && $settings['about_us_lang'] != null)
                            {{ json_decode($settings['about_us_lang'], true)['tr'] }}
                        @else
                            {{ Str::limit($settings['about_us'] , 350) }}
                        @endif--}}{{--

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

--}}
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
<footer class="bg-secondary text-white pt-5 pb-4">
    <div class="container">
        <div class="row gy-4 justify-content-between">

            <!-- Right column: نبذة عن المركز -->
            <div class="col-lg-4 col-md-6">
                <h5 class="mb-3 fs-18">{{ __('messages.about_us.about_us') }}</h5>
                <p class="fs-14">
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

            <!-- Middle column: الأسئلة الشائعة -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3 fs-18">{{ __('messages.faqs.faqs') }}</h5>
                <ul class="list-unstyled fs-14">
                    @php
                        $faqs = faq();
                    @endphp
                    @foreach ($faqs as $index=>$faq)
                        @if($index<3)
                            <li class="mb-2">

                                <a href="#" class="text-white text-decoration-none">
                                    {{ $faq->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <a href="{{route('landing.faqs')}}" class="btn btn-sm mt-2" style="background-color: #4664aa; color: white;">
                    {{__('messages.front_landing.More frequently asked questions')}}
                </a>
            </div>

            <!-- Left column: تواصل معنا -->
            <div class="col-lg-4 col-md-12">
                <h5 class="mb-3 fs-18">{{ __('messages.contact_us.contact_us') }}</h5>
                <p class="fs-14 mb-2">
                    <i class="fa fa-map-marker-alt me-2"></i>
                    @php
                        $contactUs = contact_us();
                    @endphp
                    @if (App::getLocale() == 'AR')
                        @if(!empty($contactUs['menu_title_lang']) && json_decode($contactUs['menu_title_lang'], true)['ar'] != null)
                            {{ json_decode($contactUs['menu_title_lang'], true)['ar'] }}
                        @endif
                    @elseif(App::getLocale() == 'tr')
                        @if(!empty($contactUs['menu_title_lang']) && json_decode($contactUs['menu_title_lang'], true)['tr'] != null)
                            {{ json_decode($contactUs['menu_title_lang'], true)['tr'] }}
                        @endif
                    @else
                        {{ $contactUs['menu_title'] }}
                    @endif

                </p>
                <p class="fs-14 mb-2">
                    <i class="fa fa-phone me-2"></i>
                    {{$settings['phone'] }}
                </p>
                <p class="fs-14 mb-2">
                    <i class="fa fa-envelope me-2"></i>
                    <a href="mailto:{{ $settings['email'] }}" class="text-white text-decoration-none">{{ $settings['email'] }}</a>
                </p>
                <div class="d-flex mt-3">
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" class="text-white me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $settings['twitter_url'] }}" target="_blank" class="text-white me-3">
                        <i class="fab fa-x"></i>
                    </a>
                    <a href="{{ $settings['instagram_url'] }}" target="_blank" class="text-white me-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="text-white me-3">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="{{ $settings['youtube_url'] }}" target="_blank" class="text-white me-3">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

        </div>
        <hr class="bg-light mt-4">
        <div class="text-center fs-14">
            {{__('messages.front_landing.All rights reserved to Wifaq Association © 2025')}}
        </div>
    </div>
</footer>

<script>
    const items = document.querySelectorAll('.gallery-item');
    const popup = document.getElementById('imagePopup');
    const mediaContent = document.getElementById('mediaContent');
    const closeBtn = document.querySelector('.popup .close');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentIndex = 0;

    function showItem(index) {
        const item = items[index];
        const type = item.dataset.type;
        const src = item.src || item.getAttribute('src') || item.dataset.src;

        mediaContent.innerHTML = '';

        if (type === 'image') {
            const img = document.createElement('img');
            img.src = src;
            mediaContent.appendChild(img);
        } else if (type === 'video') {
            const video = document.createElement('video');
            video.src = src;
            video.controls = true;
            video.autoplay = true;
            mediaContent.appendChild(video);
        } else if (type === 'youtube' || type === 'vimeo') {
            const iframe = document.createElement('iframe');
            iframe.src = src;
            iframe.width = '800';
            iframe.height = '450';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            iframe.style.border = 'none';
            mediaContent.appendChild(iframe);
        }
    }

    items.forEach((item, index) => {
        item.addEventListener('click', () => {
            popup.style.display = 'flex';
            currentIndex = index;
            showItem(currentIndex);
        });
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
        mediaContent.innerHTML = '';
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        showItem(currentIndex);
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showItem(currentIndex);
    });

    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
            mediaContent.innerHTML = '';
        }
    });
</script>

