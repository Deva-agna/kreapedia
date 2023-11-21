@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kreapedia, Koperasi, Service')

@section('title', 'Kreapedia | Contact Us')

@section('contact', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-faq.css') }}">
@endsection

@section('content')

<section id="faq-search-filter">
    <div class="container">
        <div class="card faq-search" style="background-image: url('../../../app-assets/images/asset-company/banner.png')">
            <div class="card-body text-center">
                <h2 class="text-primary mb-0">Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="pt-2 pb-2">
    <div class="container">
        <div class="contact-content">
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
                        <p class="des">+{{$profileCompany->no_wa}}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-2">
                        <i class="fa-regular fa-envelope"></i>
                        <h3 class="title">Email</h3>
                        <p class="des">{{ $profileCompany->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card p-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        Sosial Media Kreapedia
                    </div>
                    @if($profileCompany->tiktok)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->tiktok}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-tiktok font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">TikTok</h4>
                        </div>
                    </div>
                    @endif
                    @if($profileCompany->instagram)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->instagram}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-instagram font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">Instagram</h4>
                        </div>
                    </div>
                    @endif
                    @if($profileCompany->youtube)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->youtube}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-youtube font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">Youtube</h4>
                        </div>
                    </div>
                    @endif
                    @if($profileCompany->facebook)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->facebook}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-facebook font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">Facebook</h4>
                        </div>
                    </div>
                    @endif
                    @if($profileCompany->twitter)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->twitter}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-twitter font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">Twitter</h4>
                        </div>
                    </div>
                    @endif
                    @if($profileCompany->telegram)
                    <div class="d-flex align-items-center mb-1">
                        <a href="{{$profileCompany->telegram}}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-telegram font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">Telegram</h4>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="card-title">
                        Anggota Kreapedia
                    </div>
                    @foreach($user_s as $user)
                    <div class="d-flex align-items-center mb-1">
                        <a href="https://wa.me/{{ $user->no_wa }}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mr-1">
                                <i class="fa-brands fa-whatsapp font-medium-4"></i>
                            </div>
                        </a>
                        <div>
                            <h4 class="mb-0">{{ $user->nama }}</h4>
                            <span>+{{ $user->no_wa }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> -->


        <div class="row mt-5 pt-75">
            <div class="col-sm-6">
                <div class="card text-center faq-contact-card shadow-none py-1">
                    <div class="card-body">
                        <a href="https://wa.me/{{ $profileCompany->no_wa }}" target="_blank">
                            <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                <i class="fa-brands fa-whatsapp font-medium-3"></i>
                            </div>
                        </a>
                        <h4>+{{ $profileCompany->no_wa }}</h4>
                        <span class="text-body">Klik icon WhatsApp untuk berkomunikasi lebih cepat!</span>
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
                        <span class="text-body">Klik icon Email untuk tersambung ke Gmail!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@include('landing-page.master.footer')

@endsection