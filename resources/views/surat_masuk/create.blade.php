@extends('layouts.main')

@section('container')
    <h2>Tambah Surat Masuk</h2>
    <form action="{{ route('surat_masuk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="number" name="nomor_surat" id="nomor_surat" 
                   class="form-control @error('nomor_surat') is-invalid @enderror" 
                   value="{{ old('nomor_surat') }}">
            @error('nomor_surat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat')
                is-invalid
            @enderror" value="{{ old('tanggal_surat') }}" >
            @error('tanggal_surat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label>Perihal</label>
            <textarea name="perihal" id="perihal" class="form-control  @error('pengirim')
                is-invalid
            @enderror">{{ old('perihal') }}</textarea>
            @error('alamat')
            <span class="invalid-feedback">{{ $message }}</span>
           @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    
@endsection
