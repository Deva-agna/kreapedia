@extends('layout.master')

@section('title', 'Edit User')

@section('master-user', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">
@endsection

@section('content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="slug" value="{{ $user->slug }}">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('nama') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                        </div>
                                        <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama', $user->nama) }}" />
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('email') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="mail"></i></span>
                                        </div>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="no_wa">No HP (WA) <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('no_wa') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
                                        </div>
                                        <input type="number" id="no_wa" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" placeholder="No HP" value="{{ old('no_wa', $user->no_wa) }}" />
                                        @error('no_wa')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="job">Job <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('job') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather='tag'></i></span>
                                        </div>
                                        <input type="text" id="job" class="form-control @error('job') is-invalid @enderror" name="job" placeholder="Job" value="{{ old('job', $user->job) }}" />
                                        @error('job')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('tanggal_lahir') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather='calendar'></i></span>
                                        </div>
                                        <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather='facebook'></i></span>
                                        </div>
                                        <input type="text" id="facebook" class="form-control" name="facebook" placeholder="facebook" value="{{ old('facebook', $user->facebook) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather='instagram'></i></span>
                                        </div>
                                        <input type="text" id="instagram" class="form-control" name="instagram" placeholder="instagram" value="{{ old('instagram', $user->instagram) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-icon">Level User <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge @error('role') is-invalid @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather='layers'></i></span>
                                        </div>
                                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                            <option value="">- Pilih level user -</option>
                                            <option value="sadmin" {{ old('role', $user->role) == 'sadmin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="tim" {{ old('role', $user->role) == 'tim' ? 'selected' : '' }}>Tim</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label for="foto" class="m-0 btn btn-sm btn-outline-primary">
                                            <i data-feather='upload-cloud'></i>
                                            <span>Foto user</span>
                                        </label>
                                        <button type="button" class="ml-1 btn btn-sm btn-icon btn-outline-primary {{ $user->image ? '' : 'd-none' }} img-clear">
                                            <i data-feather='x'></i>
                                        </button>
                                    </div>
                                    <input type="file" hidden name="foto" id="foto" accept="image/*">
                                    <input type="hidden" id="old_foto" name="old_foto" value="{{ $user->image }}">
                                </div>
                                @if($user->image)
                                <img src="{{ asset('foto/'. $user->image) }}" class="img-fluid img-preview d-block rounded" width="100" style="margin-top: 5px; margin-bottom: 10px;">
                                @else
                                <img src="" class="img-fluid img-preview d-block" width="180px" style="margin-top: 5px; margin-bottom: 10px;">
                                @endif
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary mr-1">Simpan</button>
                                <a href="{{ route('user') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-vendor-js')
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

<script>
    $('#foto').on('change', function() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        const oldImage = document.querySelector('#old_foto');

        if (image.files.length > 0) {
            if (image.files[0].size > 2 * 1048576) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Gambar yang diunggah maksimal 2 MB!',
                })
                image.value = "";
                if (oldImage.value) {
                    imgPreview.src = `{{ asset('foto/${oldImage.value}') }}`;
                } else {
                    imgPreview.src = "";
                    $('.img-clear').addClass('d-none');
                }
            } else {
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
                $('.img-clear').removeClass('d-none');
            }
        } else {
            image.value = "";
            imgPreview.src = "";
            $('.img-clear').addClass('d-none');
        }
    })

    $('.img-clear').on('click', function() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        const oldImage = document.querySelector('#old_foto');

        oldImage.value = "";
        image.value = "";
        imgPreview.src = "";
        $('.img-clear').addClass('d-none');
    });
</script>
@endsection