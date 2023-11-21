<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="@yield('des')">
    <meta name="keywords" content="@yield('key')">
    <meta name="author" content="KREAPEDIA">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/asset-company/logo-kns.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/asset-company/logo-kns.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">

    @yield('vendor-css')

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/css/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="landing-page" style="height: max-content;">
    <!-- BEGIN: Content-->

    <div id="loading" class="loadingio-spinner-dual-ball-rpsdie2rxyr">
        <div class="ldio-szicvhn2moj">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="top-bar d-flex align-items-center">
        <div class="container">
            <div class="list-items d-flex justify-content-center">
                @if($profileCompany->email)
                <a href="mailto:{{$profileCompany->email}}" target="_blank">
                    <i class="fa-regular fa-envelope icons"></i>
                </a>
                @endif
                @if($profileCompany->no_wa)
                <a href="https://wa.me/{{ $profileCompany->no_wa }}" target="_blank">
                    <i class="fa-brands fa-whatsapp icons"></i>
                </a>
                @endif
                @if($profileCompany->instagram)
                <a href="{{$profileCompany->instagram}}" target="_blank">
                    <i class="fa-brands fa-instagram icons"></i>
                </a>
                @endif
                @if($profileCompany->facebook)
                <a href="{{ $profileCompany->facebook }}" target="_blank">
                    <i class="fa-brands fa-facebook icons"></i>
                </a>
                @endif
                @if($profileCompany->youtube)
                <a href="{{ $profileCompany->youtube }}" target="_blank">
                    <i class="fa-brands fa-youtube icons"></i>
                </a>
                @endif
                @if($profileCompany->twitter)
                <a href="{{ $profileCompany->twitter }}" target="_blank">
                    <i class="fa-brands fa-twitter icons"></i>
                </a>
                @endif
                @if($profileCompany->telegram)
                <a href="{{ $profileCompany->telegram }}" target="_blank">
                    <i class="fa-brands fa-telegram icons"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('app-assets/images/asset-company/' . $profileCompany->gambar) }}" height="40" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @yield('home')">
                        <a class="nav-link page-scroll" href="/">Home</a>
                    </li>
                    <li class="nav-item @yield('about')">
                        <a class="nav-link" href="{{ route('about.us') }}">About Us</a>
                    </li>
                    <li class="nav-item @yield('event')">
                        <a class="nav-link page-scroll" href="{{ route('page.event') }}">Event</a>
                    </li>
                    <li class="nav-item @yield('service')">
                        <a class="nav-link page-scroll" href="{{ route('page.service') }}">Service</a>
                    </li>
                    <li class="nav-item @yield('news')">
                        <a class="nav-link page-scroll" href="{{ route('page.berita') }}">News</a>
                    </li>
                    <li class="nav-item @yield('literasi')">
                        <a class="nav-link page-scroll" href="{{ route('page.literasi') }}">Literasi</a>
                    </li>
                    <li class="nav-item @yield('contact')">
                        <a class="nav-link page-scroll" href="{{ route('page.contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item @yield('faq')">
                        <a class="nav-link" href="{{ route('page.faq') }}">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- END: Content-->

    <button class="btn btn-primary btn-icon scroll-top waves-effect waves-float waves-light" type="button" style="display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg></button>

    <!-- BEGIN: Vendor JS-->
    @yield('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page-js')
    <script src="{{ asset('app-assets/js/swiper/swiper-bundle.min.js') }}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            grabCursor: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiperSupport = new Swiper(".mySupport", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <!-- END: Page JS-->

    <script>
        var preload = document.getElementById("loading");
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }

            preload.style.display = 'none';
        })
    </script>
</body>
<!-- END: Body-->

</html>