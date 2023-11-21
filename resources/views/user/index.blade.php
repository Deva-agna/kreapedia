@extends('layout.master')

@section('title', 'Master User')

@section('master-user', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">
@endsection

@section('content')

@if(session()->has('informasi'))
<div class="alert alert-info alert-dismissible" role="alert">
    <h4 class="alert-heading">Informasi</h4>
    <div class="alert-body">
        {{session('informasi')}}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card table-resvonsive">
                <div class="card-header">
                    <div class="cart-title">
                        Table User
                    </div>
                    <button class="dt-button create-new btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#modals-slide-in">
                        <i data-feather="plus"></i><span>Tambah User</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-user table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                    <th style="width: 1px;">level</th>
                                    <th style="width: 1px;">Status</th>
                                    <th style="width: 1px;">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-slide-in fade" id="modals-slide-in">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama lengkap" name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email user" name="email" value="{{ old('email') }}">
                        <small class="form-text text-muted"> Anda dapat menggunakan huruf, angka & titik </small>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="no_wa">No HP (WA | Gunakan 62 bukan 0) <span class="text-danger">*</span></label>
                        <input type="number" id="no_wa" class="form-control @error('no_wa') is-invalid @enderror" placeholder="Masukan no tekpon (WA) user" name="no_wa" value="{{ old('no_wa') }}">
                        @error('no_wa')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="job">Job <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" placeholder="Masukan job lengkap" name="job" value="{{old('job')}}">
                        @error('job')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" readonly="readonly" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="facebook">Akun Facebook (Opsional)</label>
                        <input type="text" id="facebook" class="form-control" placeholder="Masukan akun facebook user" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="instagram">Akun Instagram (Opsional)</label>
                        <input type="text" id="instagram" class="form-control" placeholder="Masukan akun instagram user" />
                    </div>
                    <div class="form-group">
                        <label for="role">Level User <span class="text-danger">*</span></label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                            <option value="">- Pilih level user -</option>
                            <option value="sadmin" {{ old('role') == 'sadmin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="tim" {{ old('role') == 'tim' ? 'selected' : '' }}>Tim</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <div class="d-flex" style="margin-bottom: 5px;">
                            <label for="foto_user" class="btn btn-sm btn-outline-secondary waves-effect m-0">
                                <i data-feather='paperclip'></i> Pilih Foto
                            </label>
                            <button type="button" class="ml-1 btn btn-sm btn-icon btn-outline-secondary waves-effect d-none img-clear">
                                <i data-feather='x'></i>
                            </button>
                        </div>
                        <span>(Opsional) Maksimal 2 MB.</span>
                        <input type="file" hidden name="foto_user" id="foto_user" accept="imagr/*">
                        <img src="" class="img-fluid img-preview d-block" width="180px" style="margin-top: 5px;">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan</button>
                    <button type="reset" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-vendor-js')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>

<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

<script>
    $('.data-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user') }}",
        order: [
            [0, 'asc']
        ],
        columns: [{
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'tanggal_lahir',
                name: 'tanggal_lahir'
            },
            {
                data: 'level',
                name: 'level'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
        "drawCallback": function(settings) {
            feather.replace();
        }
    });

    let cehckError = "{{ $errors->any() }}";
    if (cehckError) {
        $('#modals-slide-in').modal('show');
    }


    $('#foto_user').on('change', function() {
        const image = document.querySelector('#foto_user');
        const imgPreview = document.querySelector('.img-preview');
        if (image.files.length > 0) {
            if (image.files[0].size > 2 * 1048576) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Gambar yang diunggah maksimal 2 MB!',
                })
                image.value = "";
                imgPreview.src = "";
                $('.img-clear').addClass('d-none');
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
        const image = document.querySelector('#foto_user');
        const imgPreview = document.querySelector('.img-preview');

        image.value = "";
        imgPreview.src = "";
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

<script>
    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data user akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-delete${id}`).submit();
            }
        })
    });

    $(document).on('click', '#btn-reset', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Password user akan direset!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Reset!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-reset${id}`).submit();
            }
        })
    });

    $(document).on('click', '#btn-status', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Status user akan diubah!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Ubah!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-status${id}`).submit();
            }
        })
    });
</script>

@endsection