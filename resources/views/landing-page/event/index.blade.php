@extends('landing-page.master.master')

@section('title', 'Kreapedia | Event')

@section('key', 'KNS, Kreapedia, Event')

@section('des', 'Kreapedia memiliki beberapa pelayanan diantaranya seperti event organizer, dalam layanan banyak event yang akan ditawarkan oleh Kreapedia seperti, olahraga (sports), wedding organizer, music, pelatihan, seminar, webinar, pameran, festival, travel, dan berbagai event lainnya sesuai permintaan klien')

@section('event', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-faq.css') }}">
@endsection

@section('content')

<section id="faq-search-filter">
    <div class="container">
        <div class="card faq-search" style="background-image: url('../../../app-assets/images/asset-company/banner.png')">
            <div class="card-body text-center">
                <h2 class="text-primary">Event</h2>
            </div>
        </div>
    </div>
</section>

<section id="page-event">
    <div class="container mb-2">
        <div class="row d-flex justify-content-center">
            @foreach($event_s as $event)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <a href="{{ route('detail.event', $event->slug) }}">
                    <div class="card-img {{ $event->status == 'finished' ? 'finished' : '' }}">
                        <img class="img-event" src="{{  asset('asset-event/'.$event->gambar) }}" alt="Gambar Event">
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-2">
            {{ $event_s->links() }}
        </div>
    </div>
</section>

@include('landing-page.master.footer')

@endsection