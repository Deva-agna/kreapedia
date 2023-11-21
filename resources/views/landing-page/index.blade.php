@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kreapedia, Koperasi, KNS')

@section('title', 'Kreapedia | Home')

@section('home', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/plyr.min.css') }}">
@endsection

@section('page-css')
<!-- Welcome Section css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/welcome-section/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-media-player.css') }}">
@endsection

@section('content')

<section id="welcome-section" class="d-flex align-items-center" style="background-image: url(../../../app-assets/images/ilustrasi/about-us.jpeg);">
    <div class="container ">
        <h1>{{ $welcomeSection->kalimat_pertama }} <span class="company">{{ $welcomeSection->kalimat_kedua }}</span>.</h1>
        <h2>{{ $welcomeSection->caption }}</h2>
        <div>
            <a href="https://wa.me/{{ $profileCompany->no_wa }}" type="button" class="btn btn-sm btn-primary waves-float waves-light" style="background-color: #447BBD !important; border: none;">
                <i class="fa-brands fa-whatsapp"></i>
                <span>Hubungi Kami</span>
            </a>
        </div>
    </div>
</section>

<section id="about-us" class="mt-4 mb-2">
    <div class="container">
        <div class="section-title">
            <h2>About Us</h2>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="video-player" id="plyr-video-player">
                            <iframe width="100%" height="100%" src="{{ $about->video }}" allowfullscreen allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <h4>Selamat datang di Kreapedia</h4>
                <hr>
                <h5>We Are Innovators</h5>
                <p class="text-justify">
                    {{ $about->kata_pengantar }}
                </p>
                <hr>
                <a href="{{ route('about.us') }}" class="btn btn-sm btn-outline-primary round waves-effect">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

@if($event_s->count() > 0)
<section id="event-landing-page" class="pt-2 pb-2">
    <div class="container">
        <div class="section-title">
            <h2>Event</h2>
        </div>
        <div class="row mt-2 d-flex justify-content-center">
            @foreach($event_s as $event)
            <div class="col-md-6 col-lg-4 col-12 mt-2">
                <a href="{{ route('detail.event', $event->slug) }}">
                    <div class="box-image">
                        <img class="img-event" src="{{ asset('asset-event/'. $event->gambar) }}" alt="Event">
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section id="service" class="pt-2 pb-2">
    <div class="container">
        <div class="section-title">
            <h2>Our Service</h2>
        </div>
        <div class="row kb-search-content-info match-height d-flex justify-content-center mt-4">

            @foreach($service_s as $service)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 kb-search-content">
                <div class="card">
                    <a href="{{ route('page.service') }}">
                        <div class="card-image">
                            <img src="{{ asset('asset-service/' . $service->gambar) }}" class="card-img-top" alt="knowledge-base-image">
                        </div>
                        <div class="card-body text-center">
                            <h4>{{ $service->layanan }}</h4>
                            <p class="text-body mt-1 mb-0">
                                {{ $service->deskripsi }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@if($berita_s->count() > 5)
<section id="blog" class="pt-2 pb-2">
    <div class="container">
        <div class="section-title">
            <h2>News</h2>
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
                                        <a href="{{ route('detail.berita', $berita_s[0]->slug) }}">
                                            <img class="card-img-top img-fluid" src="{{ asset('asset-berita/' . $berita_s[0]->gambar) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ route('detail.berita', $berita_s[0]->slug) }}" class="blog-title-truncate text-body-heading">{{ $berita_s[0]->judul }}</a>
                                        </h4>
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <i data-feather='clock'></i>
                                                <span class="text-muted ml-50 mr-25">|</span>
                                                <small class="text-muted">{{ date('d, F Y', strtotime($berita_s[0]->published)) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="blog-image">
                                        <a href="{{ route('detail.berita', $berita_s[1]->slug) }}">
                                            <img class="card-img-top img-fluid" src="{{ asset('asset-berita/' . $berita_s[1]->gambar) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ route('detail.berita', $berita_s[1]->slug) }}" class="blog-title-truncate text-body-heading">{{ $berita_s[1]->judul }}</a>
                                        </h4>
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <i data-feather='clock'></i>
                                                <span class="text-muted ml-50 mr-25">|</span>
                                                <small class="text-muted">{{ date('d, F Y', strtotime($berita_s[1]->published)) }}</small>
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
                                @foreach($berita_s->skip(2) as $berita)
                                <div class="media mb-2">
                                    <a href="{{ route('detail.berita', $berita->slug) }}" class="mr-2">
                                        <img class="rounded" src="{{ asset('asset-berita/'. $berita->gambar) }}" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="{{ route('detail.berita', $berita->slug) }}" class="text-body-heading">{{ $berita->judul }}</a>
                                        </h6>
                                        <div class="text-muted mb-0">{{ date('d, M Y', strtotime($berita->published)) }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/ Recent Posts -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section id="opini" class="pt-2 pb-2 d-flex justify-content-center align-items-center ">
    <div class="opini-content swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($testimoni_s as $testimoni)
            <div class="slide swiper-slide">
                @if($testimoni->gambar)
                <img class="image" src="{{ asset('asset-testimoni/'.$testimoni->gambar) }}" alt="Foto User">
                @else
                <img class="image" src="{{ asset('app-assets/images/asset-company/opini.png') }}" alt="Foto User">
                @endif
                <p class="m-0">
                    {{ $testimoni->ulasan }}
                </p>
                <div class="details">
                    <div class="name">{{ $testimoni->nama }}</div>
                    @if($testimoni->job)
                    <div class="job">{{ $testimoni->job }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

@if($tim_s->count() > 0)
<section id="team" class="pt-4 pb-2">
    <div class="container">
        <div class="section-title">
            <h2>Team</h2>
        </div>
        <div class="row d-flex justify-content-center mt-4">
            @foreach($tim_s as $tim)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-4">
                    <div class="team-image">
                        @if($tim->user->image)
                        <img class="card-img-top" src="{{ asset('foto/' . $tim->user->image) }}" alt="Card image cap">
                        @else
                        <img class="card-img-top" src="{{ asset('app-assets/images/asset-company/opini.png') }}" alt="Card image cap">
                        @endif
                        <div class="sosial">
                            @if($tim->user->facebook)
                            <a href="https://web.facebook.com/bagus.pramono.5437" target="_blank"><i data-feather='facebook'></i></a>
                            @endif
                            @if($tim->user->instagram)
                            <a href="https://www.instagram.com/{{ $tim->user->instagram }}" target="_blank"><i data-feather='instagram'></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <marquee direction="left">
                            <div class="name">{{ $tim->user->nama }}</div>
                        </marquee>
                        <marquee direction="left">
                            <div class="job">{{ $tim->user->job }}</div>
                        </marquee>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section id="support" class="pt-2 pb-2">
    <div class="container">
        <div class="support-content swiper mySupport pb-4">
            <div class="swiper-wrapper">
                <div class="support-image swiper-slide p-1">
                    <img src="{{ asset('app-assets/images/ilustrasi/logo-sdiskop-jatim.png') }}">
                </div>
                <div class="support-image swiper-slide p-1">
                    <img src="{{ asset('app-assets/images/ilustrasi/logo-kemenkop.png') }}">
                </div>
                <div class="support-image swiper-slide p-1">
                    <img src="{{ asset('app-assets/images/ilustrasi/logo-sdiskop-jatim.png') }}">
                </div>
                <div class="support-image swiper-slide p-1">
                    <img src="{{ asset('app-assets/images/ilustrasi/logo-kemenkop.png') }}">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section id="contact" class="pt-2 pb-2">
    <div class="container">
        <div class="section-title">
            <h2>Contact Us</h2>
        </div>
        <div class="contact-content mt-4">
            <div class="card pl-2 pr-2 pb-2">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-2">
                        <i class="fa-regular fa-map"></i>
                        <h3 class="title">Alamat</h3>
                        <p class="des">{{ $profileCompany->alamat }} - {{ $profileCompany->kota }} - {{ $profileCompany->negara }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <i class="fa-brands fa-whatsapp"></i>
                        <h3 class="title">Whatsapp</h3>
                        <p class="des">+{{ $profileCompany->no_wa }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <i class="fa-regular fa-envelope"></i>
                        <h3 class="title">Email</h3>
                        <p class="des">{{ $profileCompany->email }}</p>
                    </div>
                </div>
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