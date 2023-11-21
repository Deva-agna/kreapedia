@extends('landing-page.master.master')

@section('title', 'Kreapedia | FAQ')

@section('key', 'KNS, Kreapedia, FAQ')

@section('des', 'Kreapedia memiliki beberapa pelayanan diantaranya seperti event organizer, dalam layanan banyak event yang akan ditawarkan oleh Kreapedia seperti, olahraga (sports), wedding organizer, music, pelatihan, seminar, webinar, pameran, festival, travel, dan berbagai event lainnya sesuai permintaan klien')

@section('faq', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-faq.css') }}">
@endsection

@section('content')

<section id="faq-search-filter">
    <div class="container">
        <div class="card faq-search" style="background-image: url('../../../app-assets/images/asset-company/banner.png')">
            <div class="card-body text-center">
                <h2 class="text-primary">FAQ</h2>
            </div>
        </div>
    </div>
</section>

<section id="faq-tabs">
    <div class="container">
        <!-- vertical tab pill -->
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
                    <!-- pill tabs navigation -->
                    <ul class="nav nav-pills nav-left flex-column" role="tablist">
                        <!-- payment -->
                        @foreach($kategoriFaq_s as $kategori)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->iteration == '1' ? 'active' : '' }}" data-toggle="pill" href="#faq{{$loop->iteration}}" aria-expanded="true" role="tab">
                                <i data-feather='disc' class="font-medium-3 mr-1"></i>
                                <span class="font-weight-bold">{{ $kategori->kategori }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- FAQ image -->
                    <img src="{{ asset('app-assets/images/asset-company/faq.png') }}" class="img-fluid d-none d-md-block" alt="demand img" />
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <!-- pill tabs tab content -->
                <div class="tab-content">
                    @foreach($kategoriFaq_s as $kategori)
                    <div role="tabpanel" class="tab-pane {{ $loop->iteration == '1' ? 'active' : '' }}" id="faq{{$loop->iteration}}" aria-expanded="true">
                        <!-- icon and header -->
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i data-feather='help-circle' class="font-medium-4"></i>
                            </div>
                            <div>
                                <h4 class="mb-0">{{ $kategori->kategori }}</h4>
                            </div>
                        </div>
                        <!-- frequent answer and question  collapse  -->
                        <div class="collapse-margin collapse-icon mt-2" id="kategori{{$kategori->id}}">
                            @forelse ($kategori->faq as $faq)
                            <div class="card">
                                <div class="card-header" id="pertanyaan{{$loop->iteration}}" data-toggle="collapse" role="button" data-target="#faq{{$loop->iteration}}" aria-expanded="false" aria-controls="faq{{$loop->iteration}}">
                                    <span class="lead collapse-title">{{ $faq->pertanyaan }}</span>
                                </div>
                                <div id="faq{{$loop->iteration}}" class="collapse" aria-labelledby="pertanyaan{{$loop->iteration}}" data-parent="#kategori{{ $faq->kategoriFaq->id }}">
                                    <div class="card-body">
                                        {{ $faq->penjelasan }}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <span>Untuk saat ini penjelasan terkait tidak tersedia!</span>
                            @endforelse
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-contact">
    <div class="container">
        <div class="row mt-5 pt-75">
            <div class="col-12 text-center">
                <h2>Anda masih memiliki pertanyaan?</h2>
                <p class="mb-3">
                    Jika Anda tidak dapat menemukan pertanyaan di FAQ kami, Anda selalu dapat menghubungi kami. Kami akan menjawab Anda segera!
                </p>
            </div>
            <div class="col-sm-6">
                <div class="card text-center faq-contact-card shadow-none py-1">
                    <div class="card-body">
                        <a href="https://wa.me/{{ $profileCompany->no_wa }}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                <i class="fa-brands fa-whatsapp font-medium-3"></i>
                            </div>
                        </a>
                        <h4>+{{ $profileCompany->no_wa }}</h4>
                        <span class="text-body">Cara terbaik untuk mendapatkan jawaban lebih cepat!</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-center faq-contact-card shadow-none py-1">
                    <div class="card-body">
                        <a href="mailto:{{ $profileCompany->email }}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                <i data-feather="mail" class="font-medium-3"></i>
                            </div>
                        </a>
                        <h4>{{ $profileCompany->email }}</h4>
                        <span class="text-body">Kami selalu senang membantu!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection