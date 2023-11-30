@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kredit BPR, BPR Lingga Sejahtra, BPR Pangkalan Bun')

@section('title', 'BPR Lingga Sejahtera | Kredit')

@section('kredit', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/tabungan/style.css') }}">
@endsection

@section('content')

<section>
    <div class="container">
        <h1 class="mt-2">Simulasi Kredit</h1>
        <form action="{{ route('simulasi.kredit') }}">
            <div class="form-group">
                <label for="jumlah_kredit">Jumlah Kredit <em>(Rupiah)</em></label>
                <input id="jumlah_kredit" name="jumlah_kredit" class="form-control form-control-sm" type="text" placeholder="Rp" value="{{ request('jumlah_kredit') }}">
            </div>
            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu <em>(Bulan)</em></label>
                <input id="smallInput" name="jangka_waktu" class="form-control form-control-sm" type="number" placeholder="Bulan" value="{{ request('jangka_waktu') }}">
            </div>
            <div class="form-group">
                <label for="bunga_pertahun">Bunga Pertahun <em>(%)</em></label>
                <input id="smallInput" name="bunga_pertahun" class="form-control form-control-sm" type="number" placeholder="%" value="{{ request('bunga_pertahun') }}">
            </div>
            <div class="form-group">
                <label for="metode">Metode</label>
                <select class="form-control form-control-sm " name="metode" id="metode">
                    <option value="metode_flat">Flat</option>
                    <option value="metode_efektif">Efektif</option>
                    <!-- <option value="metode_anuitas">Anuitas</option> -->
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary waves-effect waves-float waves-light btn-simulasi">Simulasi</button>
        </form>
        @if($angsuran)
        <div class="table-responsive mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background-color: #74B03C; color:#fff; ">No</th>
                        <th style="background-color: #74B03C; color:#fff;">Pokok</th>
                        <th style="background-color: #74B03C; color:#fff;">Bunga</th>
                        <th style="background-color: #74B03C; color:#fff;">Jumlah Angsuran</th>
                        <th style="background-color: #74B03C; color:#fff;">Sisa Pinjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($angsuran as $data)
                    <tr>
                        <td>{{ $data['no'] }}</td>
                        <td>Rp {{ number_format($data['pokok'],0,',','.') }}</td>
                        <td>Rp {{ number_format($data['bunga'],0,',','.') }}</td>
                        <td>Rp {{ number_format($data['jumlahAngsuran'],0,',','.') }}</td>
                        <td>Rp {{ number_format($data['sisaPinjaman'],0,',','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>

@include('landing-page.master.footer')

@endsection

@section('script')

<script>
    var tanpa_rupiah = document.getElementById('jumlah_kredit');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@endsection