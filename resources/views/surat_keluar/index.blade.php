@extends('layouts.main')

@section('container')
<div class="container mt-3 ">
    <div class="card">
        <div class="card-header bg-dark text-white d-flex align-items-center">
            <span> Daftar Surat Keluar</span>
            <a href="{{ route('surat_keluar.create') }}" class="badge bg-primary ms-auto"><span data-feather="plus-circle"></span></a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="table">
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suratKeluar as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->tanggal_surat }}</td>
                        <td>
                          @if($surat->file_path)
                          @php
                            $extension = pathinfo($surat->file_path, PATHINFO_EXTENSION);
                          @endphp
                          @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <a href="{{ Storage::url($surat->file_path) }}" target="_blank">
                              <img src="{{ Storage::url($surat->file_path) }}" alt="Gambar" style="max-height: 50px;">
                            </a>
                          @elseif($extension === 'pdf')
                            <a href="{{ Storage::url($surat->file_path) }}" target="_blank">Lihat PDF</a>
                          @else
                            <a href="{{ Storage::url($surat->file_path) }}" target="_blank">Download File</a>
                          @endif
                        @else
                          Tidak Ada File
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('surat_keluar.show',$surat->id) }}" 
                                class="badge bg-info" 
                                data-id="{{ $surat->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalSuratKeluar">
                                <span data-feather="eye"></span>
                                </a>
                            <a href="{{ route('surat_keluar.edit', $surat->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="{{ route('surat_keluar.destroy', $surat->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <span data-feather="trash"></span>
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSuratKeluar" tabindex="-1" aria-labelledby="modalSuratKeluarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSuratKeluarLabel">Detail Surat Keluar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Konten dinamis akan dimuat di sini -->
          <p>Loading...</p>
        </div>
      </div>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
  const modalSuratKeluar = document.getElementById('modalSuratKeluar');
  const modalBody = modalSuratKeluar.querySelector('.modal-body');

  modalSuratKeluar.addEventListener('show.bs.modal', function (event) {
    // Tombol yang diklik
    const button = event.relatedTarget;
    const suratId = button.getAttribute('data-id');

    // Tampilkan loading
    modalBody.innerHTML = '<p>Loading...</p>';

    // Lakukan AJAX request ke backend
    fetch(`surat_keluar/${suratId}`)
      .then(response => response.json())
      .then(data => {
        // Render data ke modal body
        modalBody.innerHTML = `
          <p><strong>Tanggal:</strong> ${data.tanggal}</p>
          <p><strong>Kode Arsip:</strong> ${data.kode_arsip}</p>
          <p><strong>Isi Surat:</strong> ${data.isi}</p>
        `;
      })
      .catch(error => {
        modalBody.innerHTML = '<p>Error memuat data!</p>';
      });
  });
});
  </script>
@endsection
