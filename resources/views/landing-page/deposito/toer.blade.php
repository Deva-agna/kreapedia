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
            <img src="{{ asset('app-assets/images/asset-company/depositoreg.png') }}" alt="Foto">
        </div>

        <div class="tali container mt-2">
            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ul>
                <li>Setoran awal minimum Rp. 500.000,-</li>
                <li>Gratis biaya administrasi bulanan</li>
                <li>Jangka waktu penempatan deposito 1, 3, 6 dan 12 bulan</li>
                <li>Bukti Kepemilikan Deposito berupa Sertifikat Pemilik ( Bilyet ) DEPOSITO</li>
                <li>Transaksi aman dan nyaman</li>
            </ul>
            <h2 class="tabungan-title">SYARAT PEMBUKAAN REKENING</h2>
            <ol>
                <li>Kartu Identitas yang masih berlaku, yaitu : KTP (WNI), KITAS/KIPEM/Passport (WNA)</li>
                <li>Mengisi form aplikasi pembukaan Rekening</li>
            </ol>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection