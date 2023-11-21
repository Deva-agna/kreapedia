@extends('layout.master')

@section('title', 'Edit Testimoni')

@section('master-testimoni', 'active')

@section('vendor-css')
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<!-- Testimoni css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/testimoni/style.css') }}">
@endsection

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('testimoni.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="testimoni_slug" value="{{$testimoni->slug}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan nama . . ." value="{{ old('nama', $testimoni->nama) }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="job">Job (opsional)</label>
                            <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" placeholder="Masukan job . . ." value="{{ old('job', $testimoni->job) }}">
                            @error('job')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ulasan">Ulasan <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('ulasan') is-invalid @enderror" name="ulasan" id="ulasan" rows="3" placeholder="Masukan ulasan . . .">{{old('ulasan', $testimoni->ulasan)}}</textarea>
                            @error('ulasan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="border rounded p-2">
                            <h4 class="mb-1">Gambar</h4>
                            <div class="media flex-column flex-md-row">
                                <div class="thumbnail @error('gambar') is-error-border @enderror">
                                    @if($testimoni->gambar)
                                    <img src="{{ asset('asset-testimoni/'.$testimoni->gambar) }}" id="blog-feature-image" class="preview-image" onerror="this.style.display='none'">
                                    @else
                                    <img src="" id="blog-feature-image" class="preview-image" onerror="this.style.display='none'">
                                    @endif
                                </div>
                                <div class="flex-column">
                                    <small class="text-muted">Ingin hasil baik gunakan resolusi 170x170, image size 2mb.</small>
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <div class="flex-row">
                                                <label class="mb-0 btn btn-sm btn-outline-secondary" for="gambar">
                                                    <i data-feather='paperclip'></i> Pilih
                                                </label>
                                                <button type="button" class="btn btn-sm btn-icon btn-outline-secondary img-clear {{ $testimoni->gambar ? '' : 'd-none' }}"><i data-feather='x'></i></button>
                                            </div>
                                            <input type="file" name="gambar" hidden id="gambar" accept="image/*" />
                                            <input type="hidden" id="gambar_old" name="gambar_old" value="{{$testimoni->gambar}}">
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
                <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan</button>
                <a href="{{ route('testimoni') }}" class="btn btn-sm btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-vendor-js')
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

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
                previewImage.src = "{{ asset('asset-testimoni/'.$testimoni->gambar) }}";
            } else {
                previewImage.src = "";
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
                previewImage.src = "{{ asset('asset-testimoni/'.$testimoni->gambar) }}";
            } else {
                previewImage.src = "";
                $('.img-clear').addClass('d-none');
            }
        } else {
            gambar.value = "";
            oldImage.value = "";
            previewImage.src = "";
            $('.img-clear').addClass('d-none');
        }
    });
</script>

@endsection