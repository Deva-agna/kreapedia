@extends('profile-company.master')

@section('visi-misi', 'active')

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
        <form action="{{ route('about.visi.misi.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="about_slug" value="{{ $about->slug }}">
            <div class="form-group">
                <label>Visi <span class="text-danger">*</span></label>
                <div id="editor1" class="@error('visi') is-error-border @enderror">
                    {!! old('visi', $about->visi) !!}
                </div>
                @error('visi')
                <div class="message-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <input type="hidden" name="visi" value="{{ old('visi', $about->visi) }}" id="visi">
            <div class="form-group">
                <label>Misi <span class="text-danger">*</span></label>
                <div id="editor2" class="@error('misi') is-error-border @enderror">
                    {!! old('misi', $about->misi) !!}
                </div>
                @error('misi')
                <div class="message-error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <input type="hidden" name="misi" value="{{ old('misi', $about->misi) }}" id="misi">
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

    let idEditor = ['#editor1', '#editor2'];
    let idInput = ['#visi', '#misi'];
    var quill = [];

    for (let i = 0; i < idEditor.length; i++) {
        styleEditor(i);
    }

    function styleEditor(index) {
        quill[index] = new Quill(idEditor[index], {
            bounds: idEditor[index],
            modules: {
                toolbar: tools
            },
            theme: 'snow'
        });

        quill[index].on('text-change', function() {
            var html = quill[index].root.innerHTML;
            $(idInput[index]).val(removeTags(html));
        });
    }

    function removeTags(str) {
        if ((str === null) || (str === '<p><br></p>'))
            return str.replace(/(<([^>]+)>)/ig, '');
        else
            str = str.toString();
        return str;
    }
</script>

@endsection