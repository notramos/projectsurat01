@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2>Edit Surat Keluar</h2>

    <!-- Tampilkan pesan error jika ada -->
   
    <!-- Form Edit Surat Keluar -->
    <form action="{{ route('surat_keluar.update', $suratKeluar->id) }}" method="POST" enctype="multipart/form-data">
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
    
        
        <div class="form-group mb-3">
            <label>Perihal</label>
            <textarea name="perihal" id="perihal" class="form-control  @error('pengirim')
                is-invalid
            @enderror">{{ old('perihal',$suratKeluar->perihal) }}</textarea>
            @error('perihal')
            <span class="invalid-feedback">{{ $message }}</span>
           @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            @if($suratKeluar->file_path)
                <p>File saat ini: 
                    <a href="{{ Storage::url($suratKeluar->file_path) }}" target="_blank">Lihat File</a>
                </p>
            @endif
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Surat</button>
    </form>
</div>
@endsection