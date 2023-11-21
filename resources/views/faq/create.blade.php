@extends('layout.master')

@section('title', 'Tambah FAQ')

@section('master-faq', 'sidebar-group-active open')

@section('faq', 'active')

@section('content')

<section>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('faq.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" placeholder="Masukan pertanyaan . . ." value="{{ old('pertanyaan') }}">
                            @error('pertanyaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                <option value="">--Pilih--</option>
                                @foreach($kategoriFaq_s as $kategoriFaq)
                                <option value="{{ $kategoriFaq->id }}" {{ old('kategori') == $kategoriFaq->id ? 'selected' : '' }}>{{ $kategoriFaq->kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="penjelasan">Penjelasan</label>
                            <textarea class="form-control @error('penjelasan') is-invalid @enderror" name="penjelasan" id="penjelasan" rows="3" placeholder="Masukan penjelasan . . ." style="color: rgb(78, 81, 84);">{{ old('penjelasan') }}</textarea>
                            @error('penjelasan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary data-submit mr-1">Simpan</button>
                <a href="{{ route('faq') }}" class="btn btn-sm btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

@endsection