@php
    $settings  = settings();
    $latestNews = latestNews();
    $brands = brands();
    $pages  = pages();
@endphp
        <!DOCTYPE html>
<html lang="en">
    <html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'AR' ? 'rtl' : 'ltr' }}">

@php $styleCss = 'style'; @endphp
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ getAppName() }}</title>

    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('front_landing/css/all.min.css')}}"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link href="{{asset('css/front-third-party.css')}}" rel="stylesheet">
    <link href="{{ mix('css/front-pages.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/front-custom.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <style>
        .floating-contact-button {
            position: fixed;
            left: 20px;
            bottom: 50px;
            width: 60px;
            height: 60px;
            z-index: 9999;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            animation: pulse 2s infinite;
            transition: transform 0.3s;
        }

        .floating-contact-button:hover {
            transform: scale(1.1);
        }

        .floating-contact-button img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.4s, visibility 0.4s, transform 0.3s;
            z-index: 9999;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

    </style>

    @livewireStyles

    <style>
        .company-logo {
            width: 200px ;
            height: auto !important;
        }
    </style>

    @if(app()->getLocale() == 'AR')
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Cairo', sans-serif;
                direction: rtl !important;
                text-align: right !important;
                overflow-x: hidden;
            }
        </style>
    @else
        <style>
            body {
                direction: ltr;
                text-align: left;
            }
        </style>
    @endif
    @yield('page_css')

    @routes
    @livewireScripts

    <script src="{{ asset('js/front-third-party.js')}}"></script>

    <script>
        let userDefaultImage = "{{ asset('front_landing/images/admin.png') }}"
        $(document).ready(function () {
            $('.alert').delay(5000).slideUp(300)
        })
    </script>
    <script src="{{ mix('js/front-pages.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.userway.org/widget.js" data-account="ZUGBkHHNS8"></script>

        @yield('page_js')
    <style>
        .gallery-container {
            overflow-x: auto;
            white-space: nowrap;
            background-color: #333;
            padding: 10px;
        }

        .gallery-container img {
            height: 200px;
            margin: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .gallery-container img:hover {
            transform: scale(1.05);
        }

        .popup {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            text-align: center;
            padding: 20px;
        }

        .popup img {
            max-width: 90%;
            max-height: 70%;
            margin: 10%;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }
        .popup .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 40px;
            color: white;
            background: rgba(0, 0, 0, 0.4);
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1001;
        }
        #mediaContent {
            max-width: 90%;
            max-height: 90%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .popup iframe,
        .popup video,
        .popup img {
            max-width: 100%;
            max-height: 100%;
        }

        .popup .prev-btn {
            left: 30px;
        }

        .popup .next-btn {
            right: 30px;
        }
        .gallery-container video {
            height: 200px;
            margin: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .gallery-container video:hover {
            transform: scale(1.05);
        }

        html, body {
        overflow-x: hidden;
        }




       .hero-section .inner-bgimg {
            height: 650px;
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 992px) { /* للأجهزة المتوسطة مثل التابلت */
            .hero-section .inner-bgimg {
                height: 450px;
            }
        }

        @media (max-width: 576px) { /* للموبايل */
            .hero-section .inner-bgimg {
                height: 300px;
            }
        }


    </style>

    
</head>

<body class="body-wrapper">

@if($settings['active_homepage_status'] == 1)
    @include('front_landing.layouts.header')
@elseif($settings['active_homepage_status'] == 2)
    @include('landing.layouts.header-two')
@elseif($settings['active_homepage_status'] == 3)
    @include('landing.layouts.header-three')
@endif

@yield('content')

@if($settings['active_homepage_status'] == 1)
    @include('front_landing.layouts.footer')
@elseif($settings['active_homepage_status'] == 2)
    @include('landing.layouts.footer-two')
@elseif($settings['active_homepage_status'] == 3)
    @include('landing.layouts.footer-three')
@endif

<a href="{{$settings['phone'] }}" class="floating-contact-button" target="_blank" style="margin-inline-end:35px;margin-inline-start:35px">
    <img src="{{ asset('front_landing/images/WhatsApp.svg') }}" alt="WhatsApp" />
</a>


<button id="backToTopBtn" class="back-to-top" style="background-color: #4664aa">
    ▲
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopBtn = document.getElementById('backToTopBtn');

        // إظهار الزر عند التمرير للأسفل
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        // التمرير لأعلى عند الضغط
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    listen('submit', '#getIncomplaintForm', function (e) {
        e.preventDefault();

        let form = $(this)[0];
        let formData = new FormData(form);

        $.ajax({
            url: route('landing.complaints'),
            type: 'post',
            data: formData,
            processData: false,  // prevent jQuery from messing with FormData
            contentType: false,  // let browser set correct multipart/form-data
            success: function (result) {
                if (result.success) {
                    iziToast.success({
                        title: 'Success',
                        message: result.message,
                        position: 'topRight',
                    });
                    form.reset();
                }
            },
            error: function (result) {
                iziToast.error({
                    title: 'Error.',
                    message: result.responseJSON?.message || 'An error occurred',
                    position: 'topRight',
                });
            },
        });
    });

</script>
<script>
    const images = document.querySelectorAll('.gallery-image');
    const popup = document.getElementById('imagePopup');
    const popupImg = document.getElementById('popupImg');
    const closeBtn = document.querySelector('.popup .close');

    images.forEach(img => {
        img.addEventListener('click', () => {
            popup.style.display = 'flex';
            popupImg.src = img.src;
        });
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
</script>

<script>
  AOS.init({
    duration: 2000,
    once: true
  });
</script>

</body>
</html>
