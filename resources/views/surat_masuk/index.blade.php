@extends('layouts.app')

@section('content')
    <h2>Daftar Surat Masuk</h2>
    <a href="{{ route('surat_masuk.create') }}" class="btn btn-primary">Tambah Surat Masuk</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $surat)
                <tr>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tanggal_surat }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>
                        <a href="{{ route('surat_masuk.edit', $surat->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('surat_masuk.destroy', $surat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
