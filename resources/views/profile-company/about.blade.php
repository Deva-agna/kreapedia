@extends('profile-company.master')

@section('about', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/about/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-profile.css') }}">
@endsection

@section('body')
<div class="card">
    <div class="card-body">
        <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="about_slug" value="{{ $about->slug }}">
            <h5>About Us Home Page</h5>
            <hr>
            <div class="form-group">
                <label for="video">Video Company <span class="text-danger">*</span></label>
                <input type="link" class="form-control @error('video') is-invalid @enderror" id="video" name="video" placeholder="Masukan link video . . ." value="{{ old('video', $about->video) }}">
                @error('video')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kata_pengantar">Kata Pengantar <span class="text-danger">*</span></label>
                <textarea class="form-control @error('kata_pengantar') is-invalid @enderror" id="kata_pengantar" name="kata_pengantar" rows="3" placeholder="Masukan kata pengantar">{{ old('kata_pengantar', $about->kata_pengantar) }}</textarea>
                @error('kata_pengantar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <h5>Halaman About</h5>
            <hr>
            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukan title . . ." value="{{ old('title', $about->title) }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan deskripsi">{{ old('deskripsi', $about->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Konten <span class="text-danger">*</span></label>
                <div id="editor" class="@error('konten') is-error-border @enderror">
                    {!! old('konten', $about->konten) !!}
                </div>
                @error('konten')
                <div class="message-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <input type="hidden" name="konten" value="{{ old('konten', $about->konten) }}" id="konten">
            <div class="border rounded p-2 mb-2">
                <h4 class="mb-1">Gambar</h4>
                <div class="media flex-column flex-md-row">
                    <div class="thumbnail @error('gambar') is-error-border @enderror">
                        @if($about->gambar)
                        <img src="{{ asset('asset-about/'.$about->gambar) }}" id="blog-feature-image" class="preview-image" onerror="this.style.display='none'">
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
                                    <button type="button" class="btn btn-sm btn-icon btn-outline-secondary img-clear {{ $about->gambar ? '' : 'd-none' }}"><i data-feather='x'></i></button>
                                </div>
                                <input type="file" name="gambar" hidden id="gambar" accept="image/*" />
                                <input type="hidden" id="gambar_old" name="gambar_old" value="{{$about->gambar}}">
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
            <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan Perubahan</button>
        </form>
    </div>
</div>
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
                previewImage.src = "{{ asset('asset-about/'.$about->gambar) }}";
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
                previewImage.src = "{{ asset('asset-about/'.$about->gambar) }}";
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