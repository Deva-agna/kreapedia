@extends('landing-page.master.master')

@section('des', 'BPR.')

@section('key', 'BPR, BPR Lingga Sejahtra, BPR Pangkalan Bun')

@section('title', 'BPR Lingga Sejahtra | Home')

@section('home', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/plyr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
@endsection

@section('page-css')
<!-- Welcome Section css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/welcome-section/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-media-player.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-swiper.css') }}">
@endsection

@section('content')

<div class="container">
    <section id="component-swiper-autoplay">
        <div class="swiper-autoplay swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('app-assets/images/asset-company/bannerdeposito.png') }}" alt="banner" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-image">
                        <img class="img-fluid" src="{{ asset('app-assets/images/asset-company/bannertali.png') }}" alt="banner" />
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
</div>

<div class="container pt-2" id="produk">
    <div class="row">
        <div class="col-md-8 col-left">
            <div class="card-image">
                <img class="img-fluid img-left" src="{{ asset('app-assets/images/asset-company/bannertab.png') }}" alt="produk" />
            </div>
        </div>
        <div class="col-md-4 col-right mt-md-0 mt-6">
            <div class="contact">
                <img class="img-fluid img-right" src="{{ asset('app-assets/images/asset-company/contact.png') }}" alt="produk" />
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4 mt-md-0 mt-2">
            <a href="{{ route('tabungan') }}">
                <div class="card shadow" style="overflow: hidden;">
                    <div class="produk-list">
                        <img class="img-fluid" src="{{ asset('app-assets/images/asset-company/icontabungan.png') }}" alt="produk" />
                    </div>
                    <div class="btn-produk btn">Tabungan</div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mt-md-0 mt-2">
            <a href="{{ route('kredit') }}">
                <div class="card shadow" style="overflow: hidden;">
                    <div class="produk-list">
                        <img class="img-fluid" src="{{ asset('app-assets/images/asset-company/iconkredit.png') }}" alt="produk" />
                    </div>
                    <div class="btn-produk btn">Kredit </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mt-md-0 mt-2">
            <a href="{{ route('deposito') }}">
                <div class="card shadow" style="overflow: hidden;">
                    <div class="produk-list">
                        <img class="img-fluid" src="{{ asset('app-assets/images/asset-company/icondeposito.png') }}" alt="produk" />
                    </div>
                    <div class="btn-produk btn">Deposito</div>
                </div>
            </a>
        </div>
    </div>
</div>

<section id="blog" class="pb-2">
    <div class="container">
        <div class="p-2 rounded" style="background-color: #D5F1E2;">
            <div class="section-title">
                <h2>Bank Lingga News</h2>
            </div>
            <div class="row pl-1 pr-1 mt-4">
                <div class="content-detached content-left">
                    <div class="content-body">
                        <div class="blog-list-wrapper">
                            <!-- Blog List Items -->
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="blog-image">
                                            <a href="#">
                                                <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Gambar Berita" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#" class="blog-title-truncate text-body-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                            </h4>
                                            <div class="media">
                                                <div class="media-body d-flex align-items-center">
                                                    <i data-feather='clock'></i>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted">12, Desember 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="blog-image">
                                            <a href="#">
                                                <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="#" class="blog-title-truncate text-body-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</a>
                                            </h4>
                                            <div class="media">
                                                <div class="media-body d-flex align-items-center">
                                                    <i data-feather='clock'></i>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted">12, Desember 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Blog List Items -->
                        </div>
                    </div>
                </div>
                <div class="sidebar-detached sidebar-right">
                    <div class="sidebar">
                        <div class="blog-sidebar my-2 my-lg-0">
                            <!-- Recent Posts -->
                            <div class="blog-recent-posts">
                                <h6 class="section-label">Tulisan Terbaru</h6>
                                <div class="mt-75">


                                    <div class="media mb-2">
                                        <a href="#" class="mr-2">
                                            <img class="rounded" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" width="100" height="70" alt="Recent Post Pic" />
                                        </a>
                                        <div class="media-body">
                                            <h6 class="blog-recent-post-title">
                                                <a href="#" class="text-body-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                            </h6>
                                            <div class="text-muted mb-0">12, Desember 2023</div>
                                        </div>
                                    </div>

                                    <div class="media mb-2">
                                        <a href="#" class="mr-2">
                                            <img class="rounded" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" width="100" height="70" alt="Recent Post Pic" />
                                        </a>
                                        <div class="media-body">
                                            <h6 class="blog-recent-post-title">
                                                <a href="#" class="text-body-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                            </h6>
                                            <div class="text-muted mb-0">12, Desember 2023</div>
                                        </div>
                                    </div>

                                    <div class="media mb-2">
                                        <a href="#" class="mr-2">
                                            <img class="rounded" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" width="100" height="70" alt="Recent Post Pic" />
                                        </a>
                                        <div class="media-body">
                                            <h6 class="blog-recent-post-title">
                                                <a href="#" class="text-body-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                            </h6>
                                            <div class="text-muted mb-0">12, Desember 2023</div>
                                        </div>
                                    </div>

                                    <div class="media mb-2">
                                        <a href="#" class="mr-2">
                                            <img class="rounded" src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" width="100" height="70" alt="Recent Post Pic" />
                                        </a>
                                        <div class="media-body">
                                            <h6 class="blog-recent-post-title">
                                                <a href="#" class="text-body-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                                            </h6>
                                            <div class="text-muted mb-0">12, Desember 2023</div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!--/ Recent Posts -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimoni">
    <div class="container">
        <div class="p-2 rounded" style="background-color: #D5F1E2;">
            <div class="section-title">
                <h2>Testimonial</h2>
            </div>
            <p class="des-testi">Dalam pelayanan dan produk, kami senantiasa berusaha menciptakan dampak positif pada seluruh nasabah Bank BPR Lingga Sejahtera. Kepuasan pelanggan merupakan elemen penting yang terintegrasi dalam model bisnis kami.</p>
            <div class="slide-container swiper-responsive-breakpoints swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="rounded" style="background-image: url(../../../app-assets/images/asset-company/bgtestimoni.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="card-testimoni">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="card mb-1">
                                                <img src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Foto Nasabah">
                                                <p>Bank BPR Lingga sangat membantu saya dalam pengembangan usaha saya. Serta sudah aman LPS dan diawasi OJK</p>

                                            </div>
                                            <h5 class="shadow">Test Satu</h5>
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="rounded" style="background-image: url(../../../app-assets/images/asset-company/bgtestimoni.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="card-testimoni">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="card mb-1">
                                                <img src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Foto Nasabah">
                                                <p>Bank BPR Lingga sangat membantu saya dalam pengembangan usaha saya. Serta sudah aman LPS dan diawasi OJK</p>

                                            </div>
                                            <h5 class="shadow">Test Dua</h5>
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="rounded" style="background-image: url(../../../app-assets/images/asset-company/bgtestimoni.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="card-testimoni">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="card mb-1">
                                                <img src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Foto Nasabah">
                                                <p>Bank BPR Lingga sangat membantu saya dalam pengembangan usaha saya. Serta sudah aman LPS dan diawasi OJK</p>

                                            </div>
                                            <h5 class="shadow">Test Tiga</h5>
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="rounded" style="background-image: url(../../../app-assets/images/asset-company/bgtestimoni.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="card-testimoni">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="card mb-1">
                                                <img src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Foto Nasabah">
                                                <p>Bank BPR Lingga sangat membantu saya dalam pengembangan usaha saya. Serta sudah aman LPS dan diawasi OJK</p>

                                            </div>
                                            <h5 class="shadow">Test Empat</h5>
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="rounded" style="background-image: url(../../../app-assets/images/asset-company/bgtestimoni.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="card-testimoni">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="card mb-1">
                                                <img src="{{ asset('app-assets/images/ilustrasi/img1.png') }}" alt="Foto Nasabah">
                                                <p>Bank BPR Lingga sangat usaha saya. Serta sudah aman LPS dan diawasi OJK</p>

                                            </div>
                                            <h5 class="shadow">Test Lima</h5>
                                            <span>Web Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')
@endsection

@section('vendor-js')
<script src="{{ asset('app-assets/vendors/js/extensions/plyr.polyfilled.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/extensions/ext-component-media-player.js') }}"></script>
@endsection

@section('script')
<script>
    var mySwiper10 = new Swiper('.swiper-autoplay', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    var mySwiper14 = new Swiper('.swiper-responsive-breakpoints', {
        slidesPerView: 1,
        spaceBetween: 25,
        centerSlide: true,
        fade: true,
        grabCursor: true,
        // init: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 35
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 25
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 15
            },
            // 320: {
            //     slidesPerView: 1,
            //     spaceBetween: 10
            // }
        }
    });
</script>
@endsection