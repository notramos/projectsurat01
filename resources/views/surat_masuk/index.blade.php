@extends('layouts.main')

@section('container')
  <div class="container mt-3 ">

        @if (session('success'))
          <div class="alert alert-success" id="flash-message">
              {{ session('success') }}
          </div>
        @endif

    <div class="card">
        <div class="card-header bg-dark text-white d-flex align-items-center">
            <span> Daftar Surat Masuk</span>
            <a href="{{ route('surat_masuk.create') }}" class="badge bg-primary ms-auto"><span data-feather="plus-circle"></span></a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="table">
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suratMasuk as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->tanggal_surat }}</td>
                        <td>
                            <a href="{{ route('surat_masuk.show',$surat->id) }}" 
                                    class="badge bg-info" 
                                    data-id="{{ $surat->id }}" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalSuratMasuk">
                                    <span data-feather="eye"></span>
                                    </a>
                            <a href="{{ route('surat_masuk.edit', $surat->id) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="{{ route('surat_masuk.destroy', $surat->id) }}" method="POST" style="display: inline;">
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
<div class="modal fade" id="modalSuratMasuk" tabindex="-1" aria-labelledby="modalSuratMasukLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSuratMasukLabel">Detail Surat Masuk</h5>
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
  const modalSuratMasuk = document.getElementById('modalSuratMasuk');
  const modalBody = modalSuratMasuk.querySelector('.modal-body');

  modalSuratMasuk.addEventListener('show.bs.modal', function (event) {
    // Tombol yang diklik
    const button = event.relatedTarget;
    const suratId = button.getAttribute('data-id');

    // Tampilkan loading
    modalBody.innerHTML = '<p>Loading...</p>';

    // Lakukan AJAX request ke backend
    fetch(`surat_masuk/${suratId}`)
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
// FLASH MESSAGE
        document.addEventListener("DOMContentLoaded", function () {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                // Durasi flash message dalam milidetik (misalnya 5 detik)
                setTimeout(() => {
                    flashMessage.style.transition = "opacity 0.5s ease";
                    flashMessage.style.opacity = "0"; // Buat elemen memudar
                    setTimeout(() => flashMessage.remove(), 500); // Hapus elemen setelah animasi
                }, 5000); // 5000 ms = 5 detik
            }
        });
  </script>
@endsection
