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
            <img src="{{ asset('app-assets/images/asset-company/8.png') }}" alt="Foto">
        </div>

        <div class="tali container mt-2">
            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ul>
                <li>Bunga tabungan 2%, untuk saldo diatas Rp. 1.000.000,- bunga menjadi 3%</li>
                <li>Biaya Administrasi/bulan Rp. 5000,-</li>
                <li>Biaya penggantian buku karena rusak/hilang Rp. 10.000,-</li>
                <li>Biaya penutupan rekening Rp. 10.000,-</li>
                <li>Transaksi aman dan nyaman</li>
                <li>Transaksi setoran melalui virtual account Bank BJB dan Danamon</li>
            </ul>

            <h2 class="tabungan-title">SKEMA</h2>
            <ul>
                <li>Setoran awal minimum Rp. 100.000,-</li>
                <li>Setoran selanjutnya minimum Rp. 10.000,-</li>
                <li>Setoran rata-rata minimum/bulan Rp. 50.000,-</li>
            </ul>

            <h2 class="tabungan-title">SYARAT PEMBUKAAN REKENING</h2>
            <ol>
                <li>Akta pendirian perusahaan</li>
                <li>Akta terbaru / terkahir perusahaan</li>
                <li>NPWP perusahaan</li>
                <li>NIB perusahaan</li>
                <li>KTP & NPWP Pengurus</li>
                <li>Mengisis dan menandatangani aplikasi pembukaan rekening.</li>
            </ol>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection