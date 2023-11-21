@extends('layout.master')

@section('title', 'Master Testimoni')

@section('master-testimoni', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<!-- Event css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/testimoni/style.css') }}">
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

<section id="testimoni">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="cart-title">
                        List Testimoni
                    </div>
                    <a href="{{ route('testimoni.create') }}" class="dt-button create-new btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                        <i data-feather="plus"></i><span>Tambah Testimoni</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-testimoni table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Ulasan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
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
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/sweet-alert/sweetalert2.min.js') }}"></script>


<script>
    $('.data-testimoni').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('testimoni') }}",
        columns: [{
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'ulasan',
                name: 'ulasan'
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
            text: "Data testimoni akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-delete${id}`).submit();
            }
        })
    });

    $(document).on('click', '#btn-status', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Status testimoni akan di rubah!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-status${id}`).submit();
            }
        })
    });
</script>

@endsection