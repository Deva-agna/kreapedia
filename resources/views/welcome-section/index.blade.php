@extends('layout.master')

@section('title', 'Welcome Section')

@section('welcome-section', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">
<!-- Welcome Section css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/welcome-section/style.css') }}">
@endsection

@section('content')
@if($welcomeSection->gambar)
<section id="welcome-section" class="d-flex align-items-center" style="background-image: url(../../../asset-welcome-section/{{$welcomeSection->gambar}});">
    @else
    <section id="welcome-section" class="d-flex align-items-center" style="background-image: url(../../../app-assets/images/ilustrasi/about-us.jpeg);">
        @endif
        <div class="container ">
            <h1>{{ $welcomeSection->kalimat_pertama }} <span class="company">{{ $welcomeSection->kalimat_kedua }}</span>.</h1>
            <h2>{{ $welcomeSection->caption }}</h2>
            <div>
                <button type="button" class="btn btn-sm btn-warning waves-float waves-light" style="background-color: #447BBD !important; border: none;">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Hubungi Kami</span>
                </button>
            </div>
        </div>
    </section>

    <div class="card mt-2">
        <form action="{{ route('welcome.section.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-header">
                <button type="submit" class="btn btn-sm btn-primary waves-float waves-light">Simpan Perubahan</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="hidden" name="welcome_section_slug" value="{{ $welcomeSection->slug }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="kalimat_pertama" for="">Kalimat Pertama</label>
                            <input type="text" class="form-control @error('kalimat_pertama') is-invalid @enderror" name="kalimat_pertama" id="kalimat_pertama" placeholder="Masukan kalimat pertama . . ." value="{{ old('kalimat_pertama', $welcomeSection->kalimat_pertama) }}">
                            @error('kalimat_pertama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="kalimat_kedua" for="">Kalimat Kedua</label>
                            <input type="text" class="form-control @error('kalimat_kedua') is-invalid @enderror" name="kalimat_kedua" id="kalimat_kedua" placeholder="Masukan kalimat kedua . . ." value="{{ old('kalimat_kedua', $welcomeSection->kalimat_kedua) }}">
                            @error('kalimat_kedua')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <textarea class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" rows="3" placeholder="Masukan caption . . .">{{ old('caption', $welcomeSection->caption) }}</textarea>
                            @error('caption')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="border rounded p-2">
                            <h4 class="mb-1">Gambar</h4>
                            <div class="media flex-column flex-md-row">
                                <div class="thumbnail">
                                    @if($welcomeSection->gambar)
                                    <img src="{{ asset('asset-welcome-section/'.$welcomeSection->gambar) }}" id="blog-feature-image" class="preview-image" onerror="this.style.display='none'">
                                    @else
                                    <img src="{{ asset('app-assets/images/ilustrasi/about-us.jpeg') }}" id="blog-feature-image" class="preview-image" onerror="this.style.display='none'">
                                    @endif
                                </div>
                                <div class="flex-column">
                                    <small class="text-muted">image size 2mb.</small>
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <div class="flex-row">
                                                <label class="mb-0 btn btn-sm btn-outline-secondary" for="gambar">
                                                    <i data-feather='paperclip'></i> Pilih
                                                </label>
                                                <button type="button" class="btn btn-sm btn-icon btn-outline-secondary img-clear {{ $welcomeSection->gambar ? '' : 'd-none' }}"><i data-feather='x'></i></button>
                                            </div>
                                            <input type="file" name="gambar" hidden id="gambar" accept="image/*" />
                                            <input type="hidden" id="gambar_old" name="gambar_old" value="{{$welcomeSection->gambar}}">
                                        </div>
                                    </div>
                                    @error('gambar')
                                    <div class="message-error">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

    @section('page-js')
    <script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

    @if(session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '{{session("success")}}'
        })
    </script>
    @endif

    <script>
        $('#gambar').on('change', function() {
            const gambar = document.querySelector('#gambar');
            const previewImage = document.querySelector('.preview-image');
            const oldImage = document.querySelector('#gambar_old');

            if (gambar.files.length > 0) {
                previewImage.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(gambar.files[0]);

                oFReader.onload = function(oFREvent) {
                    previewImage.src = oFREvent.target.result;
                }
                $('.img-clear').removeClass('d-none');
            } else {
                gambar.value = "";
                if (oldImage.value) {
                    previewImage.src = "{{ asset('asset-welcome-section/'.$welcomeSection->gambar) }}";
                } else {
                    previewImage.src = "{{ asset('app-assets/images/ilustrasi/about-us.jpeg') }}";
                    $('.img-clear').addClass('d-none');
                }
            }
        });

        $('.img-clear').on('click', function() {
            const gambar = document.querySelector('#gambar');
            const previewImage = document.querySelector('.preview-image');
            const oldImage = document.querySelector('#gambar_old');

            if (gambar.value) {
                gambar.value = "";
                if (oldImage.value) {
                    previewImage.src = "{{ asset('asset-welcome-section/'.$welcomeSection->gambar) }}";
                } else {
                    previewImage.src = "{{ asset('app-assets/images/ilustrasi/about-us.jpeg') }}";
                    $('.img-clear').addClass('d-none');
                }
            } else {
                gambar.value = "";
                oldImage.value = "";
                previewImage.src = "{{ asset('app-assets/images/ilustrasi/about-us.jpeg') }}";
                $('.img-clear').addClass('d-none');
            }
        });
    </script>
    @endsection