@extends('landing-page.master.master')

@section('title')
{{ $event->judul }}
@endsection

@section('key', 'KNS, Kreapedia, Event')

@section('des', 'Kreapedia memiliki beberapa pelayanan diantaranya seperti event organizer, dalam layanan banyak event yang akan ditawarkan oleh Kreapedia seperti, olahraga (sports), wedding organizer, music, pelatihan, seminar, webinar, pameran, festival, travel, dan berbagai event lainnya sesuai permintaan klien')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('content')

<section>
    <div class="container d-flex justify-content-center">
        <div class="card col-md-6 mt-1 p-0">
            <img src="{{ asset('asset-event/'.$event->gambar) }}" alt="Gambar Event">

            <div class="p-2">
                <div class="card-title">
                    {{ $event->judul }}
                </div>
                <p class="cart-text">{{ date('d, M Y', strtotime($event->tanggal_mulai)) }} - {{ date('d, M Y', strtotime($event->tanggal_selesai)) }}</p>
                <div class="ql-editor p-0" style="white-space: normal;">
                    {!! $event->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection