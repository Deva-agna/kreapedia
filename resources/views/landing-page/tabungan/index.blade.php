@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'BPR, BPR Lingga Sejahtra, BPR Pangkalan Bun')

@section('title', 'BPR Lingga Sejahtera | Tabungan')

@section('tabungan', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/tabungan/style.css') }}">
@endsection

@section('content')

<section id="tabungan">
    <div class="container">
        <div class="card-image">
            <img src="{{ asset('app-assets/images/asset-company/bannertali.png') }}" alt="Foto">
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-lingga') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/14.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Tabungan Lingga</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TALI</h5>
                                <p>Tabungan Lingga adalah produk simpanan dengan karakteristik berbentuk rekening tabungan dan dalam mata uang rupiah.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-md-0 mt-2">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-ku') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/19.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">TabunganKu</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TabunganKu</h5>
                                <p>TabunganKu adalah Produk tabungan di Bank BPR Lingga sejahtera yang di rancang untuk Anda yang menginginkan program Tabungan menarik, berkualitas, dan bunga tinggi setiap bulannya.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-md-0 mt-2">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-lingga-bisnis') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/15.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Tabungan Lingga Bisnis</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TABUNGAN BISNIS</h5>
                                <p>Tabungan Lingga Bisnis adalah produk simpanan untuk bisnis dalam hal ini CV / PT dengan karakteristik berbentuk rekening tabungan dan dalam mata uang rupiah.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-lingga-perusahaan') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/20.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Tabungan Lingga Perusahaan</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TABUNGAN PERUSAHAAN</h5>
                                <p>Tabungan Lingga Perusahaan adalah produk simpanan untuk bisnis berbadan hukum dalam hal ini PT yang di tunjukan untuk perusahaan-perusahaan dengan karakteristik berbentuk rekening tabungan dan dalam mata uang rupiah.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-berjangka') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/17.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Tabungan Berjangka</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TAKA</h5>
                                <p>Merupakan tabungan berjangka sangat membantu bagi anda yang merasa kesulitan menyisihkan dana. Untuk itu gunakan cara efektif menabung melalui Produk Taka yang memungkinkan Anda menabung secara rutin.</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="{{ route('deskripsi.tabungan', 'tabungan-anak-sekolah') }}">
                    <div class="card-produk">
                        <img src="{{ asset('app-assets/images/asset-company/16.png') }}" alt="Foto Produk">
                        <div class="title-produk">
                            <h5 class="m-0">Tabungan Anak Sekolah</h5>
                        </div>
                        <div class="des-produk">
                            <div class="text-s">
                                <h5>TANAS</h5>
                                <p>TANAS adalah tabungan khusus untuk anak sekolah atau pelajar yang berusia dibawah 17 tahun dan belum memiliki KTP. TANAS akan membantu kita atau anak untuk lebih disiplin dalam mengelola keuangan, membentuk karakter gemar
                                    menabung.</p>
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