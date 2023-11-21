@extends('layout.master')

@section('title', 'Profil Perusahaan')

@section('profil-perusahaan', 'active')

@section('content')

<section id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-header mb-2">
                <!-- profile cover photo -->
                <div class="image-card">
                    @if($about->gambar)
                    <img class="card-img-top" src="{{ asset('asset-about/'. $about->gambar) }}" alt="User Profile Image" />
                    @else
                    <img class="card-img-top" src="{{ asset('app-assets/images/ilustrasi/about-us.jpeg') }}" alt="User Profile Image">
                    @endif
                </div>
                <!--/ profile cover photo -->

                <!-- tabs pill -->
                <div class="profile-header-nav">
                    <!-- navbar -->
                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                        <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i data-feather="align-justify" class="font-medium-5"></i>
                        </button>

                        <!-- collapse  -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                <ul class="nav nav-pills mb-0">
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold @yield('profile')" href="{{ route('profile.company') }}">
                                            <span class="d-none d-md-block">Data Company</span>
                                            <i data-feather='home' class="d-block d-md-none"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold @yield('about')" href="{{ route('about.edit') }}">
                                            <span class="d-none d-md-block">About Us</span>
                                            <i data-feather='user' class="d-block d-md-none"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-bold @yield('visi-misi')" href="{{ route('about.visi.misi.edit') }}">
                                            <span class="d-none d-md-block">Visi & Misi</span>
                                            <i data-feather='book' class="d-block d-md-none"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--/ collapse  -->
                    </nav>
                    <!--/ navbar -->
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    @yield('body')
</section>

@endsection