@extends('layout.master')

@section('title', 'Edit Kategori FAQ')

@section('master-faq', 'sidebar-group-active open')

@section('kategori-faq', 'active')

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.faq.update') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="kategori_slug" value="{{ $kategoriFaq->slug }}">
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" placeholder="Kategori" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{old('kategori', $kategoriFaq->kategori)}}" />
                    @error('kategori')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <a href="{{ route('kategori.faq') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>

@endsection