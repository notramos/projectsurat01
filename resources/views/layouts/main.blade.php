<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sistem Aplikasi Surat - Kominfo</title>


    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

    {{-- ckeditor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.js"></script>

    <style>
      /* Sidebar styles */
      #sidebar {
    width: 250px; /* Tentukan lebar sidebar */
    min-height: 100vh; /* Pastikan sidebar memenuhi tinggi layar */
    overflow-y: auto; /* Tambahkan scrollbar jika konten terlalu panjang */
  }
  #sidebar.collapsed {
  width: 0;
}

  #sidebar .nav-link {
    font-size: 1rem; /* Perbesar ukuran font */
    padding: 10px 20px; /* Tambahkan ruang di sekitar teks */
    text-align: left; /* Pastikan teks rata kiri *//* Pastikan elemen menggunakan seluruh lebar */
  }


  #main-content {
  transition: margin-left 0.3s ease-in-out;
 
}

#main-content.collapsed {
  margin-left: 0;
}
    </style>
  </head>
  <body>
    
    <!-- Header -->
   @include('partials.topbar')
    
    <!-- Wrapper -->
    <div class="d-flex">
      <!-- Sidebar -->
      @include('partials.sidebar')
    
      <!-- Main Content -->
      <main id="main-content" class="flex-grow-1 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <div class="container-lg">
            @yield('container')
          </div>
        </div>
      </main>
    </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="/js/dashboard.js"></script>
       <script>
       document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', () => {
          sidebar.classList.toggle('show'); // Tambahkan/kurangi kelas "show"
        });
      });
      </script>
</body>
</html>
