@extends('profile-company.master')

@section('profile', 'active')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-profile.css') }}">
@endsection

@section('body')

<div id="page-profile-update" class="card">
    <div class="card-body">
        <div class="card-image d-flex align-items-center">
            <img src="{{ asset('app-assets/images/asset-company/'. $profile->gambar) }}" alt="Logo Kreapedia" class="preview-image">
            <div>
                <label for="gambar" class="ml-2 mt-0 mb-0 btn btn-sm btn-icon btn-primary waves-float waves-light">
                    <i data-feather='image'></i>
                </label>
            </div>
            <button class="ml-1 btn btn-sm btn-icon btn-outline-secondary img-clear d-none">
                <i class="mr-0" data-feather="trash-2"></i>
            </button>
        </div>
        @error('gambar')
        <span class="text-danger" style="font-size: .857rem;">{{ $message }}</span>
        @enderror
        <form action="{{ route('profile.company.update.informasi') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="file" name="gambar" id="gambar" hidden accept="image/png, image/jpeg, image/jpg" />
            <input type="hidden" name="company_slug" value="{{ $profile->slug }}">
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="nama_perusahaan">Nama Perusahaan <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">
                                <i data-feather='home' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="nama_perusahaan" type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan" value="{{ old('nama_perusahaan', $profile->nama_perusahaan) }}" placeholder="Masukan nama perusahaan . . ." aria-describedby="basic-addon3" />
                        @error('nama_perusahaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">
                                <i data-feather='map-pin' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{  old('alamat', $profile->alamat) }}" placeholder="Masukan link alamat perusahaan . . ." aria-describedby="basic-addon5" />
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="kota">Kota <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">
                                <i data-feather='bookmark' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota', $profile->kota) }}" placeholder="Masukan link kota perusahaan . . ." aria-describedby="basic-addon5" />
                        @error('kota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="negara">Negara <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4">
                                <i data-feather='flag' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="negara" type="text" class="form-control @error('negara') is-invalid @enderror" name="negara" value="{{ old('negara', $profile->negara) }}" placeholder="Masukan link negara perusahaan . . ." aria-describedby="basic-addon4" />
                        @error('negara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="no_wa">No Whatsapp (gunakan 62 bukan 0) <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">
                                <i class="fa-brands fa-whatsapp font-medium-2"></i>
                            </span>
                        </div>
                        <input id="no_wa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa', $profile->no_wa) }}" placeholder="Masukan link no whatsapp perusahaan . . ." aria-describedby="basic-addon3" />
                        @error('no_wa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon9">
                                <i data-feather='mail' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $profile->email) }}" placeholder="Masukan link email perusahaan . . ." aria-describedby="basic-addon9" />
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="tiktok">TikTok</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">
                                <i class="fa-brands fa-tiktok font-medium-2"></i>
                            </span>
                        </div>
                        <input id="tiktok" type="url" class="form-control @error('tiktok') is-invalid @enderror" name="tiktok" value="{{ old('tiktok', $profile->tiktok) }}" placeholder="Link akun tiktok . . ." aria-describedby="basic-addon3" />
                        @error('tiktok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="instagram">Instagram</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">
                                <i data-feather="instagram" class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="instagram" type="url" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram', $profile->instagram) }}" placeholder="Link akun instagram . . ." aria-describedby="basic-addon5" />
                        @error('instagram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="youtube">Youtube</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon5">
                                <i data-feather='youtube' class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="youtube" type="url" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ old('youtube', $profile->youtube) }}" placeholder="Link akun youtube . . ." aria-describedby="basic-addon5" />
                        @error('youtube')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="facebook">Facebook</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4">
                                <i data-feather="facebook" class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="facebook" type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', $profile->facebook) }}" placeholder="Link akun facebook . . ." aria-describedby="basic-addon4" />
                        @error('facebook')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="twitter">Twitter</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">
                                <i data-feather="twitter" class="font-medium-2"></i>
                            </span>
                        </div>
                        <input id="twitter" type="url" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter', $profile->twitter) }}" placeholder="Link akun twitter . . ." aria-describedby="basic-addon3" />
                        @error('twitter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="telegram">Telegram</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon9">
                                <i class="fa-brands fa-telegram font-medium-2"></i>
                            </span>
                        </div>
                        <input id="telegram" type="url" class="form-control @error('telegram') is-invalid @enderror" name="telegram" value="{{ old('telegram', $profile->telegram) }}" placeholder="Link akun telegram . . ." aria-describedby="basic-addon9" />
                        @error('telegram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                    <button type="submit" class="btn btn-sm btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
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
            previewImage.src = "{{ asset('app-assets/images/asset-company/' . $profile->gambar) }}";
            $('.img-clear').addClass('d-none');
        }
    });

    $('.img-clear').on('click', function() {
        const gambar = document.querySelector('#gambar');
        const previewImage = document.querySelector('.preview-image');

        gambar.value = "";
        previewImage.src = "{{ asset('app-assets/images/asset-company/' . $profile->gambar) }}";
        $('.img-clear').addClass('d-none');
    });
</script>
@endsection