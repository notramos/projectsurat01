@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Surat Masuk</h2>
        <form action="{{ route('surat_masuk.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
            </div>
            <div class="form-group">
                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim" required>
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection