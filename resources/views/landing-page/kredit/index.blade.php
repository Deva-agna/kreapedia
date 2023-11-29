@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kredit BPR, BPR Lingga Sejahtra, BPR Pangkalan Bun')

@section('title', 'BPR Lingga Sejahtera | Kredit')

@section('kredit', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/tabungan/style.css') }}">
@endsection

@section('content')

<section id="tabungan">
    <div class="container">
        <div class="card-image">
            <img src="{{ asset('app-assets/images/asset-company/deposito.png') }}" alt="Foto">
        </div>
        <div class="row mt-2 d-flex justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-reguler') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/kmk.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit Modal Kerja</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit Modal Kerja</h5>
                                <p>Kredit Modal Kerja adalah fasilitas kredit yang ditujukan bagi pelaku usaha untuk membantu membiayai keperluan usaha, serta penambahan modal usaha dan pengembangan usaha Anda.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-md-0 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/kmkk.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit Modal Kerja Kontraktor</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit Kontraktor</h5>
                                <p>Kredit modal kerja kontraktor adalah fasilitas kredit untuk pembeliaan alat-alat usaha Anda, modernisasi mesin, atau penyewaan alat berat.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-md-0 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/kinves.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit Investasi</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit Investasi</h5>
                                <p>Kredit Investasi adalah fasilitas kredit untuk pembeliaan alat-alat produksi usaha Anda, modernisasi mesin, relokasi usaha dan pendirian usaha baru.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/ksm.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit KKB Sepeda Motor</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit Sepeda Motor</h5>
                                <p>Kredit KKB Sepeda Motor adalah fasilitas kredit untuk pembiayaan pembeliaan sepeda motor baru atau secondhand.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/krm.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit KKB Mobil</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit KKB Mobil</h5>
                                <p>Kredit KKB Mobil adalah fasilitas kredit untuk pembiayaan pembeliaan mobil baru atau secondhand.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/kre.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit Barang Elektronik</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit Barang Elektronik</h5>
                                <p>Kredit Barang Elektronik adalah fasilitas kredit untuk pembiayaan pembeliaan barang elektronik.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/kpr.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Kredit KPR</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Kredit KPR</h5>
                                <p>Kredit yang diberikan kepada pihak ketiga termasuk pegawai untuk pembiayaan pembelian rumah.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/tora.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Simulasi Kredit </h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Simulasi Kredit</h5>
                                <p>Simulasi perhitungan kredit.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection