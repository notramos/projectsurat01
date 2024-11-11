@extends('layouts.app')

@section('content')
    <h2>Tambah Surat Masuk</h2>
    <form action="{{ route('surat_masuk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-control">
        </div>
        <div class="form-group">
            <label>Pengirim</label>
            <input type="text" name="pengirim" class="form-control">
        </div>
        <div class="form-group">
            <label>Perihal</label>
            <textarea name="perihal" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
