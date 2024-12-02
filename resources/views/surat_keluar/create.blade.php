@extends('layouts.main')

@section('container')
    <h2>Tambah Surat Keluar</h2>
    <form action="{{ route('surat_keluar.store') }}" method="POST">
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
    
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control  @error('alamat')
                is-invalid
            @enderror" value="{{ old('alamat') }}" >
            @error('alamat')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
        </div>
    
        <div class="form-group">
            <label>Pengirim</label>
            <input type="text" name="penerima" class="form-control   @error('penerima')
                is-invalid
            @enderror" value="{{ old('penerima') }}" >
            @error('penerima')
             <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="file">Kode Arsip</label>
            <select class="form-control @error('categories_id') is-invalid @enderror" name="categories_id">
                <option value="" disabled {{ old('categories_id') == null ? 'selected' : '' }}>Pilih Kode Arsip</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categories_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categories_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>    
        
        <div class="form-group mb-3">
            <label>Perihal</label>
            <textarea name="perihal" id="perihal" class="form-control  @error('perihal')
                is-invalid
            @enderror">{{ old('perihal') }}</textarea>
            @error('perihal')
            <span class="invalid-feedback">{{ $message }}</span>
           @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
