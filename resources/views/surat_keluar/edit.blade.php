@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2>Edit Surat Keluar</h2>

    <!-- Tampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit Surat Keluar -->
    <form action="{{ route('surat_keluar.update', $suratKeluar->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Metode PUT untuk update -->

        <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="number" name="nomor_surat" id="nomor_surat" 
                   class="form-control @error('nomor_surat') is-invalid @enderror" 
                   value="{{ old('nomor_surat',$suratKeluar->nomor_surat) }}">
            @error('nomor_surat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat')
                is-invalid
            @enderror" value="{{ old('tanggal_surat',$suratKeluar->tanggal_surat) }}" >
            @error('tanggal_surat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control  @error('alamat')
                is-invalid
            @enderror" value="{{ old('alamat',$suratKeluar->alamat) }}" >
            @error('alamat')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
        </div>
    
        <div class="form-group">
            <label>Pengirim</label>
            <input type="text" name="penerima" class="form-control   @error('penerima')
                is-invalid
            @enderror" value="{{ old('penerima',$suratKeluar->penerima) }}" >
            @error('penerima')
             <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="file">Kode Arsip</label>
            <select class="form-control @error('categories_id') is-invalid @enderror" name="categories_id">
                <option value="" disabled {{ old('categories_id',$suratKeluar->categories_id) == null ? 'selected' : '' }}>Pilih Kode Arsip</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categories_id',$suratKeluar->categories_id) == $category->id ? 'selected' : '' }}>
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
            <textarea name="perihal" id="perihal" class="form-control  @error('pengirim')
                is-invalid
            @enderror">{{ old('perihal',$suratKeluar->perihal) }}</textarea>
            @error('perihal')
            <span class="invalid-feedback">{{ $message }}</span>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Surat</button>
    </form>
</div>
@endsection