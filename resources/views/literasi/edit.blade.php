@extends('layout.master')

@section('title', 'Edit Literasi')

@section('master-literasi', 'sidebar-group-active open')

@section('literasi', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<!-- Literasi css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/literasi/style.css') }}">
@endsection

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('literasi.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="literasi_slug" value="{{ $literasi->slug }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukan judul . . ." value="{{ old('judul', $literasi->judul) }}">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                <option value="">--Pilih--</option>
                                @foreach($kategoriLiterasi_s as $kategoriLiterasi)
                                <option value="{{ $kategoriLiterasi->id }}" {{ old('kategori', $literasi->kategori_literasi_id) == $kategoriLiterasi->id ? 'selected' : '' }}>{{ $kategoriLiterasi->kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="abstrak">Abstrak <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('abstrak') is-invalid @enderror" name="abstrak" id="abstrak" rows="3" placeholder="Masukan abstrak . . . .">{{ old('abstrak', $literasi->abstrak) }}</textarea>
                            @error('abstrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="keyword">Keyword (opsional)</label>
                            <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" placeholder="Masukan keyword . . ." value="{{ old('keyword', $literasi->keyword) }}">
                            @error('keyword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="border rounded p-2">
                            <h4 class="mb-1">File PDF <span class="text-danger">*</span></h4>
                            <small class="text-muted">file pdf max size 2mb.</small>
                            <div class="form-group mb-0">
                                <div class="custom-file">
                                    <div class="flex-row">
                                        <label class="mb-0 btn btn-sm btn-outline-secondary" for="file_pdf">
                                            <i data-feather='paperclip'></i> Pilih
                                        </label>
                                        <button type="button" class="btn btn-sm btn-icon btn-outline-secondary file-clear d-none"><i data-feather='x'></i></button>
                                    </div>
                                    <input type="file" name="file_pdf" hidden id="file_pdf" accept="application/pdf">
                                    <input type="hidden" name="file_old" value="{{$literasi->nama_file}}">
                                </div>
                            </div>
                            <small class="text-muted" id="name_file"></small>
                            @error('file_pdf')
                            <div class="message-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan</button>
                <a href="{{ route('literasi') }}" class="btn btn-sm btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

<script>
    $('#file_pdf').on('change', function() {
        let nama_file = document.querySelector('#name_file');
        if (this.files.length > 0) {
            nama_file.innerHTML = this.files[0].name;
            $('.file-clear').removeClass('d-none');
        } else {
            nama_file.innerHTML = "";
        }
    });

    $('.file-clear').click(function() {
        let nama_file = document.querySelector('#name_file');
        let file_pdf = document.querySelector('#file_pdf');

        file_pdf.value = "";
        nama_file.innerHTML = "";
        $('.file-clear').addClass('d-none');
    });
</script>
@endsection