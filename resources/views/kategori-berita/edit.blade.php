@extends('layout.master')

@section('title', 'Edit Kategori')

@section('master-berita', 'sidebar-group-active open')

@section('kategori', 'active')

@section('vendor-css')
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

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.update') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="slug" value="{{ $kategori->slug }}">
                <div class="form-group">
                    <label>Icons</label>
                    <select class="select2-icons form-control @error('icon') is-invalid @enderror" id="select2-icons" name="icon">
                        <option value="">--pilih icon--</option>
                        <option {{ old('icon', $kategori->icon) == 'activity' ? 'selected' : '' }} value="activity" data-icon="activity">Activity</option>
                        <option {{ old('icon', $kategori->icon) == 'airplay' ? 'selected' : '' }} value="airplay" data-icon="airplay">Airplay</option>
                        <option {{ old('icon', $kategori->icon) == 'alert-circle' ? 'selected' : '' }} value="alert-circle" data-icon="alert-circle">Alert Circle</option>
                        <option {{ old('icon', $kategori->icon) == 'alert-octagon' ? 'selected' : '' }} value="alert-octagon" data-icon="alert-octagon">Alert Octagon</option>
                        <option {{ old('icon', $kategori->icon) == 'alert-triangle' ? 'selected' : '' }} value="alert-triangle" data-icon="alert-triangle">Alert Triangle</option>
                        <option {{ old('icon', $kategori->icon) == 'align-center' ? 'selected' : '' }} value="align-center" data-icon="align-center">Align Center</option>
                        <option {{ old('icon', $kategori->icon) == 'align-justify' ? 'selected' : '' }} value="align-justify" data-icon="align-justify">Align Justify</option>
                        <option {{ old('icon', $kategori->icon) == 'align-left' ? 'selected' : '' }} value="align-left" data-icon="align-left">Align Left</option>
                        <option {{ old('icon', $kategori->icon) == 'align-right' ? 'selected' : '' }} value="align-right" data-icon="align-right">Align Right</option>
                    </select>
                    @error('icon')
                    <div class="message-error">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" placeholder="Kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori', $kategori->kategori)}}" />
                    @error('kategori')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pilih Warna</label>
                    <div class="custom-control custom-control-primary custom-radio">
                        <input type="radio" value="primary" id="warna1" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "primary" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna1">Primary</label>
                    </div>
                    <div class="custom-control custom-control-secondary custom-radio">
                        <input type="radio" value="secondary" id="warna2" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "secondary" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna2">Secondary</label>
                    </div>
                    <div class="custom-control custom-control-success custom-radio">
                        <input type="radio" value="success" id="warna3" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "success" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna3">Success</label>
                    </div>
                    <div class="custom-control custom-control-danger custom-radio">
                        <input type="radio" value="danger" id="warna4" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "danger" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna4">Danger</label>
                    </div>
                    <div class="custom-control custom-control-warning custom-radio">
                        <input type="radio" value="warning" id="warna5" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "warning" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna5">Warning</label>
                    </div>
                    <div class="custom-control custom-control-info custom-radio">
                        <input type="radio" value="info" id="warna6" name="warna" class="custom-control-input" {{old('warna', $kategori->warna) == "info" ? 'checked' : ''}}>
                        <label class="custom-control-label" for="warna6">Info</label>
                    </div>
                    @error('warna')
                    <div class="message-error">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('kategori') }}" class="btn btn-sm btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page-vendor-js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
@endsection