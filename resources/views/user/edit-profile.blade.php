@extends('layout.master')

@section('title', 'Edit Profile')

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
<section id="page-account-settings">
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column nav-left">
                <!-- general -->
                <li class="nav-item {{ $errors->has('nama') || $errors->has('email') || $errors->has('no_wa') || $errors->has('job') || $errors->has('tanggal_lahir') ? 'active' : '' }} {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? '' : 'active'}}">
                    <a class="nav-link {{ $errors->has('nama') || $errors->has('email') || $errors->has('no_wa') || $errors->has('job') || $errors->has('tanggal_lahir') ? 'active' : '' }} {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? '' : 'active'}}" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">General</span>
                    </a>
                </li>
                <!-- change password -->
                <li class="nav-item {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? 'active' : ''}}">
                    <a class="nav-link {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? 'active' : ''}}" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ left menu section -->

        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane {{ $errors->has('nama') || $errors->has('email') || $errors->has('no_wa') || $errors->has('job') || $errors->has('tanggal_lahir') ? 'active' : '' }} {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? '' : 'active'}}" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- header media -->
                            <div class="media">
                                <a href="javascript:void(0);" class="mr-25">
                                    @if(auth()->user()->image)
                                    <img src="{{ asset('foto/'. auth()->user()->image) }}" id="account-upload-img" class="rounded mr-50 img-preview" alt="profile image" height="80" width="80" style="object-fit: cover;">
                                    @else
                                    <img src="{{ asset('app-assets/images/asset-company/foto-defa.png') }}" id="account-upload-img" class="rounded mr-50 img-preview" alt="profile image" height="80" width="80" style="object-fit: cover;">
                                    @endif
                                </a>
                                <!-- upload and reset button -->
                                <div class="media-body mt-75 ml-1">
                                    <label for="foto" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                    <button type="button" class="mb-75 btn btn-sm btn-icon btn-outline-primary {{ auth()->user()->image ? '' : 'd-none' }} img-clear">
                                        <i data-feather='x'></i>
                                    </button>
                                    <p>Allowed JPG or PNG. Max size of 2mb</p>
                                </div>
                                <!--/ upload and reset button -->
                            </div>
                            <!--/ header media -->

                            <!-- form -->
                            <form class="form" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="slug" value="{{ auth()->user()->slug }}">
                                <input type="hidden" id="old_foto" name="old_foto" value="{{ auth()->user()->image }}">
                                <input type="file" id="foto" name="foto" hidden accept="image/*" />
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge @error('nama') is-invalid @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                                </div>
                                                <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama', auth()->user()->nama) }}" />
                                                @error('nama')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge @error('email') is-invalid @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" />
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="no_wa">No HP (WA | gunakan 62 bukan 0) <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge @error('no_wa') is-invalid @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
                                                </div>
                                                <input type="number" id="no_wa" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" placeholder="No HP" value="{{ old('no_wa', auth()->user()->no_wa) }}" />
                                                @error('no_wa')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="job">Job <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge @error('job') is-invalid @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather='tag'></i></span>
                                                </div>
                                                <input type="text" id="job" class="form-control @error('job') is-invalid @enderror" name="job" placeholder="Job" value="{{ old('job', auth()->user()->job) }}" />
                                                @error('job')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge @error('tanggal_lahir') is-invalid @enderror">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather='calendar'></i></span>
                                                </div>
                                                <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" name="tanggal_lahir" value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}">
                                                @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather='facebook'></i></span>
                                                </div>
                                                <input type="text" id="facebook" class="form-control" name="facebook" placeholder="facebook" value="{{ old('facebook', auth()->user()->facebook) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather='instagram'></i></span>
                                                </div>
                                                <input type="text" id="instagram" class="form-control" name="instagram" placeholder="instagram" value="{{ old('instagram', auth()->user()->instagram) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sm btn-primary mt-2 mr-1">Save changes</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                        <!-- change password -->
                        <div class="tab-pane {{ $errors->has('password') || $errors->has('new_password') || $errors->has('new_password_confirmation') ? 'active' : 'fade'}}" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                            <!-- form -->
                            <form class="validate-form" action="{{ route('user.profile.update.password') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-old-password">Old Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="account-old-password" name="password" placeholder="Old Password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-new-password">New Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="account-new-password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                                @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-retype-new-password">Retype New Password</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-retype-new-password" name="new_password_confirmation" placeholder="New Password" />
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-sm btn-primary mr-1 mt-1">Save changes</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ change password -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ right content section -->
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
                    imgPreview.src = "{{ asset('app-assets/images/asset-company/foto-defa.png') }}";
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
            imgPreview.src = "{{ asset('app-assets/images/asset-company/foto-defa.png') }}";
            $('.img-clear').addClass('d-none');
        }
    })

    $('.img-clear').on('click', function() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        const oldImage = document.querySelector('#old_foto');

        oldImage.value = "";
        image.value = "";
        imgPreview.src = "{{ asset('app-assets/images/asset-company/foto-defa.png') }}";
        $('.img-clear').addClass('d-none');
    });
</script>

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

@endsection