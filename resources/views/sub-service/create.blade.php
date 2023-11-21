@extends('layout.master')

@section('title', 'Tambah Sub Layanan')

@section('service', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">

<!-- Service css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/service/style.css') }}">
@endsection

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sub.service.store') }}" method="post">
                @csrf
                <input type="hidden" name="service_slug" value="{{ $service->slug }}">
                <div class="form-group">
                    <label for="sub_layanan">Sub Layanan</label>
                    <input type="text" class="form-control @error('sub_layanan') is-invalid @enderror" id="sub_layanan" name="sub_layanan" placeholder="Masukan sub layanan . . ." value="{{ old('sub_layanan') }}">
                    @error('sub_layanan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Penjelasan</label>
                    <div id="editor" class="@error('penjelasan') is-error-border @enderror">
                        {!! old('penjelasan') !!}
                    </div>
                    @error('penjelasan')
                    <div class="message-error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input type="hidden" name="penjelasan" value="{{ old('penjelasan') }}" id="penjelasan">
                <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan</button>
                <a href="{{ route('sub.service', $service->slug) }}" class="btn btn-sm btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-vendor-js')
<script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
@endsection

@section('page-js')
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
        [
            'direction',
            {
                align: []
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
        $('#penjelasan').val(removeTags(html));
    });

    function removeTags(str) {
        if ((str === null) || (str === '<p><br></p>'))
            return str.replace(/(<([^>]+)>)/ig, '');
        else
            str = str.toString();
        return str;
    }
</script>

@endsection