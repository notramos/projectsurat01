<div id="sidebar" class="bg-dark text-light p-3">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
        <span data-feather="home" class="me-2"></span> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center {{ Request::is('surat_masuk*') ? 'active' : '' }}" href="{{ route('surat_masuk.index') }}">
        <span data-feather="mail" class="me-2"></span> Surat Masuk
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center {{ Request::is('surat_keluar') ? 'active' : '' }}" href="{{ route('surat_keluar.index') }}">
        <span data-feather="send" class="me-2"></span> Surat Keluar
      </a>
    </li>
    @can('admin')
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center {{ Request::is('category') ? 'active' : '' }}" href="{{ route('category.index') }}">
        <span data-feather="folder" class="me-2"></span> Kode Arsip
      </a>
    </li>
    @endcan
  </ul>
</div>
