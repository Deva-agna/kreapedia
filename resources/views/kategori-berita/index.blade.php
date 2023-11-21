@extends('layout.master')

@section('title', 'Master Kategori')

@section('master-berita', 'sidebar-group-active open')

@section('kategori', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<!-- Kategori css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/kategori/style.css') }}">

@error('icon')
<style>
    .select2-selection--single {
        border: 1px solid #EA5455 !important;
    }
</style>
@enderror

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
            <div class="card">
                <div class="card-header">
                    <div class="cart-title">
                        List Kategori
                    </div>
                    <button class="dt-button create-new btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-toggle="modal" data-target="#add-kategori">
                        <i data-feather="plus"></i><span>Tambah Kategori</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped data-kategori">
                            <thead>
                                <tr>
                                    <th scope="col">Kategori</th>
                                    <th style="width: 1px;" scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="add-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Kategori Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Icons</label>
                            <select class="select2-icons form-control" id="select2-icons" name="icon">
                                <option value="">--pilih icon--</option>
                                <option value="activity" data-icon="activity">Activity</option>
                                <option value="airplay" data-icon="airplay">Airplay</option>
                                <option value="alert-circle" data-icon="alert-circle">Alert Circle</option>
                                <option value="alert-octagon" data-icon="alert-octagon">Alert Octagon</option>
                                <option value="alert-triangle" data-icon="alert-triangle">Alert Triangle</option>
                                <option value="align-center" data-icon="align-center">Align Center</option>
                                <option value="align-justify" data-icon="align-justify">Align Justify</option>
                                <option value="align-left" data-icon="align-left">Align Left</option>
                                <option value="align-right" data-icon="align-right">Align Right</option>
                            </select>
                            @error('icon')
                            <div class="message-error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" placeholder="Kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori')}}" />
                            @error('kategori')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pilih Warna</label>
                            <div class="custom-control custom-control-primary custom-radio">
                                <input type="radio" value="primary" id="warna1" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna1">Primary</label>
                            </div>
                            <div class="custom-control custom-control-secondary custom-radio">
                                <input type="radio" value="secondary" id="warna2" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna2">Secondary</label>
                            </div>
                            <div class="custom-control custom-control-success custom-radio">
                                <input type="radio" value="success" id="warna3" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna3">Success</label>
                            </div>
                            <div class="custom-control custom-control-danger custom-radio">
                                <input type="radio" value="danger" id="warna4" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna4">Danger</label>
                            </div>
                            <div class="custom-control custom-control-warning custom-radio">
                                <input type="radio" value="warning" id="warna5" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna5">Warning</label>
                            </div>
                            <div class="custom-control custom-control-info custom-radio">
                                <input type="radio" value="info" id="warna6" name="warna" class="custom-control-input">
                                <label class="custom-control-label" for="warna6">Info</label>
                            </div>
                            @error('warna')
                            <div class="message-error">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
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

<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>

<script>
    $('.data-kategori').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('kategori') }}",
        columns: [{
                data: 'kategori',
                name: 'kategori'
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
</script>

@if($errors->any())
<script>
    $('#add-kategori').modal('show');
</script>
@endif

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
            text: "Data kategori akan dihapus!",
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
</script>
@endsection