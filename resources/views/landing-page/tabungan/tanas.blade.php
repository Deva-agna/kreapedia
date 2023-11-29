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
            <img src="{{ asset('app-assets/images/asset-company/9.png') }}" alt="Foto">
        </div>

        <div class="tali container mt-2">
            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ul>
                <li>Bunga tabungan 4% p.a</li>
                <li>Bebas biaya administrasi</li>
                <li>Pajak tabungan ditanggung BPR Lingga</li>
                <li>Rekening atas nama anak</li>
                <li>Mendapatkan hadiah langsung / Gimmick menarik pada saat pembukaan Rekening</li>
                <li>Transaksi aman dan nyaman</li>
                <li>Transaksi setoran melalui virtual account Bank BJB dan Danamon</li>
            </ul>

            <h2 class="tabungan-title">SKEMA</h2>
            <ul>
                <li>Setoran awal minimum Rp. 100.000,- dan setoran selanjutnya mengikuti setoran awal sesuai Perjanjian Pembukaan Tabungan</li>
                <li>Jangka waktu Tabungan 1 s/d 5 Tahun</li>
                <li>Sebagai bukti kepemilikan rekening TANAS Nasabah akan mendapatkan Sertifikat Pemilik ( Bilyet ) TANAS</li>
            </ul>

            <h2 class="tabungan-title">KEUNGGULAN</h2>
            <ol>
                <li>Akta Kelahiran Anak / Kartu Identitas Anas (KIA)</li>
                <li>Kartu Keluarga ( KK )</li>
            </ol>

        </div>
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simulasi TANAS</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Tabungan Anak Sekolah (TANAS) adalah fasilitas tabungan yang diberikan khusus untuk perencanaan pendidikan sekolah anak anda.
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
                                    <td>1.226.000</td>
                                    <td>2.500.000</td>
                                    <td>3.822.000</td>
                                    <td>5.192.000</td>
                                    <td>6.610.000</td>
                                </tr>
                                <tr>
                                    <td>200.000</td>
                                    <td>2.452.000</td>
                                    <td>5.000.000</td>
                                    <td>7.644.000</td>
                                    <td>10.384.000</td>
                                    <td>13.220.000</td>
                                </tr>
                                <tr>
                                    <td>300.000</td>
                                    <td>3.678.000</td>
                                    <td>7.500.000</td>
                                    <td>11.466.000</td>
                                    <td>15.576.000</td>
                                    <td>19.830.000</td>
                                </tr>
                                <tr>
                                    <td>400.000</td>
                                    <td>4.904.000</td>
                                    <td>10.000.000</td>
                                    <td>15.288.000</td>
                                    <td>20.768.000</td>
                                    <td>26.440.000</td>
                                </tr>
                                <tr>
                                    <td>500.000</td>
                                    <td>6.130.000</td>
                                    <td>12.500.000</td>
                                    <td>19.110.000</td>
                                    <td>25.960.000</td>
                                    <td>33.050.000</td>
                                </tr>
                                <tr>
                                    <td>600.000</td>
                                    <td>7.356.000</td>
                                    <td>15.000.000</td>
                                    <td>22.932.000</td>
                                    <td>31.152.000</td>
                                    <td>39.660.000</td>
                                </tr>
                                <tr>
                                    <td>700.000</td>
                                    <td>8.852.000</td>
                                    <td>17.500.000</td>
                                    <td>26.754.000</td>
                                    <td>36.344.000</td>
                                    <td>46.270.000</td>
                                </tr>
                                <tr>
                                    <td>800.000</td>
                                    <td>9.808.000</td>
                                    <td>20.000.000</td>
                                    <td>30.576.000</td>
                                    <td>41.536.000</td>
                                    <td>52.880.000</td>
                                </tr>
                                <tr>
                                    <td>900.000</td>
                                    <td>11.034.000</td>
                                    <td>22.500.000</td>
                                    <td>34.398.000</td>
                                    <td>46.728.000</td>
                                    <td>59.490.000</td>
                                </tr>
                                <tr>
                                    <td>1.000.000</td>
                                    <td>12.260.000</td>
                                    <td>25.000.000</td>
                                    <td>38.220.000</td>
                                    <td>51.920.000</td>
                                    <td>66.100.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </ </div>
</section>

@include('landing-page.master.footer')

@endsection