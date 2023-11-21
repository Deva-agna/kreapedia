@extends('layout.master')

@section('title', 'Sub Service')

@section('service', 'active')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/sweet-alert/sweetalert2.min.css') }}">

<!-- Service css -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/service/style.css') }}">
@endsection

@section('content')

<section id="layanan">
    <div class="row">
        <div class="col-12">
            <div class="card table-resvonsive">
                <div class="card-header">
                    <div class="cart-title">
                        {{$service->layanan}}
                    </div>
                    <a href="{{ route('sub.service.create', $service->slug) }}" class="dt-button create-new btn btn-sm btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                        <i data-feather="plus"></i><span>Tambah Sub Layanan</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-service table table-striped">
                            <thead>
                                <tr>
                                    <th>Sub Layanan</th>
                                    <th style="width: 1px;">Aksi</th>
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
    $('.data-service').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sub.service', $service->slug) }}",
        columns: [{
                data: 'sub_layanan',
                name: 'sub_layanan'
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
            text: "Data sub layanan akan dihapus!",
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
</script>

@endsection