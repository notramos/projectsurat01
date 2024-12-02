<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sistem Aplikasi Surat - Kominfo</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-registrasi">
        <form action="/registrasi" method="POST" class="form-floating">
            @csrf
            <img src="/img/kominfo.png" alt="Kominfo" width="150" height="100">
            
            <!-- Nama -->
            <div class="form-floating">
                <input 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    placeholder="Nama" 
                    value="{{ old('name') }}" 
                    autofocus>
                <label for="name">Nama</label>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username -->
            <div class="form-floating">
                <input 
                    type="text" 
                    class="form-control @error('username') is-invalid @enderror" 
                    name="username" 
                    placeholder="Username" 
                    value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-floating ">
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
            </div>

            <!-- Password -->
            <div class="form-floating ">
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

            <!-- Submit Button -->
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
            
            <p class="mt-3">Sudah punya akun? <a class="text-decoration-none" href="/login">Login</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; Sistem Informasi</p>
        </form>
    </main>
</body>
</html>
