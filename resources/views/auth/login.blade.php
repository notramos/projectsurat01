<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sistem Aplikasi Surat - Kominfo</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
      <main class="form-signin form-floating ">
        @if (session('success'))
             <div class="alert alert-success" id="flash-message">
             {{ session('success') }}
             </div>
        @endif

        @if (session('error'))
          <div class="alert alert-danger" id="flash-message">
              {{ session('error') }}
          </div>
        @endif

        <form class="form-registrasi" action="/login" method="post">
          @csrf
          {{-- email --}}
          <img src="/img/kominfo.png" alt="" width="150" height="100">
          <div class="form-floating form-mb-3">
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" 
                placeholder="Email" 
                value="{{ old('email') }}" autofocus>
            <label for="email">Email Address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         <!-- Password -->
         <div class="form-floating mt-3" >
          <input 
              type="password" 
              class="form-control @error('password') is-invalid @enderror" 
              name="password" 
              placeholder="Password">
          <label for="password">Password</label>
          @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <button class="w-100 btn btn-lg btn-primary mb-3 mt-2" type="submit">Login</button>
          <p>Belum punya akun? <a class="text-decoration-none" href="registrasi">Registrasi</a></p>
          <p class="mt-5 mb-3 text-muted">&copy; Sistem Informasi</p>
        </form>
      </main>
      <script>
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
  </body>

</html>
