@extends('layouts.main')

@section('container')
<div class="container">
  <!-- Tombol Tambah -->
  <div class="row">
    <div class="col-12">
      <a href="#" data-bs-toggle="modal" data-bs-target="#tambahCategoryModal">
        <button type="button" class="btn btn-success btn-sm mb-3">Tambah</button>
      </a>
    </div>
  </div>

  <!-- Tabel -->
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-responsive col-lg-8">
        <thead>
          <tr class="table table-success">
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->name }}</td>
            <td>
              <a href="#" 
                class="badge bg-warning btn-edit" 
                data-id="{{ $category->id }}" 
                data-name="{{ $category->name }}">
                <span data-feather="edit"></span>
              </a>
              <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
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
</div>

<!-- Modal Box Tambah -->
<div class="modal fade" id="tambahCategoryModal" tabindex="-1" aria-labelledby="tambahCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="tambahCategoryModalLabel">Tambah Kode Arsip</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('category.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="name" class="form-label">Nama Kode Arsip</label>
                      <input type="text" class="form-control @error('name')
                        is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                          <div  class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>

{{-- Modal Edit --}}

@if (isset($category))
<div class="modal fade" id="modalEditCategory" tabindex="-1" aria-labelledby="modalEditCategoryLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <form action="{{ route('category.update', $category->id) }}" method="POST" id="formEditCategory">
              @csrf
              @method('PUT')
              <div class="modal-header">
                  <h5 class="modal-title" id="modalEditCategoryLabel">Edit Kode Arsip</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="editName" class="form-label">Nama Kode Arsip</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="editName" name="name" value="{{ old('name',$category->name) }}">
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endif
 



@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('tambahCategoryModal'));
            modal.show();
        });
    </script>
@endif

@if ($errors->any() && old('is_edit'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('modalEditCategory'));
            modal.show();

            // Isi nilai lama ke dalam form
            document.getElementById('editName').value = "{{ old('name') }}";
        });
    </script>
@endif

<script>
  document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const categoryId = this.dataset.id; // Ambil ID kategori dari data-id
        const categoryName = this.dataset.name; // Ambil nama kategori dari data-name

        // Reset modal input (bersihkan nilai sebelumnya)
        const formEdit = document.getElementById('formEditCategory');
        formEdit.action = formEdit.action.replace(':id', categoryId); // Ganti :id dengan ID yang benar

        // Isi data baru ke input
        document.getElementById('editName').value = categoryName; // Isi nama kategori

        // Buka modal
        var modal = new bootstrap.Modal(document.getElementById('modalEditCategory'));
        modal.show();
    });
  });
</script>
@endsection