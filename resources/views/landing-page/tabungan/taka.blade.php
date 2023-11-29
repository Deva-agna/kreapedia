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
            <img src="{{ asset('app-assets/images/asset-company/10.png') }}" alt="Foto">
        </div>

        <div class="tali container mt-2">
            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ul>
                <li>Bunga tabungan 5% p.a</li>
                <li>Bebas biaya administrasi</li>
                <li>Pajak tabungan ditanggung BPR Lingga</li>
                <li>Mendapatkan hadiah langsung / Gimmick menarik pada saat pembukaan Rekening</li>
                <li>Transaksi aman dan nyaman</li>
                <li>Transaksi setoran melalui virtual account Bank BJB dan Danamon</li>
            </ul>

            <h2 class="tabungan-title">SKEMA</h2>
            <ul>
                <li>Setoran awal minimum Rp. 100.000,- dan setoran selanjutnya mengikuti setoran awal sesuai Perjanjian Pembukaan Tabungan</li>
                <li>Jangka waktu Tabungan 1 s/d 5 Tahun</li>
                <li>Sebagai bukti kepemilikan rekening TAKA Nasabah akan mendapatkan Sertifikat Pemilik ( Bilyet ) TAKA</li>
            </ul>

            <h2 class="tabungan-title">SYARAT PEMBUKAAN REKENING</h2>
            <ol>
                <li>Kartu Identitas yang masih berlaku, yaitu : KTP (WNI), KITAS/KIPEM/Passport (WNA)</li>
                <li>Mengisi form aplikasi pembukaan TAKA</li>
            </ol>
        </div>

        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simulasi TAKA</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tabungan Berjangka (TAKA) adalah fasilitas tabungan yang diberikan khusus untuk membantu merencanakan masa depan Anda.
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background-color: #74B03C; color:#fff; ">Setoran Per Bulan</th>
                                    <th style="background-color: #74B03C; color:#fff;">12 Bulan</th>
                                    <th style="background-color: #74B03C; color:#fff;">24 Bulan</th>
                                    <th style="background-color: #74B03C; color:#fff;">36 Bulan</th>
                                    <th style="background-color: #74B03C; color:#fff;">48 Bulan</th>
                                    <th style="background-color: #74B03C; color:#fff;">60 Bulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>100.000</td>
                                    <td>1.232.000</td>
                                    <td>2.525.000</td>
                                    <td>3.877.500</td>
                                    <td>5.290.000</td>
                                    <td>6.762.500</td>
                                </tr>
                                <tr>
                                    <td>200.000</td>
                                    <td>2.465.000</td>
                                    <td>5.050.000</td>
                                    <td>7.775.000</td>
                                    <td>10.580.000</td>
                                    <td>13.525.000</td>
                                </tr>
                                <tr>
                                    <td>300.000</td>
                                    <td>3.697.500</td>
                                    <td>7.575.000</td>
                                    <td>11.632.500</td>
                                    <td>15.870.000</td>
                                    <td>20.287.500</td>
                                </tr>
                                <tr>
                                    <td>400.000</td>
                                    <td>4.930.000</td>
                                    <td>10.100.000</td>
                                    <td>15.510.000</td>
                                    <td>21.160.000</td>
                                    <td>27.050.000</td>
                                </tr>
                                <tr>
                                    <td>500.000</td>
                                    <td>6.162.500</td>
                                    <td>12.625.000</td>
                                    <td>19.387.500</td>
                                    <td>26.450.000</td>
                                    <td>33.812.500</td>
                                </tr>
                                <tr>
                                    <td>600.000</td>
                                    <td>7.395.000</td>
                                    <td>15.150.000</td>
                                    <td>23.265.000</td>
                                    <td>31.740.000</td>
                                    <td>40.575.000</td>
                                </tr>
                                <tr>
                                    <td>700.000</td>
                                    <td>8.627.500</td>
                                    <td>17.675.000</td>
                                    <td>27.142.500</td>
                                    <td>37.030.000</td>
                                    <td>47.337.500</td>
                                </tr>
                                <tr>
                                    <td>800.000</td>
                                    <td>9.860.000</td>
                                    <td>20.200.000</td>
                                    <td>31.020.000</td>
                                    <td>42.320.000</td>
                                    <td>54.100.000</td>
                                </tr>
                                <tr>
                                    <td>900.000</td>
                                    <td>11.092.500</td>
                                    <td>22.725.000</td>
                                    <td>34.897.500</td>
                                    <td>47.610.000</td>
                                    <td>60.862.500</td>
                                </tr>
                                <tr>
                                    <td>1.000.000</td>
                                    <td>12.325.000</td>
                                    <td>25.250.000</td>
                                    <td>38.775.000</td>
                                    <td>52.900.000</td>
                                    <td>67.625.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection