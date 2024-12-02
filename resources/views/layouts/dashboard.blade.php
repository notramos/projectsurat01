@extends('layouts.main')

@section('container')
<div class="container mt-2">
  <!-- Header -->
  <div class="row mb-3 ">
    <h1>Dashboard</h1>
  </div>
</div>

  <!-- Content -->
  <div class="row">
      <!-- Table 1 -->
      <div class="col-md-6">
          <div class="card">
              <div class="card-header bg-dark text-white d-flex align-items-center">
                 <span> Tabel Surat Masuk </span> 
                  <a  href="{{ route('export.suratMasuk') }}" class="btn btn-dark btn-sm ms-auto"><span data-feather="printer"></span></a>
              </div>
              <div class="card-body">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode Arsip</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($suratMasuk as $sm)
                          <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$sm->tanggal_surat}}</td>
                           <td>{{$sm->category->name?? 'Tidak Ada Kode Arsip'}}</td>
                          </tr>
                      </tbody>
                        @endforeach
                  </table>
                  <div class="d-flex justify-content-center mt-3">
                    {{ $suratMasuk->links('pagination::bootstrap-4') }}
                </div>
              </div>
          </div>
      </div>

      <!-- Table 2 -->
      <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-dark text-white d-flex align-items-center">
              <span> Tabel Surat Keluar </span> 
              <a href="{{ route('export.suratKeluar') }}" class="btn btn-dark btn-sm ms-auto"><span data-feather="printer"></span></a>
           </div>
              <div class="card-body">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Surat</th>
                              <th>Kode Arsip</th>
                          </tr>
                      </thead>
                      <tbody >
                        @foreach ($suratKeluar as $sk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sk->tanggal_surat}}</td>
                            <td>{{ $sk->category->name ?? 'Tidak Ada Kode Arsip' }}</td>
                        </tr>   
                        @endforeach
                      </tbody>
                  </table>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $suratKeluar->links('pagination::bootstrap-4') }}
                    </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection