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

        /* نبض خفيف */
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
    @yield('page_js')
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

<a href="{{$settings['phone'] }}" class="floating-contact-button" target="_blank">
    <img src="{{ asset('front_landing/images/WhatsApp.svg') }}" alt="WhatsApp" />
</a>

<button id="backToTopBtn" class="back-to-top" style="background-color: #00c5ff">
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
</body>
</html>
