<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="sidebar-header d-flex flex-column align-items-center px-5 py-4">
      <!-- Sidebar Toggle Button -->
      <a href="/dashboard" class="text-decoration-none text-light fw-bold me-3"><img src="img/logo.png" alt="Logo Kominfo" class="me-2" style="height: 30px;">Sistem Informasi</a>
    </div>
    <!-- User Dropdown -->
    <div class="dropdown ms-auto me-3 mb-2">
      <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i data-feather="user"></i> {{ auth()->user()->username }}
      </button>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
        <li><a class="dropdown-item" href="/settings">Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="dropdown-item">Logout</button>
        </form>
      </ul>
    </div>
  </header>