@extends('landing-page.master.master')

@section('title', 'Kreapedia | Literasi')

@section('key', 'KNS, Kreapedia, Literasi')

@section('des', 'Kreapedia memiliki beberapa pelayanan diantaranya seperti event organizer, dalam layanan banyak event yang akan ditawarkan oleh Kreapedia seperti, olahraga (sports), wedding organizer, music, pelatihan, seminar, webinar, pameran, festival, travel, dan berbagai event lainnya sesuai permintaan klien')

@section('literasi', 'active')

@section('page-css')

<style>
    .abstrak-literasi {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

@endsection

@section('content')

<section id="literasi" class="pt-2 pb-2">
    <div class="container">
        <div class="row pl-1 pr-1 mt-2">
            <div class="content-detached content-left w-100">
                <div class="content-body">
                    <div class="blog-list-wrapper">
                        <!-- Literasi List Items -->
                        @forelse($literasi_s as $literasi)
                        <div>
                            <u>
                                <a style="font-size: 17px; line-height: 19px; font-weight: 500; color: #447BBD;" href="{{ route('detail.literasi', $literasi->slug) }}">{{ $literasi->judul }}</a>
                            </u>
                            <h6 style="color: #006621; font-size: 13px;">{{ $literasi->keyword }} - {{ date('d, M Y', strtotime($literasi->published)) }}</h6>
                            <p class="abstrak-literasi">{{ $literasi->abstrak }}</p>
                        </div>
                        @empty
                        <div class="ml-1 pl-2 pt-1" style="border-left: 5px solid #F37635;">
                            <h5>Literasi tidak ditemukan!</h5>
                            <p>Kembali ke halaman <a href="{{ route('page.literasi') }}">literasi.</a></p>
                        </div>
                        @endforelse
                        <!--/ Literasi List Items -->

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                {{ $literasi_s->links() }}
                            </div>
                        </div>
                        <!--/ Pagination -->
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
                        <form action="{{ route('page.literasi') }}">
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

                        <!-- Categories -->
                        <div class="blog-categories mt-3">
                            <h6 class="section-label">Kategori</h6>
                            <div class="mt-1">
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="{{ route('page.literasi') }}">
                                        <div class="blog-category-title text-body">Semua Literasi</div>
                                    </a>
                                </div>
                                @foreach($kategori_s as $kategori)
                                <div class="d-flex justify-content-start align-items-center mb-75">
                                    <a href="{{ route('page.literasi', ['kategori' => $kategori->slug]) }}">
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