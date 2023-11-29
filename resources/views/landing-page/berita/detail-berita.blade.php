@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kreapedia, Koperasi, KNS')

@section('title')
{{ $berita->judul }}
@endsection

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('content')

<section id="blog" class="pt-2 pb-2">
    <div class="container">
        <div class="row pl-1 pr-1 mt-2">
            <div class="content-detached content-left w-100">
                <div class="content-body">
                    <div class="blog-list-wrapper">
                        <!-- Blog List Items -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-block" style="background-color: #74B03C; color: #fff; font-size: 20px; text-shadow: 2px 2px 8px #000;">
                                        {{ $berita->judul }}
                                        <br>
                                        <small class="text-muted" style="color: #fff !important;">{{ date('d, F Y', strtotime($berita->published)) }}</small>
                                    </div>
                                    <div class="blog-image">
                                        <a href="#">
                                            <img class="card-img-top img-fluid" src="{{ asset('asset-berita/' . $berita->gambar) }}" alt="Foto berita" style="border-top-right-radius: 0; border-top-left-radius: 0;" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#" class="blog-title-truncate text-body-heading">{{ $berita->judul }}</a>
                                        </h4>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="avatar bg-light-{{$berita->kategori->warna}} rounded mr-1">
                                                <div class="avatar-content">
                                                    <i data-feather="{{$berita->kategori->icon}}"></i>
                                                </div>
                                            </div>
                                            <span>{{ $berita->kategori->kategori }}</span>
                                        </div>
                                        @if($berita_s->count() > 2)
                                        <a href="{{ route('detail.berita', $berita_s[0]->slug) }}">
                                            <div style="border-left: 5px solid #447BBD; padding-left: 10px;">
                                                <h6 style="color: #000;"><strong>Baca juga</strong></h6>
                                                <h5 style="color: #447BBD;">{{ $berita_s[0]->judul }}</h5>
                                            </div>
                                        </a>
                                        @endif
                                        <div class="ql-editor p-0" style="white-space: normal; margin: 20px 0;">
                                            {!! $berita->konten !!}
                                        </div>
                                        @if($berita_s->count() > 2)
                                        <a href="{{ route('detail.berita', $berita_s[1]->slug) }}">
                                            <div style="border-left: 5px solid #447BBD; padding-left: 10px;">
                                                <h6 style="color: #000;"><strong>Baca juga</strong></h6>
                                                <h5 style="color: #447BBD;">{{ $berita_s[1]->judul }}</h5>
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Blog List Items -->
                    </div>
                </div>
            </div>
            <div class="sidebar-detached sidebar-right">
                <div class="sidebar">
                    <div class="blog-sidebar my-2 my-lg-0">
                        <!-- Search bar -->
                        @if(request('kategori'))
                        @foreach($kategori_s as $kategori)
                        @if($kategori->slug == request('kategori'))
                        <h6 class="section-label">Kategori: {{ $kategori->kategori }}</h6>
                        @endif
                        @endforeach
                        @else
                        <h6 class="section-label">Semua Kategori</h6>
                        @endif
                        <form action="{{ route('page.berita') }}">
                            <div class="blog-search">
                                <div class="input-group input-group-merge">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari . . ." value="{{ request('cari') }}">
                                    <input type="hidden" name="kategori" value="{{request('kategori')}}">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text cursor-pointer">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ Search bar -->

                        <!-- Recent Posts -->
                        <div class="blog-recent-posts mt-1">
                            <h6 class="section-label">Baca Juga!!!</h6>
                            <div class="mt-75">
                                @foreach($berita_s->skip(2) as $berita)
                                <div class="media mb-2">
                                    <a href="#" class="mr-2">
                                        <img class="rounded" src="{{ asset('asset-berita/'. $berita->gambar) }}" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="#" class="text-body-heading">{{ $berita->judul }}</a>
                                        </h6>
                                        <div class="text-muted mb-0">{{ date('d, M Y', strtotime($berita->published)) }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/ Recent Posts -->

                        <!-- Categories -->
                        <div class="blog-categories mt-3">
                            <h6 class="section-label">Kategori</h6>
                            <div class="mt-1">
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="{{ route('page.berita') }}" class="mr-75">
                                        <div class="avatar bg-light-info rounded">
                                            <div class="avatar-content">
                                                <i data-feather='globe' class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('page.berita') }}">
                                        <div class="blog-category-title text-body">Semua Berita</div>
                                    </a>
                                </div>
                                @foreach($kategori_s as $kategori)
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="{{ route('page.berita', ['kategori' => $kategori->slug]) }}" class="mr-75">
                                        <div class="avatar bg-light-{{$kategori->warna}} rounded">
                                            <div class="avatar-content">
                                                <i data-feather="{{$kategori->icon}}" class="avatar-icon font-medium-1"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('page.berita', ['kategori' => $kategori->slug]) }}">
                                        <div class="blog-category-title text-body">{{ $kategori->kategori }}</div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/ Categories -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing-page.master.footer')
@endsection