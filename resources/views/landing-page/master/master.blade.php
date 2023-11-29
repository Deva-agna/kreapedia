<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="@yield('des')">
    <meta name="keywords" content="@yield('key')">
    <meta name="author" content="BPR Lingga Sejahtera">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/asset-company/logotrans.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/asset-company/logotrans.png') }}">
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
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="d-flex align-items-center">
                    <img src="{{ asset('app-assets/images/asset-company/logobpr.png') }}" height="40" alt="">
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-percent"></i><span class="text-link">Suku Bunga</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-location-dot"></i><span class="text-link">Lokasi Kantor</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-user"></i><span class="text-link">Tentang</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-file"></i><span class="text-link">Publikasi</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item @yield('home')">
                        <a class="nav-link page-scroll" href="/">Home</a>
                    </li>
                    <li class="nav-item @yield('tabungan')">
                        <a class="nav-link" href="{{ route('tabungan') }}">Tabungan</a>
                    </li>
                    <li class="nav-item @yield('deposito')">
                        <a class="nav-link page-scroll" href="{{ route('deposito') }}">Deposito</a>
                    </li>
                    <li class="nav-item @yield('kredit')">
                        <a class="nav-link page-scroll" href="{{ route('kredit') }}">Kredit</a>
                    </li>
                    <li class="nav-item @yield('news')">
                        <a class="nav-link page-scroll" href="{{ route('page.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item @yield('literasi')">
                        <a class="nav-link page-scroll" href="#">Lingga Diskon</a>
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
    <script src="{{ asset('app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
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

    @yield('script')
    <!-- END: Page JS-->

    <script>
        $('.alamat').on('click', function() {
            var id = $(this).attr('id')
            $('.alamat').removeClass('active');
            $(this).addClass('active');
            if (id == 'kp-pbun') {
                document.getElementById('des-alamat').innerHTML = "Jl. Pangeran Antasari, No. 40, Kelurahan Mendawai. Kecamatan Arut Selatan, Kabupaten Kotawaringin Barat Kalimantan Tengah";
                document.getElementById('btn-text').innerHTML = "KP. Pangkalan Bun";
            } else if (id == 'kc-sampit') {
                document.getElementById('des-alamat').innerHTML = "JL. MT Haryono";
                document.getElementById('btn-text').innerHTML = "KC. Sampit";
            } else if (id == 'kc-sulung') {
                document.getElementById('des-alamat').innerHTML = "Jl. Ahmad Yani, Lintas Kalimantan, Perumahan PKS Sulung G4 No. F1 Desa Sulung. Kalimantan Tengah";
                document.getElementById('btn-text').innerHTML = "KC. Sulung";
            } else if (id == 'kc-melata') {
                document.getElementById('des-alamat').innerHTML = "Jl. Ahmad Yani, Lintas Kalimantan, Perumahan Melata Estate No. 02, Desa Melata, Lamandau, Kalimantan Tengah";
                document.getElementById('btn-text').innerHTML = "KC. Melata";
            } else if (id == 'kc-suja') {
                document.getElementById('des-alamat').innerHTML = "Jl. Raya Lamandau, Desa Suja, PT Sawit Mandiri Lestari, Lamandau. Kalimantan Tengah";
                document.getElementById('btn-text').innerHTML = "KC. Suja";
            } else if (id == 'kc-pulpis') {
                document.getElementById('des-alamat').innerHTML = "JL. Trans Kalimantan KM. 23 RT. 01, Desa Mintin. Pulang Pisau";
                document.getElementById('btn-text').innerHTML = "KC. Pulang Pisau";
            }
        });
    </script>

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