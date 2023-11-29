@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Deposito BPR, BPR Lingga Sejahtra, BPR Pangkalan Bun')

@section('title', 'BPR Lingga Sejahtera | Deposito')

@section('deposito', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/tabungan/style.css') }}">
@endsection

@section('content')

<section id="tabungan">
    <div class="container">
        <div class="card-image">
            <img src="{{ asset('app-assets/images/asset-company/deposito.png') }}" alt="Foto">
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-reguler') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/toer.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Deposito Lingga Reguler</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Deposito Reguler</h5>
                                <p>Deposito Lingga Reguler adalah produk investasi dari perbankan untuk masyarakat umum dengan tingkat pengembalian lebih tinggi dibandingkan dengan tabungan
                                    Penarikannya hanya bisa dilakukan setelah melewati waktu tertentu dengan bunga yang kompetitif.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mt-md-0 mt-2">
                <a href="{{ route('deskripsi.deposito', 'deposito-lingga-extra') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/tora.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Deposito Lingga Extra</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>Deposito Extra</h5>
                                <p>Deposito Lingga Extra adalah produk investasi dari perbankan untuk masyarakat umum dengan tingkat pengembalian lebih tinggi dibandingkan dengan tabungan
                                    Penarikannya hanya bisa dilakukan setelah melewati waktu tertentu dengan bunga max LPS serta mendapatkan Extra Emas dan Extra Cashback</p>
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