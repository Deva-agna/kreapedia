@extends('landing-page.master.master')

@section('title', 'Kreapedia | About Us')

@section('key', 'KNS, Kreapedia, Koperasi')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan')

@section('about', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('page-css')
<!-- About css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/about/style.css') }}">
@endsection

@section('content')

<section id="about" class="mt-2">
    <div class="container">
        @if($about->gambar)
        <div class="hero" style="background-image: url(../../../asset-about/{{$about->gambar}});">
            @else
            <div class="hero" style="background-image: url(../../../app-assets/images/ilustrasi/about-us.jpeg);">
                @endif
                <div class="text-caption d-flex flex-column justify-content-center align-items-center text-center">
                    <div class="card-caption">
                        <h5 class="title">{{ $about->title }}</h5>
                        <p class="deskripsi">{{ $about->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="card-title">
                        Selamat Datang di Kreapedia
                    </div>
                    <hr>
                    <div class="ql-editor p-0" style="white-space: normal;">
                        {!! $about->konten !!}
                    </div>
                    <hr>
                    <div class="mt-2">
                        <ul class="timeline">
                            <li class="timeline-item">
                                <span class="timeline-point">
                                    <i data-feather='trending-up'></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Visi</h6>
                                    </div>
                                    <div class="ql-editor p-0" style="white-space: normal;">
                                        {!! $about->visi !!}
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point">
                                    <i data-feather='bar-chart'></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Misi</h6>
                                    </div>
                                    <div class="ql-editor p-0" style="white-space: normal;">
                                        {!! $about->misi !!}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($user_s as $user)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-profile">
                    <img src="{{ asset('app-assets/images/asset-company/banner.png') }}" class="img-fluid card-img-top" alt="Profile Cover Photo">
                    <div class="card-body">
                        <div class="profile-image-wrapper">
                            <div class="profile-image">
                                <div class="avatar">
                                    @if($user->image)
                                    <img src="{{ asset('foto/' . $user->image) }}" alt="Profile Picture" style="object-fit: cover;">
                                    @else
                                    <img src="{{ asset('app-assets/images/asset-company/opini.png') }}" alt="Profile Picture" style="object-fit: cover;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h3>{{ $user->nama }}</h3>
                        <!-- <h6 class="text-muted">+{{ $user->no_wa }}</h6> -->
                        <div class="badge badge-light-primary profile-badge">{{ $user->job }}</div>
                        <hr class="mb-2">
                        <div class="d-flex justify-content-around align-items-center">
                            <div>
                                <a href="mailto:{{ $user->email }}" target="_blank">
                                    <div class="avatar avatar-tag bg-light-primary">
                                        <i data-feather="mail" class="font-medium-4"></i>
                                    </div>
                                </a>
                            </div>
                            @if($user->instagram)
                            <div>
                                <a href="https://www.instagram.com/{{$user->instagram}}/" target="_blank">
                                    <div class="avatar avatar-tag bg-light-primary">
                                        <i class="fa-brands fa-instagram font-medium-4"></i>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection