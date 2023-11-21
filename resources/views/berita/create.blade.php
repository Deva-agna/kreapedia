@extends('layout.master')

@section('title', 'Tambah Berita')

@section('master-berita', 'sidebar-group-active open')

@section('berita', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">

<!-- Berita css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/berita/style.css') }}">

@error('kategori')
<style>
    .select2-selection--single {
        border: 1px solid #EA5455 !important;
    }
</style>
@enderror

@endsection

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukan judul . . ." value="{{ old('judul') }}">
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select2-icons">Kategori</label>
                            <select class="select2-icons form-control" id="select2-icons" name="kategori">
                                <option value="">--pilih kategori--</option>
                                @foreach($kategori_s as $kategori)
                                <option value="{{ $kategori->id }}" data-icon="{{ $kategori->icon }}" {{old('kategori') == $kategori->id ? 'selected' : ''}}>{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <div class="message-error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Konten</label>
                            <div id="editor" class="@error('konten') is-error-border @enderror">
                                {!! old('konten') !!}
                            </div>
                            @error('konten')
                            <div class="message-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <input type="hidden" name="konten" value="{{ old('konten') }}" id="konten">
                    </div>
                    <div class="col-12 mb-2">
                        <div class="border rounded p-2">
                            <h4 class="mb-1">Gambar</h4>
                            <div class="media flex-column flex-md-row">
                                <div class="thumbnail @error('gambar') is-error-border @enderror">
                                    <img src="" id="blog-feature-image" class="preview-image" class="preview-image" onerror="this.style.display='none'">
                                </div>
                                <div class="flex-column">
                                    <small class="text-muted">Required image resolution 800x520, image size 2mb.</small>
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <div class="flex-row">
                                                <label class="mb-0 btn btn-sm btn-outline-secondary" for="gambar">
                                                    <i data-feather='paperclip'></i> Pilih
                                                </label>
                                                <button type="button" class="btn btn-sm btn-icon btn-outline-secondary img-clear d-none"><i data-feather='x'></i></button>
                                            </div>
                                            <input type="file" name="gambar" hidden id="gambar" accept="image/*" />
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
                <a href="{{ route('berita') }}" class="btn btn-sm btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-vendor-js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

<script>
    var tools = [
        [{
            size: []
        }],
        ['bold', 'italic', 'underline', 'strike'],
        [{
                color: []
            },
            {
                background: []
            }
        ],
        [{
                script: 'super'
            },
            {
                script: 'sub'
            }
        ],
        [{
                header: '1'
            },
            {
                header: '2'
            },
        ],
        [{
                list: 'ordered'
            },
            {
                list: 'bullet'
            },
            {
                indent: '-1'
            },
            {
                indent: '+1'
            }
        ],
        ['link'],
    ]

    var quill = new Quill('#editor', {
        bounds: '#editor',
        modules: {
            toolbar: tools
        },
        theme: 'snow'
    });

    quill.on('text-change', function() {
        var html = quill.root.innerHTML;
        $('#konten').val(removeTags(html));
    });

    function removeTags(str) {
        if ((str === null) || (str === '<p><br></p>'))
            return str.replace(/(<([^>]+)>)/ig, '');
        else
            str = str.toString();
        return str;
    }
</script>

<script>
    $('#gambar').on('change', function() {
        const gambar = document.querySelector('#gambar');
        const previewImage = document.querySelector('.preview-image');

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
            previewImage.src = "";
            $('.img-clear').addClass('d-none');
        }
    });

    $('.img-clear').on('click', function() {
        const gambar = document.querySelector('#gambar');
        const previewImage = document.querySelector('.preview-image');

        gambar.value = "";
        previewImage.src = "";
        $('.img-clear').addClass('d-none');
    });
</script>

@endsection