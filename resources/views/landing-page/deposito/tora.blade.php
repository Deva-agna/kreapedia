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
            <img src="{{ asset('app-assets/images/asset-company/depoex.png') }}" alt="Foto">
        </div>

        <div class="tali container mt-2">
            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ul>
                <li>Gratis biaya administrasi bulanan</li>
                <li>Deposito Extra mendapatkan hadiah langsung berupa Emas</li>
                <li>Bukti Kepemilikan Deposito berupa Sertifikat Pemilik ( Bilyet ) DEPOSITO</li>
                <li>Transaksi aman dan nyaman</li>
            </ul>

            <h2 class="tabungan-title">SKEMA</h2>
            <ul>
                <li>Nominal Deposito Extra minimal Rp 100.000.000,-</li>
                <li>Jangka waktu penempatan Deposito Extra minimal 12 bulan</li>
            </ul>
            <h2 class="tabungan-title">SYARAT PEMBUKAAN REKENING</h2>
            <ol>
                <li>Kartu Identitas yang masih berlaku, yaitu : KTP (WNI), KITAS/KIPEM/Passport (WNA)</li>
                <li>Mengisi form aplikasi pembukaan Rekening</li>
            </ol>
        </div>
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Paket Deposito Extra</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Deposito Extra adalah produk Deposito berjangka dengan hadiah langsung Emas dan bunga yang kompetitif.
                        </p>
                    </div>
                    <div class="table-responsive" style="text-align:center;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background-color: #FEB10C; color:#fff; ">Deposit</th>
                                    <th style="background-color: #FEB10C; color:#fff;">Emas (gram)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>100.000.000</td>
                                    <td>2.00</td>
                                </tr>
                                <tr>
                                    <td>125.000.000</td>
                                    <td>2.50</td>
                                </tr>
                                <tr>
                                    <td>150.000.000</td>
                                    <td>3.00</td>
                                </tr>
                                <tr>
                                    <td>250.000.000</td>
                                    <td>5.00</td>
                                </tr>
                                <tr>
                                    <td>500.000.000</td>
                                    <td>10.00</td>
                                </tr>
                                <tr>
                                    <td>600.000.000</td>
                                    <td>12.00</td>
                                </tr>
                                <tr>
                                    <td>750.000.000</td>
                                    <td>15.00</td>
                                </tr>
                                <tr>
                                    <td>1.000.000.000</td>
                                    <td>25.00</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <p>*Bunga belum termasuk pajak</p>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection