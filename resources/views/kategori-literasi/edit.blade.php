@extends('layout.master')

@section('title', 'Edit Kategori Literasi')

@section('master-literasi', 'sidebar-group-active open')

@section('kategori-literasi', 'active')

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.literasi.update') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="kategori_slug" value="{{ $kategoriLiterasi->slug }}">
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" placeholder="Kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori', $kategoriLiterasi->kategori)}}" />
                    @error('kategori')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('kategori.literasi') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>

@endsection