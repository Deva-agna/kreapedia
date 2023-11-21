@extends('landing-page.master.master')

@section('des', 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.')

@section('key', 'Kreapedia, Koperasi, KNS')

@section('title', 'Semua Kegiatan dan Berita Kreapedia')

@section('news', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('content')

<section id="blog" class="pt-2 pb-2">
    <div class="container">
        <div class="row pl-1 pr-1 mt-2">
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog List -->
                    <div class="blog-list-wrapper">
                        <!-- Blog List Items -->
                        <div class="row">
                            @forelse($berita_s as $berita)
                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="card">
                                    <div class="blog-image">
                                        <a href="{{ route('detail.berita', $berita->slug) }}">
                                            <img class="card-img-top img-fluid" src="{{ asset('asset-berita/' . $berita->gambar) }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ route('detail.berita', $berita->slug) }}" class="blog-title-truncate text-body-heading">{{ $berita->judul }}</a>
                                        </h4>
                                        <div class="media">
                                            <div class="media-body d-flex align-items-center">
                                                <i data-feather='clock'></i>
                                                <span class="text-muted ml-50 mr-25">|</span>
                                                <small class="text-muted">{{ date('d, F Y', strtotime($berita->published)) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="ml-1 pl-2 pt-1" style="border-left: 5px solid #F37635;">
                                <h5>Berita tidak ditemukan!</h5>
                                <p>Kembali ke halaman <a href="{{ route('page.berita') }}">berita.</a></p>
                            </div>
                            @endforelse
                        </div>
                        <!--/ Blog List Items -->

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                {{ $berita_s->links() }}
                            </div>
                        </div>
                        <!--/ Pagination -->
                    </div>
                    <!--/ Blog List -->
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
                            <h6 class="section-label">Baca Juga</h6>
                            <div class="mt-75">
                                @foreach($berita_list_right as $berita)
                                <div class="media mb-2">
                                    <a href="{{ route('detail.berita', $berita->slug) }}" class="mr-2">
                                        <img class="rounded" src="{{ asset('asset-berita/'. $berita->gambar) }}" width="100" height="70" alt="Recent Post Pic" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="blog-recent-post-title">
                                            <a href="{{ route('detail.berita', $berita->slug) }}" class="text-body-heading">{{ $berita->judul }}</a>
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