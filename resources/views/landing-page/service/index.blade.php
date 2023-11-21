@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kreapedia, Koperasi, Service')

@section('title', 'Kreapedia | Service')

@section('service', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-faq.css') }}">
@endsection

@section('content')

<section id="faq-search-filter">
    <div class="container">
        <div class="card faq-search" style="background-image: url('../../../app-assets/images/asset-company/banner.png')">
            <div class="card-body text-center">
                <h2 class="text-primary mb-0">Service</h2>
            </div>
        </div>
    </div>
</section>

<section id="accordion-with-shadow">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="accordionWrapa10" role="tablist" aria-multiselectable="true">
                    <div class="card collapse-icon">
                        <div class="card-header">
                            <h4 class="card-title">Layanan</h4>
                        </div>
                        <div class="card-body">
                            <!-- <p class="card-text">
                                Use class <code>.collapse-shadow</code> as a wrapper of your accordion/collapse <code>card</code> for
                                shadow.
                            </p> -->
                            <div class="collapse-shadow">
                                @forelse($service_s as $service)
                                <div class="card">
                                    <div id="heading1{{$loop->iteration}}" class="card-header" data-toggle="collapse" role="button" data-target="#accordion1{{$loop->iteration-1}}" aria-expanded="false" aria-controls="accordion1{{$loop->iteration-1}}">
                                        <span class="lead collapse-title"> {{ $service->layanan }} </span>
                                    </div>
                                    <div id="accordion1{{$loop->iteration-1}}" role="tabpanel" data-parent="#accordionWrapa10" aria-labelledby="heading1{{$loop->iteration}}" class="collapse">
                                        <div class="card-body">
                                            <div class="ql-editor p-0" style="white-space: normal; margin: 20px 0;">
                                                {!! $service->penjelasan !!}
                                            </div>
                                            <hr>
                                            <div>
                                                <ul class="timeline">
                                                    @foreach($service->subService as $sub_service)
                                                    <li class="timeline-item">
                                                        <span class="timeline-point">
                                                            <i data-feather='disc'></i>
                                                        </span>
                                                        <div class="timeline-event">
                                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{$sub_service->sub_layanan}}</h6>
                                                            </div>
                                                            <div class="ql-editor p-0" style="white-space: normal;">
                                                                {!! $sub_service->penjelasan !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/components/components-collapse.js') }}"></script>
@endsection